//==============================================================================
//
//  Application's main object
//
//==============================================================================

(function(ns, _)
{
    ns.Application = _.extend({
    
        model    : {},
        view     : {},
        service  : {},
        template : {}
        
        // ...
    }, Backbone.Events);
    
})(window, _);