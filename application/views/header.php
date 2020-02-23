<!DOCTYPE html>
<html lang="en">
<head>
	<title>Marriage Junction.com - The NO. 1 Site For Matrimony, Matrimonial and Marriage</title>
	<meta charset="utf-8">
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<link rel="shortcut icon" href="<?=base_url();?>asset/upload/MJ_Logo.png">
	
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

		<!--=============== Modals =============-->

			<link href="<?php echo base_url(); ?>assets/css/style_modal.css" rel="stylesheet" type="text/css">
			<script src="<?php echo base_url();?>assets/js/main.js"></script>
			<script type="text/javascript" src="<?=base_url();?>assets/js/search.js"></script>		
		
	<script>
		$(document).ready(function(){
				$(".dropdown").hover(
					function() {
						$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
						$(this).toggleClass('open');
					},
					function() {
						$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
						$(this).toggleClass('open');
					});
					
			$("#profilefor").on("change",function(){
				$profileFor = $("#profilefor").val();
				if($profileFor == 'Self')
				{
					$("#rdo").css('display','block');
					$("#div-forms").css('height','auto');
				}
				else
				{
					$("#rdo").css('display','none');
				}
			});
				
			/*	$("#btn_next").on("click", function(){
					$("#register-form").css('display','none');
					$("#register-next").css('display','block');
					$("#div-forms").css('height','auto');
					$(".modal-content").css('width','402px');
					
				});*/
				/*$("#btn_previous").on("click", function(){
				
					$("#register-form").css('display','block');
					$("#register-next").css('display','none');

					
				});*/
				
	/*			
		$("#btn_sigh_up").on("click", function(e) {
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
		//console.log(data);

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
	
	 });*/
			});
			
	 </script>
	 		 
		 <!--Online Chat With Admin-->
			<script type="text/javascript">
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
			(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/58ce36005b89e2149e1aa203/default';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
			})();
			</script>
		<!--End of Online Chat With Admin-->

	</head>

	
	<body>

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
										<?php 
											$email = $this->session->userdata('userinfo');
											$email1 = $this->session->userdata('username');
											//print_r($email['username']);
											if(!($email || $email1))
											{
										?>
												<li><a href="<?php echo base_url('user/login');?>">Login</a></li>											
										<?php
											}
											else
											{
										?>
												<li><a href="<?php echo base_url('user_operation/user_signout')?>">Log Out</a></li>
												<li><a href="<?php echo base_url('user/changepwd/')."Null";?>">Change Password</a></li>
												<?php
													if($email)
													{
														$em = $email;
													}
													else
													{
														$em = $email1;
													}
													
												 	$pro_id = $this->user_mo->getprofileid($em);
												?>
												<li><a href="<?php echo base_url('user/profile/');?>">Update Profile</a></li>
										<?php
											}
										?>
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
									<?php
										if($email || $email1)
										{
									?>
											<li class="dropdown">
									  			<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account<span class="caret"></span></a>
									  			<ul class="dropdown-menu" role="menu">
													<li><a href="<?php echo base_url('user/profile/');?>">My Profile</a></li>
													<li><a href="<?php echo base_url('user/upgrade');?>">Upgrade Account</a></li>
							  					</ul>
											</li>
									<?php	
										}
										else
										{
									?>
											<li class="active"><a href="<?php echo base_url();?>">Home</a></li>
											<li><a href="<?php echo base_url('user/about');?>">About</a></li>
									<?php
										} 
		//								$email = $this->session->userdata('userinfo');
		//								$email1 = $this->session->userdata('username');
										//print_r($email['username']);
										if($email || $email1)
										{
									?>

											<li class="dropdown">
									  			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches<span class="caret"></span></a>
									  			<ul class="dropdown-menu" role="menu">
													<li><a href="<?php echo base_url('user/matches');?>">New Matches</a></li>
													<li><a href="<?php echo base_url('user/viewed_profile');?>">Who Viewed my Profile</a></li>
													<li><a href="<?php echo base_url('user/viewedprofile');?>">Viewed Profile</a></li>
													<li><a href="<?php echo base_url('user/members');?>">Premium Members</a></li>
							  					</ul>
											</li>
											<li class="dropdown">
							  					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<span class="caret"></span></a>
									  			<ul class="dropdown-menu" role="menu">
													<li><a href="<?php echo base_url('user/search');?>">Regular Search</a></li>
													<li><a href="<?php echo base_url('user/search_id');?>">Search By Profile ID</a></li>
									  			</ul>
											</li>
									<?php
										}
										else
										{
									?>
									<li class="last"><a href="<?php echo base_url('user/contact');?>">Contacts</a></li>
									<?php
										} 
											$email = $this->session->userdata('userinfo');
											$email1 = $this->session->userdata('username');
											//print_r($email['username']);
											if($email || $email1)
											{
									?>
												<li class="last"><a href="<?=base_url('user_operation/user_signout')?>">Sign Out</a></li>
									<?php
										}
										else
										{
									?>			
												<li class="last"><a href="#" data-toggle="modal" data-target="#login-modal">Sign In</a></li>
									<?php
										}
									?>
								</ul>
					 		</div><!-- /.navbar-collapse -->
						</nav>
				   	</div> <!-- end pull-right -->
				  	<div class="clearfix"> </div>
				</div> <!-- end container -->
			</div> <!-- end navbar-inner -->
		</div> <!-- end navbar-inverse-blue -->
		<!-- ============================  Navigation End ============================ -->

<!--------------------------------- Modal ------------------------------------>

	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<img class="img-circle" id="img_logo" src="<?=base_url();?>asset/upload/MJ_Logo.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                
                <!-- Begin # DIV Form -->
				
                <div id="div-forms" style="auto !important">
				             
                    <!-- Begin # Login Form -->
                    <form id="login-form" method="post">
		                <div class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type your username and password.</span>
                            </div>
							
							
				    		<input id="login_username" name="user_name" class="form-control" type="text" placeholder="Enter Your Username" >
				    		<input id="login_password" name="password" class="form-control" type="password" placeholder="Enter Your Password">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
        		    	</div>
				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>
					<!--	
							<center><div><h4 style="padding-top:10px;">OR</h4></div>
					
							<div>
								<button class="btn btn-info"><span class="fa fa-1x fa-facebook"></span> Login With Facebook</button></div><br>
							<div>	<button class="btn btn-info"><span class="fa fa-1x fa-google-plus"></span> Login With Google+</button>
							</div></center>-->
				    	    <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                                <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
				        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" style="display:none;" method="post">
    	    		    <div class="modal-body">
		    				<div id="div-lost-msg">
                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-lost-msg">Type your E-mail.</span>
                            </div>
		    				<input id="lost_email" name="email" class="form-control" type="text" placeholder="Enter Your Registred E-Mail">
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="send_email">Send</button>
                            </div>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Lost Password Form -->
                    
                    <!-- Begin | Register Form -->
                    <form id="register-form" style="display:none;" method="post">
            		    <div class="modal-body" >
		    				<div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Sign up free to connect with right one.</span>
                            </div>

								<input id="register_email" name="email" class="form-control" type="text" placeholder="Enter Your E-Mail">

	                            <input id="register_password" name="password" class="form-control" type="password" placeholder="Create A Password">

                            	<select class="form-control" id="profilefor" name="profile_for" style="margin-top:10px;width:100%;">
									<option value="-1">Create Profile For</option>
									<option>Self</option>
									<option>Son</option>
									<option>Daughter</option>
									<option>Brother</option>
									<option>Sister</option>
	                            </select>
								<div id="rdo" style="display:none;">
									<input type="radio" class="rdogender" name="rdogender" value="Male" style="margin-top:20px; margin-left:20px;" /> Male
									<input type="radio" class="rdogender" name="rdogender" value="Female" style="margin-top:20px; margin-left:10px;" /> Female
								</div>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_next">Next</button>
                            </div>
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Register Form -->

					 <!-- Begin | Register Form -->
                    <form id="register-next" method="post" style="display:none; height:auto">
            		    <div class="modal-body">
		    				<div id="div-register-next-msg">
                                <div id="icon-register-next-msg" class="glyphicon glyphicon-chevron-right"> </div>
                                	<span id="text-register-next-msg">Basic details for an account.</span>
                            </div>
							<div style="margin-top:10px">
                            	<span>Your name</span>
                            </div>
							<div style="margin-bottom:20">
								<div class=col-md-6 style="padding-left:1px;">
                            		<input id="first_name" class="form-control" name="f_name" type="text" style="width:177px;  border-radius: 4px;"  placeholder="First Name" required>
								</div>
								<div class=col-md-6 style="padding-left:1px;">
							 		<input id="last_name" class="form-control" name="l_name" type="text" style="width:177px;  border-radius: 4px;" placeholder="Last Name" required>
                            	</div>
							</div>
							<div style="margin-top:50px">
                            	<span>Your date of birth</span>
                            </div>
							<div style="margin-bottom:10px">
								<div class=col-md-4 style="padding-left:1px;">
                            		<select class="form-control" id="b_date" style="width:110px; border-radius: 4px;" placeholder="Day">
										<option selected="selected" value="-1">Day</option>
										<?php
											for ($i=1; $i<=31; $i++)
											{
										?>
											<option value="<?=$i?>"><?=$i?></option>
										<?php
											}
										?>
									</select>
								</div>
								<div class=col-md-4 style="padding-left:1px;">
							 		<select class="form-control" id="b_month" style="width:110px; border-radius: 4px;" placeholder="Month">
										<option selected="selected" value="-1">Month</option>
										<?php
											for ($i=1; $i<=12; $i++)
											{
										?>
											<option value="<?=$i?>"><?=$i?></option>
										<?php
											}
										?>
									</select>
                            	</div>
								<div class=col-md-4 style="padding-left:1px;" >
							 		<select class="form-control" id="b_year" style="width:115px; border-radius: 4px;" placeholder="Year">
										<option selected="selected" value="-1">Year</option>
										<?php
											for ($i=1996; $i>=1959; $i--)
											{
										?>
											<option value="<?=$i?>"><?=$i?></option>
										<?php
											}
										?>
									</select>
                            	</div>
							</div>
							<div style="margin-top:50px">
                            	<span>Religion</span>		
                            </div>
							<div style="margin-bottom:35px">
								<div class=col-md-12 style="padding-left:1px;">
								<?php $rdata = $this->admin_model->getReligion(); ?>
                            		<select class="form-control" id="religion" style="width:365px; border-radius: 4px;">
										<option selected="selected" value="-1">Select</option>
										<?php
											foreach($rdata as $value)
											{
										?>
										<option value="<?=$value['religion_id']?>"><?=$value['religion_name']?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							<div style="margin-top:50px">
                            	<span>Mother tongue</span>
                            </div>
							<div style="margin-bottom:35px">
								<div class=col-md-12 style="padding-left:1px;">
                            		<select class="form-control" id="mother_tongue" style="width:365px; border-radius: 4px;">
										<option selected="selected" value="-1">select</option>
										<option value="Gujarati">Gujarati</option>
										<option value="Hindi">Hindi</option>
										<option value="English">English</option>
										<option value="Marathi">Marathi</option>
									</select>
								</div>
							</div>
							<div style="margin-top:50px">
                            	<span>Where do you live?</span>
                            </div>
							<div style="margin-bottom:35px">
								<div class=col-md-12 style="padding-left:1px;">
								<?php $cdata = $this->admin_model->getCountry(); ?>
                            		<select class="form-control" id="live" name="live" style="width:365px; border-radius: 4px;">
										<option selected="selected" value="-1">select</option>
										<?php
											foreach($cdata as $value)
											{
										?>
										<option value="<?=$value['country_id']?>"><?=$value['country_name']?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							</div>
		    		    <div class="modal-footer" style="margin-top:15px">
                            <div class="col-md-12">
                                <a href="#"><button type="submit" class="btn btn-primary btn-lg btn-block"  id="btn_sign_up">sign up</button></a>
							</div>
							
                        </div>
						</div>
                    </form>
                    <!-- End | Register Form -->
					
					
												</div>
											<!-- End # DIV Form -->                
										</div>
									</div>
								</div>

	
		<!------------------------- /Modal ------------------------------------>
		
