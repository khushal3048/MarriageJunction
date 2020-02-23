//==============================================================================
//
//  Select avatar view
//
//==============================================================================

(function(app, config, $)
{
    app.SelectAvatarView = Backbone.View.extend({
    
        events : {
            
            'mousedown .customer-chat-content-message-avatar' : 'selectAvatar'
        },
        
        render : function()
        {
            // Clear the view
            
            this.$el.html(app.template.selectAvatarContent);
            
            this.$avatars = this.$('.avatars');
            
            // Display available avatars
            
            for(var i = 0; i < this.model.length; i++)
            {
                var $avatar = $('<i class="customer-chat-content-message-avatar"></i>');
                
                $avatar.css('background-image', 'url("' + this.model[i] + '")').data('image', this.model[i]);
                
                this.$avatars.append($avatar);
            }
            
            // Initialize the scroller
            
            this.$el.find('.avatars-wrapper').mCustomScrollbar();
            
            $(window).resize();
            
            return this;
        },
        
        selectAvatar : function(e)
        {
            var $avatar = $(e.currentTarget);
            var image   = $avatar.data('image');
            
            this.$avatars.children().removeClass('selected');
            $avatar.addClass('selected');
            
            this.selected = image;
        }
    });

})(window.Application, chatConfig, jQuery);