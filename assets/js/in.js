$(document).ready(function(){
						   //alert();
	 $("#register-form").on("click", function(e) {
	 	e.preventDefault();
		alert();
	 	var data ={};

	 	data['user_email'] = $("#email").val();
	 	data['user_password'] = $("#password").val();
	 	data['user_profile_for'] = $("#profile_for").val();
	 	
		$.ajax({
			type: 'POST',
			url:'http://localhost/marriagejunction/user/add_',
			dataType:'json',
			data:data,
			success: function(data) {
				if(data.status == 1) {
					$("#register-form").css('display','none');
					$("#register-next").css('display','block');
				} else {
					$("#error_msg").html("<div class='alert alert-danger fade in' role='alert'><strong>!oops </strong>"+data.message+" </div>");
				}
			},
			error: function() {

			}
		});
	 });
});// JavaScript Document