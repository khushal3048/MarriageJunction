<?php
//	include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Marriage Junction.com - The NO. 1 Site For Matrimony, Matrimonial and Marriage</title>
	<meta charset="utf-8">
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />

	<!--=========== jQuery (necessary for Bootstrap's JavaScript plugins) ===================== -->

		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!--===================== Custom Theme files ======================= -->

		<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />

		<link href="<?php echo base_url(); ?>assets/css/oswald_font.css" rel='stylesheet' type='text/css'>

		<link href="<?php echo base_url(); ?>assets/css/ubuntu_font.css" rel='stylesheet' type='text/css'>

		<!-- =============== font-Awesome ================= -->

		<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">


<script>
	$(document).ready(function(){
		$("#login-form").on("submit",function(e){
			e.preventDefault();
				var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
					if($lg_username == "" || $lg_password == "")
					{
						$('#div-login-msg').css('display','block').fadeIn(300).delay(2000).fadeOut(300);
						$('#div-login-msg').val("Plz Enter Username Or Password..");
					}
					else
					{
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
								} else {
									$('#div-login-msg').css('display','block').fadeIn(300).delay(2000).fadeOut(300);
									$('#div-login-msg').val("Wrong Username or Password..");
								}
								
							},
							error:function() {
									$('#div-login-msg').css('display','block').fadeIn(300).delay(2000).fadeOut(300);
									$('#div-login-msg').val("Something Went Wrong..");									
							}
						});
					}
		});
	});
</script>

	<!-- ============================  Navigation Start =========================== -->
		<div class="navbar navbar-inverse-blue navbar">
			<!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
			<div class="navbar-inner">
				<div class="container">
					<div class="navigation">
						<nav id="colorNav">
							<ul>
								<li class="green">
									<a href="#" class="icon-home"></a>
									<ul>
										<li><a href="<?php echo base_url('user/login');?>">Login</a></li>											
										
										<li><a href="#">Help & Support</a></li>
									</ul>
								</li>
					   		</ul>
					 	</nav>
				   	</div>
					<a class="brand" href="<?=base_url();?>"><img src="<?php echo base_url(); ?>asset/upload/MJ.png" alt="logo" style="height: 50px; width: 200px;"></a>
					<div class="pull-right">
						<nav class="navbar nav_bottom" role="navigation">
							<!-- Brand and toggle get grouped for better mobile display -->
				  			<div class="navbar-header nav_2">
					  			<button type="button" class="navbar-toggle navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
					  			</button>
					  			<a class="navbar-brand" href="#"></a>
				   			</div>
				   			<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav nav_1">
									<li class="active"><a href="<?php echo base_url();?>">Home</a></li>
									<li><a href="<?php echo base_url('user/about');?>">About</a></li>
									<li class="last"><a href="<?php echo base_url('user/contact');?>">Contacts</a></li>
								</ul>
					 		</div><!-- /.navbar-collapse -->
						</nav>
				   	</div> <!-- end pull-right -->
				  	<div class="clearfix"> </div>
				</div> <!-- end container -->
			</div> <!-- end navbar-inner -->
		</div> <!-- end navbar-inverse-blue -->
		<!-- ============================  Navigation End ============================ -->

<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?= base_url('user/'); ?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Login</li>
     </ul>
   </div>
   <div class="services">
   		<div><input class="form-text" id="div-login-msg" style="margin-left:150px;color:#FF0000;font-size:18.5px; border:transparent; display:none;" value="" readonly="" /></div>
   	  <div class="col-sm-6 login_left">
	   <form method="post" id="login-form">
  	    <div class="form-item form-type-textfield form-item-name">
	      	<label for="edit-name">Username <span class="form-required" title="This field is required.">*</span></label>
	      	<input type="text" id="login_username" name="user_name" placeholder="Enter the Username" class="form-text">
	    </div>
	    <div class="form-item form-type-password form-item-pass">
	     	 <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
	     	 <input type="password" id="login_password" name="password" placeholder="Enter the Password" class="form-text required">
	    </div>
	    <div class="form-actions">
	    	 <input type="submit" id="login" name="op" value="Log in" class="btn_1 submit">
	    </div>
	   </form>
	  </div>
	  <div class="col-sm-6">
	    <ul class="sharing">
			<li><a href="#" class="facebook" title="Facebook"><i class="fa fa-boxed fa-fw fa-facebook"></i> Share on Facebook</a></li>
		  	<li><a href="#" class="twitter" title="Twitter"><i class="fa fa-boxed fa-fw fa-twitter"></i> Tweet</a></li>
		  	<li><a href="#" class="google" title="Google"><i class="fa fa-boxed fa-fw fa-google-plus"></i> Share on Google+</a></li>
		  	<li><a href="#" class="linkedin" title="Linkedin"><i class="fa fa-boxed fa-fw fa-linkedin"></i> Share on LinkedIn</a></li>
		  	<li><a href="#" class="mail" title="Email"><i class="fa fa-boxed fa-fw fa-envelope-o"></i> E-mail</a></li>
		</ul>
	  </div>
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>


<?php
	include('footer.php');
?>