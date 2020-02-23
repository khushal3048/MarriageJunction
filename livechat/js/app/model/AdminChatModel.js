//==============================================================================
//
//  Chat model
//
//==============================================================================

(function(app, $, config, _)
{
    var AdminChatModel = app.AdminChatModel = Backbone.Model.extend({
    
        defaults : {
            
            name : 'anonymous',
            mail : ''
        },
        
        usersCache       : {},
        guestsCache      : {},
        lastMessages     : [],
        readMessages     : {},
        operatorsReady   : false,
        lastTypingUpdate : 0,
        talkingUsersIds  : [],
        
        initialize : function()
        {
            // Initialize models
            
            this.user = app.model.user;
            
            // Read operators' data if any
            /*
            if($.cookie('customer-chat-admin-users'))
            {
                this.usersCache = JSON.parse($.cookie('customer-chat-admin-users'));
            }*/
            
            // Update state after operators are loaded
            
            this.once('change:operators', function()
            {
                this.operatorsReady = true;
            
            }, this);
            
            // Handle typing status
            
            this.on('user:store', this.handleTypingUser, this);
            
            // Handle chatting features
            
            this.manageConnection();
        },
        
        checkUsers : function()
        {
            // Check if there's any user on-line
            
            var _this = this;
            
            $.get(config.getOnlineUsersPath, function(data)
            {
                if(data.success)
                {
                    // Notify about online user(s)
                    
                    _this.trigger('users:online', data.users);
                }
            });
        },
        
        keepAlive : function()
        {
            // Send keep-alive request
            
            $.get(config.keepAlivePath);
        },
        
        handleTypingUser : function(user)
        {
            if(this.talkingUsersIds.indexOf(user.id) === -1)
            {
                this.talkingUsersIds.push(user.id);
            }
        },
        
        updateTypingStatus : function(secondUserId)
        {
            // Send the request only once per given amount of time
            
            var time = (new Date()).getTime();
            
            if(this.lastTypingUpdate + AdminChatModel.POLLING_INTERVAL < time)
            {
                this.lastTypingUpdate = time;
                
                // Send typing status update request

                $.post(config.updateTypingStatusPath, { secondUserId : secondUserId, status : true });
            }
        },
        
        getTypingStatus : function()
        {
            // Get users' IDs
            
            if(this.talkingUsersIds.length > 0)
            {
                // Get typing status
                
                var _this = this;
                
                $.post(config.getTypingStatusPath, { ids : this.talkingUsersIds }, function(data)
                {
                    if(data.success)
                    {
                        var typing = _this.filterTyping(data.results);
                        
                        if(typing.length > 0) _this.trigger('users:typing', typing);
                    }
                });
            }
        },
        
        filterTyping : function(data)
        {
            var result = [];
            
            for(var id in data)
            {
                if(data[id]) result.push(id);
            }
            
            return result;
        },
        
        getMessages : function()
        {
            // Poll new messages data
            
            var _this = this;
            
            $.get(config.newMessagesPath, function(data)
            {
                // Check if there are any new messages
                
                data = data.messages;
                
                if(data.length > 0)
                {
                    // Don't include already received messages
                    
                    data = _this.filterNewMessages(data);
                    
                    // Collect operator(s) info
                    
                    _this.loadUsersData(data, function()
                    {
                        _this.trigger('messages:new', data);
                    });
                }
            });
        },
        
        getLastMessages : function(guestId, lastReadId, always)
        {
            // Get last messages data
            
            $.post(config.lastMessagesPath, { lastMsgId : lastReadId, guestId : guestId }).success(function(data)
            {
                always(data.messages);
            
            }).fail(function()
            {
                always([]);
            });
        },
        
        storeUser : function(user)
        {
            this.usersCache[user.id] = user;
            
            // Notify about user stored
            
            this.trigger('user:store', user);
            
            // Save the cookie
            /*
            var date    = new Date();
            var minutes = 15;
            
            date.setTime(date.getTime() + minutes * 60 * 1000);
            
            $.cookie('customer-chat-admin-users', JSON.stringify(this.usersCache), { expires : date });*/
        },
        
        storeGuest : function(guest)
        {
            this.guestsCache[guest.id] = guest;
            
            // Save the cookie
            /*
            var date    = new Date();
            var minutes = 15;
            
            date.setTime(date.getTime() + minutes * 60 * 1000);
            
            $.cookie('customer-chat-admin-guests', JSON.stringify(this.guestsCache), { expires : date });*/
        },
        
        clearOperator : function(operator)
        {
            delete this.usersCache[operator.id];
            
            // Update the cookie
            /*
            var date    = new Date();
            var minutes = 15;
            
            date.setTime(date.getTime() + minutes * 60 * 1000);
            
            $.cookie('customer-chat-admin-users', JSON.stringify(this.usersCache), { expires : date });*/
        },
        
        clearGuest : function(guest)
        {
            delete this.guestsCache[guest.id];
            
            // Update the cookie
            /*
            var date    = new Date();
            var minutes = 15;
            
            date.setTime(date.getTime() + minutes * 60 * 1000);
            
            $.cookie('customer-chat-admin-guests', JSON.stringify(this.guestsCache), { expires : date });*/
        },
        
        loadOperators : function()
        {
            // Get the list of all operators
            
            var _this = this;
            
            $.get(config.listOperatorsPath, function(data)
            {
                // Store the operators
                
                _.each(data.users, function(operator)
                {
                    _this.storeUser(operator)
                });
                
                // Notify
                
                _this.trigger('change:operators');
            });
        },
        
        getOperators : function()
        {
            var result = [];
            
            for(var key in this.usersCache)
            {
                result.push(this.usersCache[key]);
            }
            
            return result;
        },
        
        getOperator : function(id)
        {
            return this.usersCache[id];
        },
        
        getGuest : function(id)
        {
            return this.guestsCache[id];
        },
        
        saveOperator : function(operator)
        {
            // Save operator on the server
            
            var data = _.clone(operator);
            
            data.roles = data.roles.join(',');
            
            var _this = this;
            
            $.post(config.saveOperatorPath, data, function(data)
            {
                if(data.success)
                {
                    // Save operator in the local cache
                    
                    if(data.id)
                    {
                        // store ID generated on server-side (only on create action)
                        
                        operator.id = data.id;
                    }
                    
                    _this.storeUser(operator);
                    
                    // Notify success
                    
                    _this.trigger('change:operators operator:saved', operator);
                }
                else
                {
                    // Notify failure
                    
                    _this.trigger('operator:saveError', data.errors);
                }
            });
        },
        
        deleteOperator : function(operator)
        {
            // Remove operator from the local cache
            
            this.clearOperator(operator);
            
            // Remove operator from the server
            
            var _this = this;
            
            $.post(config.deleteOperatorPath, operator, function(data)
            {
                if(data.success)
                {
                    // Notify success
                    
                    _this.trigger('change:operators operator:deleted');
                }
                else
                {
                    // Notify error
                    
                    _this.trigger('operator:deleteError');
                }
            })
        },
        
        loadUsersData : function(messages, callback)
        {
            var _this = this;
            
            var loadCount = 0;
            
            // Check if there's any message from a not known operator
            
            for(var i = 0; i < messages.length; i++)
            {
                var message = messages[i];
                
                if(!this.usersCache[message.from_id])
                {
                    // Load operator's info
                    loadCount++;
                    
                    $.post(config.getUserPath, { id : message.from_id })
                    
                        .success(function(data)
                        {
                            if(data.success)
                            {
                                // Store the data

                                _this.storeUser(data.user);
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
            return this.usersCache[id] && this.usersCache[id].name;
        },
        
        queryHistory : function(query, callback, errorCallback)
        {
            $.post(config.queryHistoryPath, { query : JSON.stringify(query) }, function(data)
            {
                callback(data);
                
            }).fail(errorCallback);
        },
        
        sendMessage : function(message)
        {
            // Prepare data
            
            var input = {
            
                to   : message.get('to'),
                body : message.get('body')
            };
            
            // Send message to the server
            
            var _this = this;
            
            $.post(config.sendMessagePath, input, function(data)
            {
                if(data.success)
                {
                    // Notify success
                    
                    _this.trigger('messages:sent', data.to, data.message);
                }
                else
                {
                    // Notify error
                    
                    _this.trigger('messages:sendError');
                }
            });
        },
        
        manageConnection : function()
        {
            var _this = this;
            
            function step()
            {
                if(_this.user.hasRole('OPERATOR'))
                {
                    // Poll mew messages

                    _this.getMessages();

                    // Keep connection alive

                    _this.keepAlive();

                    // Checking typing status

                    _this.getTypingStatus();
                }
                
                // Checking users availability
                
                _this.checkUsers();
            
            }
            
            setInterval(step, AdminChatModel.POLLING_INTERVAL);
            
            // Start immediately the first time
            
            step();
        },
        
        filterNewMessages : function(messages)
        {
            var result = [];
            
            _.each(messages, function(message)
            {
                var lastFromTalk = this.readMessages[message.talk_id];
                
                if(!lastFromTalk || message.id > lastFromTalk)
                {
                    result.push(message);
                    
                    this.readMessages[message.talk_id] = message.id;
                }
            
            }, this);
            
            return result;
        }
    },
    {
        POLLING_INTERVAL : 5000
    });

})(window.Application, jQuery, window.chatConfig, _);