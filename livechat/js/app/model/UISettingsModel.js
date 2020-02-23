//==============================================================================
//
//  UI settings
//
//==============================================================================

(function(app, $, config, _)
{
    app.UISettingsModel = Backbone.Model.extend({
    
        initialize : function()
        {
            // Read settings
            
            this.fetch();
        },
        
        fetch : function()
        {
            var _this = this;
            
            $.get(config.getSettingsPath, function(data)
            {
                if(data.success)
                {
                    // Store the data
                    
                    _this.set(data.settings);
                }
            });
        },
        
        save : function()
        {
            if(arguments.length > 0)
            {
                this.set.apply(this, arguments);
            }
            
            // Notify about the started request
            
            this.trigger('request');
            
            var _this = this;
            
            $.post(config.updateSettingsPath, this.attributes, function()
            {
                // Notify about the finished request
                
                _this.trigger('sync');
            });
        },
        
        reset : function()
        {
            var _this = this;
            
            $.post(config.resetSettingsPath, function(data)
            {
                if(data.success)
                {
                    // Fill the model with new values
                    
                    _this.set(data.settings, { silent : true });
                    _this.trigger('change'); // Force event to be sent
                }
            });
        }
    });

})(window.Application, jQuery, window.chatConfig, _);