//==============================================================================
//
//  Chat view
//
//==============================================================================

(function(app, $, config, _)
{
    var ChatView = app.ChatView = Backbone.View.extend({
    
        events : {
        
            'click .customer-chat-content-message-emots-button'  : 'toggleEmoticons',
            'click .customer-chat-emoticon'                      : 'addEmoticon',
            'keydown .customer-chat-content-message-input-field' : 'sendMessage'
        },
        
        guestUrl           : '',
        typingInfoBlinking : false,
        
        initialize : function()
        {
            // Initialize models
            
            this.settings = app.model.settings;
            this.chat     = app.model.chat;
            this.user     = app.model.user;
            
            // Create sub views
            
            this.chatBox = new app.ChatBoxView({ el : this.$('.customer-chat-content-messages') });
            
            // Cache view components
            
            this.$currentUrl = this.$('.current-url');
            this.$emoticons  = this.$('.customer-chat-emots-menu');
            this.$typingInfo = this.$('.typing-indicator');
            this.$input      = this.$('.customer-chat-content-message-input-field');
            
            if(this.model.hasRole('OPERATOR'))
            {
                this.$el.addClass('operator');
            }
            
            // Handle "talk already taken" notification
            
            this.listenTo(this.chat, 'messages:sent', this.handleMessageSent);
            
            // Handle user updates
            
            this.listenTo(this.model, 'change', this.handleModelUpdate);
            this.handleModelUpdate();
            
            // Handle typing status
            
            this.listenTo(this.chat, 'users:typing', this.handleRemoteTyping);
        },
        
        toggleEmoticons : function()
        {
            // Toggle emoticons
            
            this.$emoticons.toggle('fade', 'fast');
        },
        
        addEmoticon : function(evt)
        {
            var $emot = $(evt.currentTarget);
            
            this.$input.val(this.$input.val() + ' ' + $emot.data('emot') + ' ');
            
            // Set focus on the input
            
            this.$input.focus();
            
            // Hide emoticons menu
            
            this.$emoticons.fadeOut('fast');
        },
        
        sendMessage : function(evt)
        {
            // Handle typing status
            
            this.handleTyping();
            
            // React only to the ENTER key
            
            if(evt.keyCode !== 13 || evt.shiftKey)
            {
                return;
            }
            
            var body = this.$input.val();
            
            // Do nothing if there's no input
            
            if(body.length == 0)
            {
                return;
            }
            
            var message = new app.MessageModel({
            
                author     : this.user.get('name'),
                mail       : this.user.get('mail'),
                authorType : 'operator',
                body       : body,
                time       : new Date(),
                to         : this.model.get('id')
            });
            
            message.fromUser = this.user.attributes;
            
            // Send the message
            
            this.chat.sendMessage(message);
            
            // Add message to the chat box
            
            this.chatBox.addMessage(message, true);
            
            // Clear the input field
            
            this.$input.val('');
            
            // Notify about message sent
            
            this.trigger('message.sent', message);
        },
        
        handleMessageSent : function(to, msgData)
        {
            if(to === this.model.get('id') && msgData.to_id === -2)
            {
                // Notify about the talk already taken by another operator
                
                msgData.from_user_info.image = 'no_image.jpg';
                
                var message = new app.MessageModel({
                    
                    author   : '[system message]',
                    body     : 'Another operator is already helping this guest, your messages will not be delivered.',
                    datetime : new Date(),
                    image    : '#',
                    
                    from_user_info : msgData.from_user_info
                });
                
                this.chatBox.addMessage(message, true);
            }
        },
        
        handleNewMessages : function(messages, silent)
        {
            _.each(messages, this.handleMessage, this);
            
            // Play notification sound
            
            if(!silent && messages.length > 0 && this.settings.get('sound')) app.service.soundPlayer.play('message');
        },
        
        handleMessage : function(msgData)
        {
            // Add the message to the chat box
            
            msgData.info = this.model.get('info');
            
            var message = new app.MessageModel(msgData);
            
            // Add message to the chat box
            
            this.chatBox.addMessage(message);
        },
        
        handleTyping : function()
        {
            this.chat.updateTypingStatus(this.model.get('id'));
        },
        
        handleRemoteTyping : function(ids)
        {
            // Check for this user's ID
            
            if(ids.indexOf(this.model.get('id')) === -1) return;
            
            this.startTypingInfoBlink();
            
            // Hide automatically later
            
            if(this.stopTypingBlinkTimer) clearTimeout(this.stopTypingBlinkTimer);
            
            this.stopTypingBlinkTimer = setTimeout($.proxy(this.stopTypingInfoBlink, this), ChatView.TYPING_STATUS_TIME);
        },
        
        handleModelUpdate : function()
        {
            // Update url currently visited by user
            
            var info = this.model.get('info');
            
            if(info)
            {
                if(this.guestUrl !== info.referer)
                {
                    this.guestUrl = info.referer;
                    
                    // Animation
                    
                    var _this = this;
                    
                    this.$currentUrl.parent().animate({ opacity : 0 }, { duration : 'slow', complete : function()
                    {
                        _this.$currentUrl.html(info.referer).attr('href', info.referer);
                        
                        $(this).animate({ opacity : 1 }, { duration : 'slow' });
                    }});
                }
            }
        },
        
        startTypingInfoBlink : function()
        {
            if(!this.typingInfoBlinking)
            {
                this.typingInfoBlinking = true;
                this.blinkTypingInfo();
            }
        },
        
        blinkTypingInfo : function()
        {
            if(!this.typingInfoBlinking)
            {
                return;
            }
            
            var _this = this;
            
            this.$typingInfo.fadeIn('slow', function()
            {
                _this.$typingInfo.fadeOut('slow', function()
                {
                    _this.blinkTypingInfo();
                });
            });
        },
        
        stopTypingInfoBlink : function()
        {
            this.typingInfoBlinking = false;
        }
    },
    {
        TYPING_STATUS_TIME : 2000
    });

})(window.Application, jQuery, window.chatConfig, _);