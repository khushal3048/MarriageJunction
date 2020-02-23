//==============================================================================
//
//  Inserts the chat widget into a web page
//
//==============================================================================

(function()
{
    /*!
     * contentloaded.js
     *
     * Author: Diego Perini (diego.perini at gmail.com)
     * Summary: cross-browser wrapper for DOMContentLoaded
     * Updated: 20101020
     * License: MIT
     * Version: 1.2
     *
     * URL:
     * http://javascript.nwbox.com/ContentLoaded/
     * http://javascript.nwbox.com/ContentLoaded/MIT-LICENSE
     *
     */
    function contentLoaded(c,h){var b=false,g=true,j=c.document,i=j.documentElement,m=j.addEventListener?"addEventListener":"attachEvent",k=j.addEventListener?"removeEventListener":"detachEvent",a=j.addEventListener?"":"on",l=function(n){if(n.type=="readystatechange"&&j.readyState!="complete"){return}(n.type=="load"?c:j)[k](a+n.type,l,false);if(!b&&(b=true)){h.call(c,n.type||n)}},f=function(){try{i.doScroll("left")}catch(n){setTimeout(f,50);return}l("poll")};if(j.readyState=="complete"){h.call(c,"lazy")}else{if(j.createEventObject&&i.doScroll){try{g=!c.frameElement}catch(d){}if(g){f()}}j[m](a+"DOMContentLoaded",l,false);j[m](a+"readystatechange",l,false);c[m](a+"load",l,false)}};
    
    // -----
    
    contentLoaded(window, function()
    {
        var iframe = document.createElement('iframe');

        iframe.id               = '#customer-chat-iframe';
        iframe.src              = '<?php echo $app->path("Widget:iframeContentMin") ?>';
        iframe.border           = 0;
        iframe.marginwidth      = 0;
        iframe.marginWidth      = 0;
        iframe.marginheight     = 0;
        iframe.marginHeight     = 0;
        iframe.frameBorder      = 0;
        iframe.outline          = 'none';
        iframe.style.display    = 'none';
        iframe.style.background = 'transparent';
        iframe.style.border     = 'none';
        iframe.style.outline    = 'none';
        iframe.style.position   = 'fixed';
        iframe.style.zIndex     = 999999;
        iframe.style.overflow   = 'hidden';
        iframe.style.bottom     = '-356px';
        iframe.style.right      = '50px';
        iframe.style.width      = '370px';
        iframe.style.height     = '411px';
        iframe.style.margin     = 0;
        iframe.style.padding    = 0;

        document.body.appendChild(iframe);
    });
})();