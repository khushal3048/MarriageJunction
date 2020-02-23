//==============================================================================
//
//  Login form view
//
//==============================================================================

(function(app, $)
{
    app.LoginFormView = Backbone.View.extend({
    
        mailExp : new RegExp('^[-+\\.0-9=a-z_]+@([-0-9a-z]+\\.)+([0-9a-z]){2,4}$', 'i'),
        
        nameValid : false,
        mailValid : false,
        
        initialize : function()
        {
            // Cache view elements
            
            this.$name = this.$('#customer-chat-login-name');
            this.$mail = this.$('#customer-chat-login-mail');
            
            this.$name.on('input change keydown blur', $.proxy(this.validateName, this));
            this.$mail.on('input change keydown blur', $.proxy(this.validateMail, this));
        },
        
        reset : function()
        {
            this.$name.val('');
            this.$mail.val('');
            
            this.$name.removeClass('customer-chat-input-error');
            this.$mail.removeClass('customer-chat-input-error');
        },
        
        validateName : function()
        {
            if(this.$name.val().length == 0)
            {
                this.$name.addClass('customer-chat-input-error');
                
                this.nameValid = false;
            }
            else
            {
                this.$name.removeClass('customer-chat-input-error');
                
                this.nameValid = true;
            }
        },
        
        validateMail : function()
        {
            if(this.$mail.val().length == 0 || !this.mailExp.test(this.$mail.val()))
            {
                this.$mail.addClass('customer-chat-input-error');
                
                this.mailValid = false;
            }
            else
            {
                this.$mail.removeClass('customer-chat-input-error');
                
                this.mailValid = true;
            }
        },
        
        isValid : function()
        {
            this.validateName();
            this.validateMail();
            
            return this.nameValid && this.mailValid;
        }
    });

})(window.Application, jQuery);