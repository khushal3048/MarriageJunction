//==============================================================================
//
//  Chat model
//
//==============================================================================

(function(app, $, config, _)
{
    var GuestChatModel = app.GuestChatModel = Backbone.Model.extend({
    
        defaults : {
            
            name : 'anonymous',
            mail : ''
        },
        
        operatorsCache : {},
        
        lastMessages : [],
        
        lastTypingUpdate : 0,
        
        initialize : function()
        {
            // Handle chatting features
            
            this.once('operators:online', this.manageConnection, this);
            
            this.on('messages:new', this.storeMessages, this);
        },
        
        autoLogin : function()
        {
            // Check if user is already logged in
            
            var _this = this;
            
            $.post(config.isLoggedInPath, { info : JSON.stringify(config.info) }, function(data)
            {
                if(data.success)
                {
                    // Store the login data
                    
                    _this.set({ name : data.name, mail : data.mail, image : data.image });
                    
                    // Notify success
                    
                    _this.trigger('login:success');
                    
                    // Read previous messages if any
                    
                    $.get(config.lastMessagesPath, function(data)
                    {
                        if(data.success && data.messages.length > 0)
                        {
                            _this.trigger('messages:last', data.messages);
                        }
                    });
                }
                else
                {
                    // Notify about need to log in again
                    
                    _this.trigger('login:login');
                }
            });
        },
        
        login : function(input)
        {
            var _this = this;
            
            input.info = JSON.stringify(config.info);
            
            $.post(config.loginPath, input, function(data)
            {
                if(data.success)
                {
                    // Store the login data
                    
                    _this.set({ name : input.name, mail : input.mail, image : input.image });
                    
                    // Notify success
                    
                    _this.trigger('login:success');
                }
                else
                {
                    // Notify about need to log in again
                    
                    _this.trigger('login:error');
                }
            });
        },
        
        checkOperators : function()
        {
            // Check if there's any operator on-line
            
            var _this = this;
            
            $.get(config.isOperatorOnlinePath, function(data)
            {
                if(data.success)
                {
                    // Notify about online operator(s)
                    
                    _this.trigger('operators:online');
                }
                else
                {
                    // Notify about no operator(s)
                    
                    _this.trigger('operators:offline');
                }
            });
        },
        
        keepAlive : function()
        {
            // Send keep-alive request
            
            $.get(config.keepAlivePath);
        },
        
        updateTypingStatus : function()
        {
            // Get operator's ID
            
            var operatorId = this.lastOperator && this.lastOperator.id;
            
            if(operatorId)
            {
                // Send the request only once per given amount of time

                var time = (new Date()).getTime();

                if(this.lastTypingUpdate + GuestChatModel.POLLING_INTERVAL < time)
                {
                    this.lastTypingUpdate = time;

                    // Send typing status update request

                    $.post(config.updateTypingStatusPath, { secondUserId : operatorId, status : true });
                }
            }
        },
        
        getTypingStatus : function()
        {
            // Get operator's ID
            
            var operatorId = this.lastOperator && this.lastOperator.id;
            
            if(operatorId)
            {
                // Get typing status
                
                var _this = this;
                
                $.post(config.getTypingStatusPath, { ids : [ operatorId ] }, function(data)
                {
                    if(data.success && data.results[operatorId])
                    {
                        _this.trigger('operator:typing');
                    }
                });
            }
        },
        
        getMessages : function()
        {
            // Poll new messages data
            
            var _this = this;
            
            $.get(config.newMessagesPath, function(data)
            {
                // Check if there are any new messages
                
                if(data.length > 0)
                {
                    // Collect operator(s) info
                    
                    _this.loadOperatorsData(data, function()
                    {
                        // Notify about new messages
                        
                        data.authorType = 'operator';
                        
                        _this.trigger('messages:new', data);
                    });
                }
            });
        },
        
        storeMessages : function(messages)
        {
            // Prepare the messages
            
            _.each(messages, function(message)
            {
                if(!message.datetime && message.time)
                {
                    message.datetime = message.time.getTime();
                }
            });
            
            // Save the messages
            
            this.lastMessages = this.lastMessages.concat(messages);
            
            // Store in the cookie
            /*
            var date    = new Date();
            var minutes = 10;
            
            date.setTime(date.getTime() + minutes * 60 * 1000);
            
            $.cookie('customer-chat-messages', JSON.stringify(this.lastMessages), { expires : date });*/
        },
        
        storeOperator : function(operator)
        {
            this.lastOperator = this.operatorsCache[operator.id] = operator;
            
            // Save the cookie
            /*
            var date    = new Date();
            var minutes = 15;
            
            date.setTime(date.getTime() + minutes * 60 * 1000);
            
            $.cookie('customer-chat-operators', JSON.stringify(this.operatorsCache), { expires : date });*/
        },
        
        loadOperatorsData : function(messages, callback)
        {
            var _this = this;
            
            var loadCount = 0;
            
            // Check if there's any message from a not known operator
            
            for(var i = 0; i < messages.length; i++)
            {
                var message = messages[i];
                
                if(!this.operatorsCache[message.from_id])
                {
                    // Load operator's info
                    
                    loadCount++;
                    
                    $.post(config.getOperatorPath, { id : message.from_id })
                    
                        .success(function(data)
                        {
                            if(data.success)
                            {
                                // Store the data

                                _this.storeOperator(data.user);
                            }
                        })
                        
                        .always(function()
                        {
                            loadCount--;

                            if(loadCount <= 0)
                            {
                                // Finish the operation

                                callback();
                            }
                        })
                    ;
                }
            }
            
            if(loadCount <= 0)
            {
                // Finish the operation
                
                callback();
            }
        },
        
        getOperatorName : function(id)
        {
            return this.operatorsCache[id] && this.operatorsCache[id].name;
        },
        
        sendMessage : function(message)
        {
            // Prepare data
            
            var input = {
            
                body : message.get('body')
            };
            
            // Send message to the server
            
            var _this = this;
            
            $.post(config.sendMessagePath, input, function(data)
            {
                if(data.success)
                {
                    // Notify success
                    
                    _this.trigger('messages:sent');
                }
                else
                {
                    // Notify error
                    
                    _this.trigger('messages:sendError');
                }
            });
            
            // Store the message
            
            this.storeMessages([ message.attributes ]);
        },
        
        manageConnection : function()
        {
            var _this = this;
            
            setInterval(function()
            {
                // New messages polling
                
                _this.getMessages();
                
                // Keeping connection alive
                
                _this.keepAlive();
                
                // Checking typing status
                
                _this.getTypingStatus();
                
                // Checking operator's availability
                
                _this.checkOperators();
            
            }, GuestChatModel.POLLING_INTERVAL);
        }
    },
    {
        POLLING_INTERVAL : 5000
    });

})(window.Application, jQuery, window.chatConfig, _);