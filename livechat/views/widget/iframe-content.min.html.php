<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <!-- Fonts -->
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
        
        <!-- Styles -->
        
        <link rel="stylesheet" href="<?php echo $app->asset('css/main.css') ?>" />
        <link rel="stylesheet" href="<?php echo $app->asset('css/jquery.mCustomScrollbar.css') ?>" />
        <link rel="stylesheet" href="<?php echo $app->asset('css/bootstrap.css') ?>" />
        <link rel="stylesheet" href="<?php echo $app->path('Widget:customStyle') ?>" />
        
    </head>
    <body>
        <div id="customer-chat-widget" class="customer-chat customer-chat-widget loading-screen">
            <div class="customer-chat-header">
                <div class="customer-chat-header-title"><?php echo $vars['ui']['chatHeader'] ?></div>
                <div class="customer-chat-header-indicator"></div>
                <div id="customer-chat-button-toggle" class="customer-chat-header-button">
                    <i class="icon-chevron-down icon-white"></i>
                    <i class="icon-chevron-up icon-white"></i>
                </div>
                <div id="customer-chat-button-settings" class="customer-chat-header-button"><i class="icon-wrench icon-white"></i></div>
                
                <div class="customer-chat-header-menu">
                    <div class="customer-chat-header-menu-triangle"></div>
                    
                    <a href="#" id="customer-chat-setting-toggle-sound" class="customer-chat-toggle-sound"><i class="icon-music"></i> <div><?php echo $vars['ui']['toggleSoundLabel'] ?></div></a>
                    <a href="#" id="customer-chat-setting-toggle-scroll" class="customer-chat-toggle-scroll"><i class="icon-arrow-down"></i> <div><?php echo $vars['ui']['toggleScrollLabel'] ?></div></a>
                    <a href="#" id="customer-chat-setting-toggle-emots" class="customer-chat-toggle-emots"><i class="icon-heart"></i> <div><?php echo $vars['ui']['toggleEmoticonsLabel'] ?></div></a>
                    <a href="#" id="customer-chat-setting-toggle-show" class="customer-chat-toggle-show customer-chat-disabled"><i class="icon-resize-full"></i> <div><?php echo $vars['ui']['toggleAutoShowLabel'] ?></div></a>
                </div>
                
                <div class="customer-chat-emots-menu">
                    <div class="customer-chat-header-menu-triangle"></div>
                    
                    <a href="#" data-emot=":)" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-1.png') ?>" alt=":)" title=":)" /></a>
                    <a href="#" data-emot=";)" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-2.png') ?>" alt=";)" title=";)" /></a>
                    <a href="#" data-emot=":(" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-3.png') ?>" alt=":(" title=":(" /></a>
                    <a href="#" data-emot=":D" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-4.png') ?>" alt=":D" title=":D" /></a>
                    <a href="#" data-emot=":P" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-5.png') ?>" alt=":P" title=":P" /></a>
                    <a href="#" data-emot="=)" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-6.png') ?>" alt="=)" title="=)" /></a>
                    <a href="#" data-emot=":|" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-7.png') ?>" alt=":|" title=":|" /></a>
                    <a href="#" data-emot="=|" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-8.png') ?>" alt="=|" title="=|" /></a>
                    <a href="#" data-emot=">:|" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-9.png') ?>" alt=">:|" title=">:|" /></a>
                    <a href="#" data-emot=">:D" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-10.png') ?>" alt=">:D" title=">:D" /></a>
                    
                    <a href="#" data-emot="o_O" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-11.png') ?>" alt="o_O" title="o_O" /></a>
                    <a href="#" data-emot="=O" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-12.png') ?>" alt="=O" title="=O" /></a>
                    <a href="#" data-emot="<3" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-13.png') ?>" alt="<3" title="<3" /></a>
                    <a href="#" data-emot=":S" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-14.png') ?>" alt=":S" title=":S" /></a>
                    <a href="#" data-emot=":*" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-15.png') ?>" alt=":*" title=":*" /></a>
                    <a href="#" data-emot=":$" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-16.png') ?>" alt=":$" title=":$" /></a>
                    <a href="#" data-emot="=B" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-17.png') ?>" alt="=B" title="=B" /></a>
                    <a href="#" data-emot=":-D" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-18.png') ?>" alt=":-D" title=":-D" /></a>
                    <a href="#" data-emot=";-D" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-19.png') ?>" alt=";-D" title=";-D" /></a>
                    <a href="#" data-emot="*-D" class="customer-chat-emoticon"><img src="<?php echo $app->asset('img/emots/emot-20.png') ?>" alt="*-D" title="*-D" /></a>
                </div>
            </div>
            
            <div id="customer-chat-content-login-form" class="customer-chat-content">
                <div class="customer-chat-content-info">
                    <?php echo $vars['ui']['startInfo'] ?>
                </div>
                <div id="customer-chat-select-avatar">
                    <a href="#" class="prev-avatar customer-chat-content-button customer-chat-content-button-inline"><i class="icon-chevron-left icon-white"></i></a>
                    <i class="selected-avatar customer-chat-content-message-avatar"></i>
                    <a href="#" class="next-avatar customer-chat-content-button customer-chat-content-button-inline"><i class="icon-chevron-right icon-white"></i></a>
                </div>
                <div class="customer-chat-content-message-input">
                    <input id="customer-chat-login-name" type="text" class="customer-chat-content-message-input-field" placeholder="<?php echo $vars['ui']['contactNameLabel'] ?>" />
                </div>
                <div class="customer-chat-content-message-input">
                    <input id="customer-chat-login-mail" type="text" class="customer-chat-content-message-input-field" placeholder="<?php echo $vars['ui']['contactMailLabel'] ?>" />
                </div>
                <div class="customer-chat-content-row">
                    <a href="#" id="customer-chat-login-start" class="customer-chat-content-button"><?php echo $vars['ui']['startLabel'] ?> <i class="icon-circle-arrow-right icon-white" style="margin: 3px 0 0 3px;"></i></a>
                </div>
            </div>

            <div id="customer-chat-content-chat-box" class="customer-chat-content">
                <div class="customer-chat-content-messages">
                    <div class="customer-chat-content-messages-wrapper"></div>
                </div>
                
                <div class="customer-chat-content-message-input">
                    <div class="typing-indicator"><i class="icon icon-pencil"></i></div>
                    <input type="text" id="customer-chat-message-input" class="customer-chat-content-message-input-field" placeholder="<?php echo $vars['ui']['chatInputLabel'] ?>" />
                    <div class="customer-chat-content-message-emots-button"></div>
                </div>
            </div>
            
            <div id="customer-chat-content-contact-form" class="customer-chat-content">
                <div class="customer-chat-content-info">
                    <?php echo $vars['ui']['contactInfo'] ?>
                </div>
                <div class="customer-chat-content-message-input">
                    <input id="customer-chat-contact-name" type="text" class="customer-chat-content-message-input-field" placeholder="<?php echo $vars['ui']['contactNameLabel'] ?>" />
                </div>
                <div class="customer-chat-content-message-input">
                    <input id="customer-chat-contact-mail" type="text" class="customer-chat-content-message-input-field" placeholder="<?php echo $vars['ui']['contactMailLabel'] ?>" />
                </div>
                <div class="customer-chat-content-message-input">
                    <textarea id="customer-chat-contact-message" class="customer-chat-content-message-input-field" placeholder="<?php echo $vars['ui']['contactQuestionLabel'] ?>"></textarea>
                </div>
                <div class="customer-chat-content-row">
                    <a href="#" id="customer-chat-contact-send" class="customer-chat-content-button"><?php echo $vars['ui']['contactSendLabel'] ?> <i class="icon-circle-arrow-right icon-white" style="margin: 3px 0 0 3px;"></i></a>
                </div>
            </div>
            
            <div id="customer-chat-content-loading" class="customer-chat-content">
                <img src="<?php echo $app->asset('img/loading.gif') ?>"class="customer-chat-content-loading-icon" />
            </div>
            
            <div id="customer-chat-content-info" class="customer-chat-content">
                <div id="customer-chat-info-text" class="customer-chat-content-info"></div>
                <div class="customer-chat-content-row">
                    <a href="#" id="customer-chat-info-back" class="customer-chat-content-button"><i class="icon-circle-arrow-left icon-white" style="margin: 3px 3px 0 0;"></i> <?php echo $vars['ui']['backLabel'] ?></a>
                </div>
            </div>
        </div>
        
        <!-- Scripts -->
        
        <script src="<?php echo $app->asset('js/customer-chat-widget-libs.min.js') ?>" type="text/javascript"></script>
        <script type="text/javascript">window.chatConfig={rootPath:'<?php echo $app->asset("") ?>',templatesPath:'<?php echo $app->asset("views/widget-templates.html") ?>',isOperatorOnlinePath:'<?php echo $app->path("Operator:isOnline") ?>',isLoggedInPath:'<?php echo $app->path("Authentication:isGuestLoggedIn") ?>',loginPath:'<?php echo $app->path("Authentication:loginGuest") ?>',keepAlivePath:'<?php echo $app->path("Guest:stayAlive") ?>',getTypingStatusPath:'<?php echo $app->path("Guest:getTypingStatus") ?>',updateTypingStatusPath:'<?php echo $app->path("Guest:updateTypingStatus") ?>',newMessagesPath:'<?php echo $app->path("Message:getNew") ?>',lastMessagesPath:'<?php echo $app->path("Message:getLast") ?>',sendMessagePath:'<?php echo $app->path("Message:broadcast") ?>',getOperatorPath:'<?php echo $app->path("Operator:get") ?>',contactPath:'<?php echo $app->path("Contact:contact") ?>',ui:JSON.parse('<?php echo $vars["uiJson"] ?>'),defaultAvatars:JSON.parse('<?php echo $vars["defaultAvatars"] ?>'),info:JSON.parse('<?php echo $vars["info"] ?>')};</script>
        <script src="<?php echo $app->asset('js/customer-chat-widget.min.js') ?>" type="text/javascript"></script>
        
    </body>
</html>