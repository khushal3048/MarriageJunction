//==============================================================================
//
//  Select avatar inline view
//
//==============================================================================

(function(app, config, $)
{
    app.SelectAvatarInlineView = Backbone.View.extend({
    
        events : {
            
            'mousedown .prev-avatar' : 'prev',
            'mousedown .next-avatar' : 'next'
        },
        
        selectedIndex : 0,
        
        initialize : function()
        {
            this.render();
            this.updateAvatar();
        },
        
        render : function()
        {
            // Clear the view
            
            this.$el.html(app.template.selectAvatarContent);
            this.$selected = this.$('.selected-avatar');
            
            return this;
        },
        
        prev : function()
        {
            this.selectedIndex--;
            
            if(this.selectedIndex < 0) this.selectedIndex = this.model.length - 1;
            
            this.updateAvatar();
        },
        
        next : function()
        {
            this.selectedIndex++;
            
            if(this.selectedIndex >= this.model.length) this.selectedIndex = 0;
            
            this.updateAvatar();
        },
        
        updateAvatar : function()
        {
            this.selected  = this.model[this.selectedIndex];
            this.$selected.css('background-image', 'url("' + this.selected + '")');
        }
    });

})(window.Application, chatConfig, jQuery);