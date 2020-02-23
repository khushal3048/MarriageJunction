//==============================================================================
//
//  History view
//
//==============================================================================

(function(app, $, _)
{
    var HistoryView = app.HistoryView = Backbone.View.extend({
    
        events : {
        
            'click #customer-chat-history-search' : 'search',
            'keydown input'                       : 'searchOnEnter',
            'click .customer-chat-history-item'   : 'showConversation',
            'click #history-list-display-more'    : 'displayMoreResults'
        },
        
        searching : false,
        
        lastSearch : { items : [], displayed : 0 },
        
        initialize : function()
        {
            // Initialize models
            
            this.model = app.model.chat;
            
            // Cache view elements
            
            this.$results       = this.$('#customer-chat-history-search-results');
            this.$inputs        = this.$('*[name]');
            this.$search        = this.$('#customer-chat-history-search');
            this.$loading       = this.$('.customer-chat-content-loading-icon').hide();
            this.$resultItems   = this.$('#customer-chat-history-search-results .customer-chat-content-messages-wrapper');
            this.$displayMore   = $(app.template.historyListDisplayMore);
            this.$chatHeader    = this.$('#customer-chat-talk-header');
            this.$headerUser1   = this.$('#history-chat-user-1');
            this.$headerId1     = this.$('#history-chat-id-1');
            this.$headerMail1   = this.$('#history-chat-mail-1');
            this.$headerUser2   = this.$('#history-chat-user-2');
            this.$headerId2     = this.$('#history-chat-id-2');
            this.$headerMail2   = this.$('#history-chat-mail-2');
            this.$headerAvatar1 = this.$('#history-chat-avatar-1');
            this.$headerAvatar2 = this.$('#history-chat-avatar-2');
            this.$headerDate    = this.$chatHeader.find('.date-info');
            
            // Initialize elements
            
            this.$('.date-input').datepicker();
            this.$results.mCustomScrollbar();
            
            // Create sub views
            
            this.chatBoxView = new app.ChatBoxView({ el : this.$('#history-results-chat'), model : new app.ChatViewModel(), fullDate : true });
            
            // Handle rendering
            
            this.model.on('change',  this.render,  this);
            this.model.on('request', this.disable, this);
            this.model.on('sync',    this.enable,  this);
            
            // Handle global events
            
            this.listenTo(app, 'history.search', this.autoSearch);
            
            this.render();
        },
        
        search : function()
        {
            if(!this.searching)
            {
                this.searching = true;
                this.clearSearchResults();
                
                // Generate query object
                
                var query = {};
                
                this.$inputs.each(function()
                {
                    var $el = $(this);
                    
                    if($el.val())
                    {
                        if($el.attr('type') == 'checkbox')
                        {
                            query[$el.attr('name')] = $el.is(':checked') ? 'true' : 'false';
                        }
                        else
                        {
                            query[$el.attr('name')] = $el.val();
                        }
                    }
                });
                
                this.model.queryHistory(query, $.proxy(this.onQueryResults, this), $.proxy(this.onQueryError, this));
            }
        },
        
        searchOnEnter : function(e)
        {
            if(e.which === 13) // ENTER
            {
                this.search();
            }
        },
        
        autoSearch : function(data)
        {
            // Fill search inputs with data
            
            this.$inputs.each(function()
            {
                var $el  = $(this);
                var name = $el.attr('name');
                
                if(typeof data[name] !== undefined)
                {
                    $el.val(data[name]);
                }
            });
            
            // Perform searching
            
            this.search();
        },
        
        onQueryError : function()
        {
            this.searching = false;
        },
        
        onQueryResults : function(results)
        {
            this.searching = false;
            
            this.prepareResults(results);
            
            // Store the search results
            
            this.lastSearch.items     = results;
            this.lastSearch.displayed = 0;
            
            // Show the first results
            
            this.clearSearchResults();
            this.displayMoreResults();
        },
        
        displayMoreResults : function()
        {
            // Check if there's more to be displayed
            
            var results   = this.lastSearch.items;
            var displayed = this.lastSearch.displayed;
            
            if(displayed < results.length)
            {
                var endIndex = Math.max(0, Math.min(results.length, displayed + HistoryView.RESULTS_DISPLAY_COUNT));
                
                this.addSearchResults(results.slice(displayed, endIndex));
                
                displayed = endIndex;
            }
            
            // Show the "display more" link, if necessary
            
            if(results.length > displayed)
            {
                this.$resultItems.append(this.$displayMore.show());
            }
            else
            {
                this.$displayMore.remove();
            }
            
            // Update the scroller
            
            this.$results.mCustomScrollbar('update');
            
            // Update results info
            
            this.lastSearch.displayed = displayed;
        },
        
        render : function()
        {
            return this;
        },
        
        setSearchResults : function(dataArray)
        {
            this.clearSearchResults();
            this.addSearchResults(dataArray);
        },
        
        addSearchResults : function(dataArray)
        {
            for(var i = 0; i < dataArray.length; i++)
            {
                this.addSearchResult(dataArray[i]);
            }
        },
        
        clearSearchResults : function()
        {
            this.$resultItems.html('');
            
            // Update the scroller
            
            this.$results.mCustomScrollbar('update');
        },
        
        addSearchResult : function(talkData)
        {
            var data  = talkData[0];
            var $item = $(app.template.historyListItem);
            
            var date        = new Date(data.datetime);
            var dayString   = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
            var monthString = (date.getMonth() + 1 < 10) ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1);
            var dateString  = isNaN(date.getDay()) ? '' : dayString + '.' + monthString + '.' + date.getFullYear();
            
            var message = new app.MessageModel(data);
            
            $item.find('.customer-chat-history-item-username').html(message.getTalkName());
            $item.find('.customer-chat-history-item-time').html(dateString);
            
            // Store item's data in itself
            
            var info = _.clone(message.attributes);
            
            info.author = info.author + ' (' + info.authorMail + ')';
            
            $item.data('info', talkData);
            
            // Add item to search results
            
            this.$resultItems.append($item);
            
            // Update the scroller
            
            this.$results.mCustomScrollbar('update');
        },
        
        showConversation : function(evt)
        {
            // Clear the chat box
            
            this.chatBoxView.clear();
            
            // Show users info
            
            var $item    = $(evt.currentTarget);
            var talkData = $item.data('info');
            
            var firstMsg = new app.MessageModel(talkData[0]);
            var lastMsg  = new app.MessageModel(talkData[talkData.length - 1]);
            
            if(firstMsg.fromUser.image)                  this.$headerAvatar1.css('background-image', 'url("' + firstMsg.fromUser.image + '")');
            if(firstMsg.toUser && firstMsg.toUser.image) this.$headerAvatar2.css('background-image', 'url("' + firstMsg.toUser.image + '")');
            
            this.$headerUser1.html(firstMsg.getReadableName());
            this.$headerId1.html(firstMsg.get('author'));
            this.$headerMail1.html(firstMsg.get('authorMail'));
            this.$headerUser2.html(firstMsg.getToUserReadableName());
            this.$headerId2.html(firstMsg.get('toAuthor'));
            this.$headerMail2.html(firstMsg.get('toAuthorMail'));
            this.$headerDate.html(firstMsg.get('datetime') + ' — ' + lastMsg.get('datetime'));
            this.$chatHeader.show();
            
            // Add messages to the chat box
            
            talkData.sort(function(a, b)
            {
                return a.datetime > b.datetime ? 1 : -1;
            });
            
            for(var i = 0; i < talkData.length; i++)
            {
                var entry = talkData[i];
                entry.info = entry.from_user_info.info;
                
                this.chatBoxView.addMessage(new app.MessageModel(entry), false, true);
            }
        },
        
        prepareResults : function(results)
        {
            for(var i = 0; i < results.length; i++)
            {
                var item = results[i];
                
                // Remove random ID from the guest's name
                
                if(item.roles && item.roles.toLowerCase().indexOf('guest') !== -1)
                {
                    item.name = item.name.lastIndexOf('-') !== -1 ? item.name.slice(0, item.name.lastIndexOf('-')) : item.name;
                }
            }
        }
    },
    {
        RESULTS_DISPLAY_COUNT : 20 // size of a single fragment of paginated content
    });

})(window.Application, jQuery, _);