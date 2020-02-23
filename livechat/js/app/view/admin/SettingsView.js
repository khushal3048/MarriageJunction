//==============================================================================
//
//  Settings view
//
//==============================================================================

(function(app, $)
{
    app.SettingsView = Backbone.View.extend({
    
        mailExp  : new RegExp('^[-+\\.0-9=a-z_]+@([-0-9a-z]+\\.)+([0-9a-z]){2,4}$', 'i'),
        colorExp : new RegExp('^#(([0-9a-fA-F]{3})|([0-9a-fA-F]{6}))$'),
        
        events : {
        
            'click #customer-chat-ui-save'  : 'save',
            'click #customer-chat-ui-reset' : 'reset',
            'change #inputMsgSound'         : 'playSound'
        },
        
        errors : false,
        
        inputs : null,
        
        syncing : false,
        
        initialize : function()
        {
            // Initialize models
            
            this.model = app.model.uiSettings;
            
            // Cache view elements
            
            this.$inputs   = this.$('*[name]');
            this.$msgSound = this.$('#inputMsgSound');
            this.$save     = this.$('#customer-chat-ui-save');
            this.$loading  = this.$('.customer-chat-content-loading-icon').hide();
            
            this.$inputs.blur($.proxy(this.validate, this));
            
            // Initialize view components
            
            this.initColorPickers();
            
            // Initialize services
            
            this.soundPlayer = app.service.soundPlayer;
            
            var _this = this;
            
            this.$msgSound.find('option').each(function()
            {
                var info = {};
                info[this.value] = this.value;
                
                _this.soundPlayer.addSounds(info);
            });
            
            // Handle rendering
            
            this.model.on('change',  this.render,  this);
            this.model.on('request', this.disable, this);
            this.model.on('sync',    this.enable,  this);
            
            this.render();
        },
        
        validate : function(evt, full)
        {
            this.errors = false;
            
            var _this = this;
            
            this.$inputs.each(function()
            {
                var $el = $(this);
                
                // Reset validation style
                
                $el.removeClass('customer-chat-input-error');
                
                // Perform validation
                
                switch($el.data('validator'))
                {
                    case 'color':
                        if($el.val().length == 0 || !_this.colorExp.test($el.val()))
                        {
                            $el.addClass('customer-chat-input-error');
                            
                            _this.errors = true;
                        }
                    break;
                    
                    case 'mail':
                        if($el.val().length == 0 || !_this.mailExp.test($el.val()))
                        {
                            $el.addClass('customer-chat-input-error');
                            
                            _this.errors = true;
                        }
                    break;
                    
                    case 'number':
                        if(!(/^[\d]+$/.test($el.val()) && parseInt($el.val()) >= 0))
                        {
                            $el.addClass('customer-chat-input-error');
                            
                            _this.errors = true;
                        }
                    break;
                }
            });
            
            // Display message if errors are present
            
            if(full && this.errors)
            {
                app.view.dialogs.message('Form error', 'Some settings are invalid');
            }
        },
        
        isValid : function()
        {
            this.validate(null, true);
            
            return !this.errors;
        },
        
        save : function()
        {
            if(this.isValid())
            {
                var attributes = {};
                
                this.$inputs.each(function()
                {
                    var $el = $(this);
                    
                    if($el.attr('type') == 'checkbox')
                    {
                        attributes[$el.attr('name')] = $el.is(':checked') ? 'true' : 'false';
                    }
                    else
                    {
                        attributes[$el.attr('name')] = $el.val();
                    }
                });
                
                if(!this.syncing)
                {
                    this.model.save(attributes);
                }
            }
        },
        
        reset : function()
        {
            // Ask for confirmation
            
            var _this = this;
            
            app.view.dialogs.confirm(
            
                'Reset settings',
                'Are you sure you want to reset all the settings?', {
                    
                    'Reset' : function()
                    {
                        _this._reset();
                        
                        $(this).dialog('close');
                    }
                }
            );
        },
        
        _reset : function()
        {
            // Actual settings reset
            
            this.model.reset();
        },
        
        render : function()
        {
            var _this = this;
            
            this.$inputs.each(function()
            {
                var $el = $(this);
                
                // Display the model value in the input element
                
                if($el.attr('type') == 'checkbox')
                {
                    $el.attr('checked', _this.model.get($el.attr('name')) == 'true');
                }
                else
                {
                    $el.val(_this.model.get($el.attr('name')));
                }
            });
            
            this.validate();
        },
        
        disable : function()
        {
            this.syncing = true;
            
            this.$save.addClass('button-disabled');
            this.$loading.fadeIn();
        },
        
        enable : function()
        {
            var _this = this;
            
            setTimeout(function()
            {
                _this.$save.removeClass('button-disabled');
                _this.$loading.fadeOut();
                
                _this.syncing = false;
            
            }, 500);
        },
        
        initColorPickers : function()
        {
            $('.color-input').each(function()
            {
                var $el = $(this);
                
                // -----
                
                $el.ColorPicker({
                
                    onSubmit : function(hsb, hex, rgb)
                    {
                            $el.val('#' + hex);
                            $el.ColorPickerHide();
                    },
                    
                    onChange : function(hsb, hex, rgb)
                    {
                        $el.val('#' + hex);
                        $el.blur();
                    },
                    
                    onBeforeShow : function()
                    {
                        $el.ColorPickerSetColor(this.value);
                    }
                })
                .bind('keyup', function()
                {
                    $el.ColorPickerSetColor(this.value);
                });
            });
        },
        
        playSound : function()
        {
            this.soundPlayer.play(this.$msgSound.val());
        }
    });

})(window.Application, jQuery);