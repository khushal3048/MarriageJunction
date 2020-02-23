
   
$(function() {
    
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
	var $registernext = $('#register-next');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;
	
	
    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
				var $email = "";
                if ($lg_username == "" || $lg_password == "") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Enter Valid Username Or Password..");
                } else {
					$.ajax({
						type:'POST',
						url:'http://localhost/marriagejunction/user_operation/user_login',
						dataType:'json',
						data:{username:$lg_username,
							  password:$lg_password	
							 },
						success:function(data) {
							if(data.status == 1) {
								window.location.href="http://localhost/marriagejunction/user/profile";
							} else if(data.status == 2){
								window.location.href="http://localhost/marriagejunction/user/view_wizard";	
							}else {
								msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Invalid Credentials..");
							}
							
						},
						error:function() {
						
								msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Something Went Wrong..");
						}
					});
                }
                return false;
                break;
            case "lost-form":
                var $ls_email=$('#lost_email').val();
				//var user-email=$('#lost_email').val();
                if ($ls_email == "") {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Plz Enter Your Email");
                } else {
					//alert($ls_email);
					$.ajax({
						type:'POST',
						url:'http://localhost/marriagejunction/user_operation/forgot',
						dataType:'json',
						data:{ls_email:$ls_email},
						success:function(data) {
							if(data.status == 1) {
								msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Email Succesfully Send");
							} else {
								msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Email Not Registred");
							}
							
						},
						error:function() {
								msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Something Went Worng....");
						}	   
					});
                    
                }
                return false;
                break;
            default:
                return false;
        }
        return false;
    });
    
    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
    $('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
    $('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
    $('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });
/*	$("#btn_next").click( function(){ modalAnimate($formRegister, $registernext); $(".modal-content").css('width','402px'); });*/
	$("#btn_next").click( function(){ 
										var $reg_email = $('#register_email').val();
										var $reg_pass = $('#register_password').val();
										var $pro_for = $('#profilefor').val();
									//	var $email_patern = '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$';
										
										if($reg_email == "" || $reg_pass == "" || $pro_for == -1)
										{
											msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Plz Fill Up all Fields....");
										}
										else
										{
											$.ajax({
												type:'POST',
												url:'http://localhost/marriagejunction/user_operation/chkemail',
												dataType:'json',
												data:{email : $reg_email},
												success:function(data) {
													if(data.status == 1) {
															modalAnimate($formRegister, $registernext);
															$(".modal-content").css('width','402px');	
													} else {
														msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Email Already Exist");
													}
												},
												error:function() {
												
														alert('Something Went Wrong');
												}
											});											
										}
									});
	/*$("#btn_next").on("click", function(){
					$("#register-form").css('display','none');
					$("#register-next").css('display','block');
					$("#div-forms").css('height','auto');
					$(".modal-content").css('width','402px');
					
				});*/
	
	$("#btn_sign_up").on("click", function(e) {
	 	e.preventDefault();
		
	 	var data ={};

	 	data['user_email'] = $("#register_email").val();
	 	data['user_password'] = $("#register_password").val();
	 	data['user_profile_for'] = $("#profilefor").val();
		data['first_name'] = $("#first_name").val();
		data['last_name'] = $("#last_name").val();
		data['b_date'] = $("#b_date").val();
		data['b_month'] = $("#b_month").val();
		data['b_year'] = $("#b_year").val();
		data['religion'] = $("#religion").val();
		data['mother_tongue'] = $("#mother_tongue").val();
		data['live'] = $("#live").val();
		if(data['user_profile_for'] == "Son")
		{
			data['gender'] = "Male";
		}
		else if(data['user_profile_for'] == "Daughter")
		{
			data['gender'] = "Female";
		}
		else if(data['user_profile_for'] == "Brother")
		{
			data['gender'] = "Male";
		}
		else if(data['user_profile_for'] == "Sister")
		{
			data['gender'] = "Female";
		}
		else
		{
			data['gender'] =  $("input[name=rdogender]:checked").val();
		}
		
	//	console.log(data);
		if(data['first_name'] == "" || data['last_name'] == "" || data['b_date'] == -1 || data['b_month'] == -1 || data['b_year'] == -1 || data['religion'] == -1 || 
			data['mother_tongue'] == -1 || data['live'] == -1)
		{
			msgChange($('#div-register-next-msg'), $('#icon-register-next-msg'), $('#text-register-next-msg'), "error", "glyphicon-remove", "Plz Fill Up all Fields....");
		}
		else
		{
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/user_operation/add_',
				dataType:'json',
				data:data,
				success:function(data) {
					if(data.status == 1) {
					window.location.href="http://localhost/marriagejunction/user/view_wizard";
					} else {
						alert("register not valid");
					}
				},
				error:function() {
				
						alert('Something Went Wrong');
				}
			});
		}
	 });

    
    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }
    
    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }
    
    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
  		}, $msgShowTime);
    }
});