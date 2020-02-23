//==============================================================================
//
//  Admin settings
//
//==============================================================================

(function(app, $)
{
    app.AdminSettingsModel = Backbone.Model.extend({
    
        defaults : {
        
            sound  : true,
            scroll : true,
            emots  : true
            
            // ...
        },
        
        initialize : function()
        {
            // Read settings from cookies if any
            
            this.fetch();
            
            // Handle saving
            
            this.on('change', this.save, this);
        },
        
        save : function()
        {
            $.cookie('customer-chat-admin-settings', JSON.stringify(this.attributes));
        },
        
        fetch : function()
        {
            if($.cookie('customer-chat-admin-settings'))
            {
                this.set(JSON.parse($.cookie('customer-chat-admin-settings')));
            }
        }
    });

})(window.Application, jQuery);