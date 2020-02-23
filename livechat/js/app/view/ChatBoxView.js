//==============================================================================
//
//  Chat box view
//
//==============================================================================

(function(app, $)
{
    var ChatBoxView = app.ChatBoxView = Backbone.View.extend({
        
        initialize : function()
        {
            // Initialize models
            
            this.settings = app.model.settings;
            
            // Cache view components
            
            this.$wrapper = this.$('.customer-chat-content-messages-wrapper');
            
            // -----
            
            this.$el.mCustomScrollbar();
            
            this.messageViews = [];
        },
        
        addMessage : function(message, scrollDown, ignoreScrollSettings)
        {
            // Create the message element from template
            
            var messageView = new app.MessageView({ model : message, fullDate : this.options.fullDate });
            
            // Store the reference to the view
            
            this.messageViews.push(messageView);
            
            // Append message to the view
            
            this.$wrapper.append(messageView.el);
            
            // Update the scroll area
            
            var _this = this;
            
            setTimeout(function()
            {
                _this.$el.mCustomScrollbar('update');
                
                if(ignoreScrollSettings)
                {
                    if(scrollDown) _this.$el.mCustomScrollbar('scrollTo', 'bottom');
                }
                else
                {
                    if(_this.settings.get('scroll') || scrollDown) // Auto-scroll if desired
                    {
                        _this.$el.mCustomScrollbar('scrollTo', 'bottom');
                    }
                }
            
            }, 200);
        },
        
        clear : function()
        {
            // Destroy messages
            
            for(var i = 0; i < this.messageViews.length; i++)
            {
                this.messageViews[i]
                    .remove()
                    .clean();
            }
            
            // Remove all messages
            
            this.$wrapper.html('');
            this.messageViews = [];
        }
    });

})(window.Application, jQuery);