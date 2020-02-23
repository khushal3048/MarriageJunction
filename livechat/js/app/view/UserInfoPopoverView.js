//==============================================================================
//
//  User info popover view
//
//==============================================================================

(function(app, config, $)
{
    app.UserInfoPopoverView = Backbone.View.extend({
    
        initialize : function(options)
        {
            var $button = $(options.button);
            
            $button.popover({
                
                placement : 'top',
                trigger   : 'manual',
                container : 'body',
                title     : 'User info',
                html      : true,
                content   : this.render().$el

            }).mouseenter(function()
            {
                var $this = $(this);

                $('body > .popover').remove();

                $this.popover('show');
                
                var $popover = $('body > .popover');
                
                $this.add($popover).bind('mouseleave', function()
                {
                    setTimeout(function()
                    {
                        if(!$popover.underMouse()) $popover.remove();
                    
                    }, 250);
                });

            });
        },
        
        render : function()
        {
            // Clear the view
            
            this.$el.html(app.template.userInfoPopoverContent);
            
            // Fill the element with data
            
            this.$('#user-popover-name').html(this.model.getReadableName());
            this.$('#user-popover-id').html(this.model.get('author') || this.model.get('name'));
            this.$('#user-popover-mail').html(this.model.get('authorMail') || this.model.get('mail'));
            this.$('#user-popover-ip').html(this.model.has('info') ? this.model.get('info').ip : 'PRIVATE');
            
            if(this.model.fromUser && this.model.fromUser.image) this.$('.avatar').css('background-image', 'url("' + this.model.fromUser.image + '")');
            else if(this.model.get('image'))                     this.$('.avatar').css('background-image', 'url("' + this.model.get('image')   + '")');
            
            // Don't show IP address if there's none
            
            if(!this.model.has('info'))
            {
                this.$('#user-popover-ip').parent().hide();
            }
            
            return this;
        }
    });

})(window.Application, chatConfig, jQuery);