//==============================================================================
//
//  Chat tab view
//
//==============================================================================

(function(app, $, config)
{
    app.ChatTabView = Backbone.View.extend({
        
        events : {
            
            'click .customer-chat-tab-button .close' : 'closeTalk',
            'click .customer-chat-history-item'      : 'showTalk'
        },
        
        talks       : {},
        unreadTalks : 0,
        
        initialize : function()
        {
            // Initialize models
            
            this.settings = app.model.settings;
            this.chat     = app.model.chat;
            this.user     = app.model.user;
            
            // Create sub views
            
            this.tabsView = new app.TabsView   ({ el : this.$('.chat-wrapper') });
            this.chatBox  = new app.ChatBoxView({ el : this.$('.customer-chat-content-messages') });
            
            // Cache view components
            
            this.$emoticons           = this.$('.customer-chat-emots-menu');
            this.$input               = this.$('.customer-chat-content-message-input-field');
            this.$onlineList          = this.$('#customer-chat-users-online .customer-chat-content-messages-wrapper.users');
            this.$onlineListOperator  = this.$('#customer-chat-users-online .customer-chat-content-messages-wrapper.operators');
            
            if(this.user.hasRole('ADMIN'))
            {
                this.tabsView.remove();
                this.$('#customer-chat-users-online').css('width', 855);
            }
            
            // Handle online users list
            
            this.listenTo(this.chat, 'users:online', this.renderOnlineUsers);
            
            // Handle new messages
            
            this.listenTo(this.chat, 'messages:new', this.handleNewMessages);
            
            // Handle scroller updates
            
            this.listenTo(this.tabsView, 'tab.show', function()
            {
                $(window).resize();
            });
            
            // Handle "new message" indicator hiding
            
            this.listenTo(this.tabsView, 'tab.show',       this.handleTalkShown);
            this.listenTo(app,           'menu:show:chat', this.handleChatShown);
        },
        
        renderOnlineUsers : function(users)
        {
            // Clear the list
            
            this.$onlineList.html('');
            this.$onlineListOperator.html('');
            
            // Add currently available users
            
            for(var i = 0; i < users.length; i++)
            {
                var user      = users[i];
                var userModel = new app.UserModel(user);
                
                var $item = $(app.template.historyListItem);
                
                $item.data('info', userModel);
                
                $item.find('.customer-chat-history-item-username').html(userModel.getReadableName());
                
                // Add item to the view
                
                if(user.roles.indexOf('OPERATOR') !== -1) this.$onlineListOperator.append($item);
                else                                      this.$onlineList.append($item);
                
                // Initialize user info popover
                
                new app.UserInfoPopoverView({ model : userModel, button : $item[0] });
                
                // Update user's info in talks
                
                var talk = this.getTalkWith(userModel);
                
                if(talk)
                {
                    talk.chatView.model.set(userModel.attributes);
                }
            }
            
            // Update the scroller
            
            $(window).trigger('resize');
        },
        
        addTalk : function(options)
        {
            // Create button
            
            var $button = $(app.template.tabButtonChat);
            
            $button.find('span').html(options.user.getReadableName());
            $button.data('user', options.user);
            
            // Animate new message icon
            
            var $icon = $button.find('.new-msg');
            
            $icon.hide();
            
            (function animateIcon()
            {
                $icon.animate({ opacity: 0.01 }, { duration : 'slow', complete : function()
                {
                    $icon.animate({ opacity: 1 }, { duration : 'slow', complete : animateIcon });
                }});
            })();
            
            // Create content
            
            var $content = $(app.template.tabContentChat);
            
            var chatView = new app.ChatView({ el : $content, model : options.user });
            
            // Add new tab to the view
            
            this.tabsView.addTab({ button : $button, content : $content });
            
            // Store the talk
            
            var talk = { chatView : chatView, $button : $button };
            
            this.talks[options.user.get('id')] = talk;
            
            // Handle sent messages
            
            this.listenTo(chatView, 'message.sent', this.handleMessageSent);
            
            return talk;
        },
        
        removeTalkWith : function(user)
        {
            // Remove the talk
            
            var talk = this.talks[user.get('id')];
            
            this.tabsView.removeTab(this.tabsView.getButtonIndex(talk.$button[0]));
            talk.chatView.remove();
            
            delete this.talks[user.get('id')];
        },
        
        hasTalkWith : function(user)
        {
            return !!this.talks[user.get('id')];
        },
        
        getTalkWith : function(user)
        {
            return this.talks[user.get('id')];
        },
        
        showTalk : function(e)
        {
            // Get the user model
            
            var user = $(e.currentTarget).data('info');
            
            // In admin's mode show history for the user
            
            if(this.user.hasRole('ADMIN'))
            {
                app.trigger('history.search', {
                    
                    name     : user.get('name'),
                    mail     : user.get('mail'),
                    fromDate : '',
                    toDate   : ''
                });
                
                return;
            }
            
            // Create and/or show the talk
            
            var talk = this.getTalkWith(user);
            
            if(!talk)
            {
                talk = this.addTalk({ user : user });
                
                // Download last messages from this talk
                
                this.chat.getLastMessages(user.get('id'), null, function(messages)
                {
                    // Add messages to the chat
                    
                    if(messages.length > 0) talk.chatView.handleNewMessages(messages, true);
                });
            }
            
            this.tabsView.showTabForButton(talk.$button[0]);
        },
        
        closeTalk : function(e)
        {
            var user = $(e.currentTarget).parent('.customer-chat-tab-button').data('user');
            this.removeTalkWith(user);
            
            e.stopImmediatePropagation();
        },
        
        handleNewMessages : function(messages)
        {
            // Group messages by author
            
            var grouped = _.groupBy(messages, 'from_id');
            
            // Handle groups
            
            _.each(grouped, function(messages)
            {
                var user = new app.UserModel(messages[0].from_user_info);
                var talk = this.getTalkWith(user);
                
                // Create new talk, if needed
                
                if(!talk)
                {
                    talk = this.addTalk({ user : user });
                    
                    var lastMessage = messages[0];
                    var _this       = this;
                    
                    this.chat.getLastMessages(user.get('id'), lastMessage.id, function(lastMessages)
                    {
                        // Add last messages to the chat
                        
                        if(lastMessages.length > 0) talk.chatView.handleNewMessages(lastMessages, true);
                        
                        // Add new messages to the chat
                        
                        _this.initTalk(talk, messages);
                    });
                }
                else
                {
                    this.initTalk(talk, messages);
                }
                
            }, this);
        },
        
        initTalk : function(talk, messages)
        {
            // Pass all the messages to be handled by the talk's view

            talk.chatView.handleNewMessages(messages);

            // Add "new-message" indicator to the tab's button

            var $icon = talk.$button.find('.new-msg');

            if($icon.is(':hidden'))
            {
                $icon.show();

                this.updateUnreadCounter(1);
            }
        },
        
        handleMessageSent : function(message)
        {
            var talk = this.getTalkWith(new app.UserModel({ id : message.get('to') }));
            
            // Remove the "new-message" indicator from the tab's button
            
            var $icon = talk.$button.find('.new-msg');
            
            if($icon.is(':visible'))
            {
                $icon.hide();
                
                this.updateUnreadCounter(-1);
            }
        },
        
        handleTalkShown : function(tabIndex)
        {
            // Remove the "new-message" indicator from the tab's button
            
            var $icon = this.tabsView.getButton(tabIndex).find('.new-msg');
            
            if($icon.is(':visible'))
            {
                $icon.hide();
                
                this.updateUnreadCounter(-1);
            }
        },
        
        handleChatShown : function()
        {
            // Update currently visible talk
            
            this.tabsView.render();
        },
        
        updateUnreadCounter : function(x)
        {
            var prevCount = this.unreadTalks;
            
            this.unreadTalks = Math.max(0, this.unreadTalks + x);
            
            // Notify about the important states
            
            if(prevCount === 1 && this.unreadTalks === 0)
            {
                this.trigger('talks.read');
            }
            else
            {
                this.trigger('talks.unread');
            }
        }
    });

})(window.Application, jQuery, window.chatConfig);