//==============================================================================
//
//  Dialogs view
//
//==============================================================================

(function(app, $)
{
    app.DialogsView = Backbone.View.extend({
    
        initialize : function()
        {
            // Cache view components
            
            this.$confirm   = $(app.template.confirmDialog);
            this.$formError = $(app.template.formErrorDialog);
        },
        
        confirm : function(title, message, buttons)
        {
            if(message)
            {
                if(message instanceof Backbone.View) this.$confirm.html('').append(message.render().el);
                else                                 this.$confirm.html(message);
            }
            
            if(!buttons['Cancel'])
            {
                buttons['Cancel'] = function()
                {
                    $(this).dialog('close');
                };
            }
            
            this.$confirm.dialog({
            
                title     : title,
                resizable : false,
                modal     : true,
                width     : 400,
                height    : 'auto',
                buttons   : buttons,
                show      : 'fade',
                position  : { of: app.view.window.$el }
            });
        },
        
        formError : function(title, errorMessages)
        {
            this.$formError.html('');
            
            for(var i = 0; i < errorMessages.length; i++)
            {
                var $p  = $('<p>');
                var msg = errorMessages[i];
                
                if(msg && msg.length > 0)
                {
                    $p.html(errorMessages[i]);
                }
                
                this.$formError.append($p);
            }
            
            this.$formError.dialog({
            
                title     : title,
                resizable : false,
                modal     : true,
                width     : 400,
                height    : 'auto',
                buttons   : {
                    
                    'Close' : function()
                    {
                        $(this).dialog('close');
                    }
                },
                show      : 'fade',
                position  : { of: app.view.window.$el }
            });
        },
        
        message : function(title, message)
        {
            this.$formError.html('<p>' + message + '</p>');
            
            this.$formError.dialog({
            
                title     : title,
                resizable : false,
                modal     : true,
                width     : 400,
                height    : 'auto',
                buttons   : {
                    
                    'Close' : function()
                    {
                        $(this).dialog('close');
                    }
                },
                show      : 'fade',
                position  : { of: app.view.window.$el }
            });
        }
    });

})(window.Application, jQuery);