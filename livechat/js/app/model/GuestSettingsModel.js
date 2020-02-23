//==============================================================================
//
//  Widget settings
//
//==============================================================================

(function(app, $)
{
    app.GuestSettingsModel = Backbone.Model.extend({
    
        defaults : {
        
            sound  : true,
            scroll : true,
            emots  : true,
            show   : true
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
            $.cookie('customer-chat-settings', JSON.stringify(this.attributes));
        },
        
        fetch : function()
        {
            if($.cookie('customer-chat-settings'))
            {
                this.set(JSON.parse($.cookie('customer-chat-settings')));
            }
        }
    });

})(window.Application, jQuery);