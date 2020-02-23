//==============================================================================
//
//  Chat user
//
//==============================================================================

(function(app)
{
    app.UserModel = Backbone.Model.extend({
    
        initialize : function(attributes)
        {
            if(typeof attributes.info === 'string')
            {
                try      { attributes.info = JSON.parse(attributes.info); }
                catch(e) { /* Do nothing... */}
            }
        },
        
        getAge : function()
        {
            // Initialize models
            
            this.chat = app.model.chat;
            
            // Calculate how long ago the message was received (in seconds)
            
            var currentTime = new Date().getTime()       / 1000;
            var messageTime = this.get('time').getTime() / 1000;
            
            return Math.ceil(currentTime - messageTime);
        },
        
        getReadableName : function()
        {
            var name = this.get('name');
            
            return name.lastIndexOf('-') !== -1 ? name.slice(0, name.lastIndexOf('-')) : name;
        },
        
        hasRole : function(role)
        {
            return this.get('roles').indexOf(role) !== -1;
        }
    });

})(window.Application);