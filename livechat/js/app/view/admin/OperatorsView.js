//==============================================================================
//
//  Operators view
//
//==============================================================================

(function(app, $, _, config)
{
    app.OperatorsView = Backbone.View.extend({
    
        mailExp  : new RegExp('^[-+\\.0-9=a-z_]+@([-0-9a-z]+\\.)+([0-9a-z]){2,4}$', 'i'),
        
        events : {
        
            'click #customer-chat-operators-back'            : 'showList',
            'click #customer-chat-operators-add'             : 'showAdd',
            'click #customer-chat-operators-change-password' : 'showChangePassword',
            'click #customer-chat-operators-cancel'          : 'showEdit',
            'click .customer-chat-operators-edit'            : 'showEdit',
            'click .customer-chat-operators-remove'          : 'deleteOperator',
            'click #avatar-from-collection'                  : 'selectAvatar',
            'click #customer-chat-operators-save'            : 'save'
        },
        
        initialize : function()
        {
            // Initialize models
            
            this.model = app.model.chat;
            this.user  = app.model.user;
            
            // Cache view elements
            
            this.$list        = this.$('#customer-chat-operators-list');
            this.$operators   = this.$list.find('.customer-chat-content-messages-wrapper');
            this.$edit        = this.$('#customer-chat-operators-edit');
            this.$save        = this.$('#customer-chat-operators-save');
            this.$back        = this.$('#customer-chat-operators-back');
            this.$editInputs  = this.$edit.find('input');
            this.$avatarInput = this.$edit.find('#avatarUploadField');
            this.$loading     = this.$('.customer-chat-content-loading-icon').hide();
            
            if(this.user.hasRole('OPERATOR'))
            {
                this.$back.remove();
                
                this.listenToOnce(this.model, 'change:operators', function()
                {
                    this.showEdit(null, this.user.get('id'));
                });
            }
            
            this.$editInputs.blur($.proxy(this.validateEdit, this));
            
            // Handle rendering
            
            this.model.on('change:operators', this.render, this);
            
            this.showList();
            this.render();
            
            this.model.loadOperators();
        },
        
        render : function()
        {
            // Display all of the operators
            
            this.$operators.html('');
            
            var _this = this;
            
            _.each(this.model.getOperators(), function(operator)
            {
                var $item = $(app.template.operatorItem);
                
                // Fill the element with data
                
                if(operator.image) _this.setEditAvatarIcon($item, operator.image);
                
                $item.find('.customer-chat-operator-name').html(operator.name);
                $item.find('.customer-chat-operator-mail').html(operator.mail);
                
                $item.find('.customer-chat-operators-edit')  .data('id', operator.id);
                $item.find('.customer-chat-operators-remove').data('id', operator.id);
                
                // Add operator to the list
                
                _this.$operators.append($item);
            });
        },
        
        setEditAvatarIcon : function($item, image)
        {
            $item.find('.avatar').css('background-image', 'url("' + image + '")');
        },
        
        showList : function()
        {
            // Store the state
            
            this.state = 'list';
            
            this.$edit.hide();
            this.$list.show();
            
            this.enable();
        },
        
        showEdit : function(evt, id)
        {
            var _this = this;
            
            // Store the state
            
            var prevState = this.state;
            
            this.state = 'edit';
            
            // Hide add mode-specific fields
            
            this.$edit.find('.add-only, .pass-only').hide();
            this.$edit.find('.edit-only').show();
            
            // Remove old validation classes
            
            this.$edit.find('.customer-chat-input-error').removeClass('customer-chat-input-error');
            
            // Get the user
            
            var $link = evt ? $(evt.currentTarget) : null;
            
            var userId, user;
            
            if(prevState !== 'pass')
            {
                // Get the edited operator
                
                userId = $link ? $link.data('id') : id;
                user   = app.model.selectedOperator = app.model.chat.getOperator(userId);
            }
            else
            {
                user   = app.model.selectedOperator;
                userId = user.id;
            }
            
            // Update tab's header
            
            this.$edit.find('.customer-chat-tabs-header').html(this.user.get('id') === id ? 'Edit profile' : 'Edit operator');
            
            // Show the edit form with operator's data
            
            if(user)
            {
                this.$edit.find('#usernameField').val(user.name);
                this.$edit.find('#mailField')    .val(user.mail);
                
                if(user.image) _this.setEditAvatarIcon(this.$edit, user.image);
            }
            
            // Initialize file uploader
            
            var dialogs = app.view.dialogs;
            
            this.$avatarInput.ajaxfileupload({
            
                action : config.uploadAvatarPath,
                params : { userId : userId },
                
                onStart : function()
                {
                    dialogs.message('Uploading', 'Uploading image, please wait...');
                },
                
                onComplete : function(response)
                {
                    dialogs.message('Avatar uploaded', 'Uploaded successfully');
                    
                    // Update the model
                    
                    user.image = response.image;
                    
                    _this.model.saveOperator(user);
                    
                    // Update the view
                    
                    _this.setEditAvatarIcon(_this.$edit, user.image);
                }
            });
            
            this.$list.hide();
            this.$edit.show();
        },
        
        deleteOperator : function(evt)
        {
            var $link = $(evt.currentTarget);
            
            // Get the operator in question
            
            var user = app.model.chat.getOperator($link.data('id'));
            
            // Ask for confirmation
            
            var _this   = this;
            var buttons = {};
            
            buttons['Remove "%user%"'.replace('%user%', user.name)] = function()
            {
                // Remove the user
                
                _this.model.deleteOperator(user);
                
                $(this).dialog('close');
                
                // Update the scroller
                
                $(window).trigger('resize');
            };
            
            app.view.dialogs.confirm(
            
                'Remove "%user%"?'.replace('%user%', user.name),
                'Are you sure you want to permanently delete this user?',
                
                buttons
            );
        },
        
        showAdd : function()
        {
            // Store the state
            
            this.state = 'add';
            
            // Update tab's header
            
            this.$edit.find('.customer-chat-tabs-header').html('Add new operator');
            
            // Show add mode-specific fields
            
            this.$edit.find('.edit-only, .pass-only').hide();
            this.$edit.find('.add-only').show();
            
            // Remove old validation classes
            
            this.$edit.find('.customer-chat-input-error').removeClass('customer-chat-input-error');
            
            // Create a new user
            
            app.model.selectedOperator = { roles : [ 'OPERATOR' ] };
            
            // Show the edit form with empty data
            
            this.$edit.find('#usernameField').val('');
            this.$edit.find('#mailField')    .val('');
            this.$edit.find('#passField')    .val('');
            this.$edit.find('#rePassField')  .val('');
            
            this.$list.hide();
            this.$edit.show();
        },
        
        showChangePassword : function()
        {
            // Store the state
            
            this.state = 'pass';
            
            // Update tab's header
            
            this.$edit.find('.customer-chat-tabs-header').html('Change password');
            
            // Show add mode-specific fields
            
            this.$edit.find('.edit-only, .add-only').hide();
            this.$edit.find('.pass-only').show();
            
            if(this.user.hasRole('ADMIN')) this.$edit.find('.current-pass').hide();
            
            // Remove old validation classes
            
            this.$edit.find('.customer-chat-input-error').removeClass('customer-chat-input-error');
            
            // Show the change password form with empty data
            
            this.$edit.find('#changePassCurrentField').val('');
            this.$edit.find('#changePassField')       .val('');
            this.$edit.find('#changePassRetypeField') .val('');
            
            this.$list.hide();
            this.$edit.show();
        },
        
        selectAvatar : function()
        {
            var _this = this;
            var  view = new app.SelectAvatarView({ model : config.defaultAvatars });
            
            app.view.dialogs.confirm('Select avatar', view, {
                
                'OK' : function()
                {
                    var $this = $(this);
                    var image = view.selected;
                    
                    $this.dialog('close');
                    
                    // Update the user's model
                    
                    if(image)
                    {
                        // Update the model
                        
                        var user = app.model.selectedOperator;
                        
                        user.image = image;
                        
                        _this.model.saveOperator(user);
                        
                        // Update the view
                        
                        _this.setEditAvatarIcon(_this.$edit, user.image);
                    }
                }
            });
        },
        
        save : function()
        {
            // Return if data not valid
            
            if(!this.isEditValid())
            {
                return;
            }
            
            // Don't allow the operation to run second time simultaneously
            
            if(this.syncing)
            {
                return;
            }
            
            this.disable();
            
            // Update operator's data
            
            var user = app.model.selectedOperator;
            
            if(user)
            {
                if(this.state == 'edit' || this.state == 'add')
                {
                    user.name     = this.$edit.find('#usernameField').val();
                    user.mail     = this.$edit.find('#mailField').val();
                    user.password = this.$edit.find('#passField').val();
                }
                else if(this.state == 'pass')
                {
                    user.currPassword = this.$edit.find('#changePassCurrentField').val();
                    user.password     = this.$edit.find('#changePassField').val();
                }
                
                var _this = this;
                
                app.model.chat.once('operator:saved', function(errors)
                {
                    _this.enable();
                    
                    if(_this.user.hasRole('ADMIN')) _this.showList();
                    else                            _this.showEdit();
                });
                
                app.model.chat.once('operator:saveError', function(errors)
                {
                    _this.enable();
                    
                    app.view.dialogs.formError('Form error', _.values(errors));
                });
                
                app.model.chat.saveOperator(user);
            }
            else
            {
                this.enable();
            }
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
                
                if(_this.state == 'add')
                {
                    _this.showList();
                }
            
            }, 500);
        },
        
        validateEdit : function(evt, full)
        {
            this.errors = false;
            
            var _this   = this;
            var $inputs = full ? this.$editInputs : $(evt.target);
            
            if(!full)
            {
                var matchFieldId = $(evt.target).data('validator-match');

                if(matchFieldId)
                {
                    $inputs = $inputs.add(_this.$el.find('#' + matchFieldId));
                }
            }
            
            _this.errors = [];
            
            function addError($el, msg)
            {
                $el.addClass('customer-chat-input-error');
                
                if($el.data('validator-msg') !== false)
                {
                    var label = $el.data('validator-label');
                    
                    if(label) msg = label + ': ' + msg;
                    
                    _this.errors.push(msg);
                }
                else
                {
                    _this.errors.push(false);
                }
            }
            
            $inputs.each(function()
            {
                var $el = $(this);
                
                // Skip validation if specific state is defined
                
                var state   = $el.data('validator-state');
                var exState = $el.data('validator-state-ex'); // Exclusive state (not to validate if in this state)
                
                if(state   && state   !== _this.state) return;
                if(exState && exState === _this.state) return;
                
                // Reset validation style
                
                $el.removeClass('customer-chat-input-error');
                
                // Perform validation
                
                switch($el.data('validator'))
                {
                    case 'mail':
                        if($el.val().length == 0 || !_this.mailExp.test($el.val()))
                        {
                            addError($el, 'Enter valid e-mail address');
                        }
                    break;
                    
                    case 'notEmpty':
                        if($el.val().length == 0)
                        {
                            addError($el, 'Value cannot be empty');
                        }
                    break;
                    
                    case 'password':
                        if($el.val().length < 6)
                        {
                            addError($el, 'Password has to be at least 6 characters long');
                        }
                    break;
                }
                
                var matchFieldId = $el.data('validator-match');
                
                if(matchFieldId)
                {
                    var $matchEl = _this.$el.find('#' + matchFieldId);
                    
                    if($el.val() !== $matchEl.val())
                    {
                        addError($el, 'Passwords have to match');
                    }
                }
            });
            
            // Display error messages
            
            if(full && this.errors.length > 0)
            {
                app.view.dialogs.formError('Form error', this.errors);
            }
        },
        
        isEditValid : function()
        {
            this.validateEdit(null, true);
            
            return this.errors.length === 0;
        }
    });

})(window.Application, jQuery, _, window.chatConfig);