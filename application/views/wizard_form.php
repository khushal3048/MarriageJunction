<?php
	if(isset($_SESSION['couname']))
	{
		//print_r($_SESSION['couname']);
	}
?>
    <title>Marriage Junction | Registration Form</title>

		<link href="<?php echo base_url(); ?>assets/css/jquerysctipttop.css" rel="stylesheet" type="text/css">	

		<link href="<?php echo base_url(); ?>assets/css/bootstrap_wizard.min.css" rel="stylesheet" type="text/css">	
    	
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
		
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


    <script src="<?php echo base_url();?>assets/js/wizard.jquery.min.js"></script>
	
    <!-- <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>-->
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>-->
    <!-- <script src="<?php echo base_url();?>assets/js/jquery.formtowizard.js"></script>-->

    <style>
        .wrap { max-width: 980px; margin: 10px auto 0; }
        #steps { margin: 80px 0 0 0 }
        .commands { overflow: hidden; margin-top: 30px; }
        .prev {float:left}
        .next, .submit {float:right}
        .error { color: #b33; }
        #progress { position: relative; height: 5px; background-color: #eee; margin-bottom: 20px; }
        #progress-complete { border: 0; position: absolute; height: 5px; min-width: 10px; background-color: #e9641c; transition: width .2s ease-in-out; }
		.btn_next, .btn_next:hover { background-color: #FF3300; }
    </style>
     
    <script>
	
		$(document).ready(function(){
			var cnt = 0;
		  //--- all  next btn ----------------------------
		  var flag = false;
		  var tmp = 0;
			$(document).on("click","#btn_step1", function(e){
				e.preventDefault();
				var c=s=m=a=y=su=false;
				
					c = option_filed($("#city").val(),".error","*Select City");
					s = option_filed($("#state").val(),".error_state","*Select State");
					m = option_filed($("#mt_status").val(),".error_mt_status","*Select Marital status"); 
			//		a = option_filed($("#any_ch").val(),".error_any_ch","Select number If you have children or None");
					y = option_filed($("#your_comm").val(),".error_your_comm","*Select Your Community"); 
					su = option_filed($("#sub_comm").val(),".error_sub_comm","*Select Sub  Community");  
					
					if($("#reg").val() =="" ) {
						$(".error_reg").html("Can't Balnk Regional Site").fadeIn(300).delay(3000).fadeOut(300);
						reg = 0;
					}  else {   reg = 1; }
					
					
					if(c==true && reg == 1 && s==true && m==true && y==true && su==true)  {
						$("#progress-complete").css('width','25%');
						$("#step2").css('display',"block");
						$("#step1").css('display',"none"); 
					}
			});
			$(document).on("click","#btn_step2", function(e){
				e.preventDefault();
				
					var el=ef=w=a=income=false;
					
					el = option_filed($("#ed_level").val(),".error_ed_level","*Select Your Eduction Level");
					ef = option_filed($("#ed_filed").val(),".error_ed_filed","*Select Eduction Filed");
					w = option_filed($("#work_with").val(),".error_work_with","*Select Work With"); 
					a = option_filed($("#as").val(),".error_as","*Select Work As");
					income  = option_filed($("#income").val(),".error_income","*Select Your Annual Income"); 
				
				if(el==true && ef==true && w==true && a==true && income==true) {
		
					$("#progress-complete").css('width','50%');
					$("#step3").css('display',"block");
					$("#step2").css('display',"none");
				}
			});
			
			
			$(document).on("click","#btn_step3", function(e){
				e.preventDefault();
					var di=he=sm=dr=bt=st=mo=false;
		
					di = option_filed($("#ed_diet").val(),".error_diet","*Select Your Diet paln");
					 he = option_filed($("#height").val(),".error_height","*Select Yuor height");
					
					var smoke = $("input[name=smoke]:checked").val();
					var drink = $("input[name=drink]:checked").val(); 
					var btype = $("input[name=btype]:checked").val();
					var stone = $("input[name=stone]:checked").val(); 
					var radio = false;
				 
					 if(smoke == "undefined" || smoke == null) {
						$(".error_smoke").html("*Choose Any One Smoke option").fadeIn(300).delay(3000).fadeOut(300);
						sm = false;
					 } else {sm =  true;}
					 
					 
					 if(drink == "undefined" || drink == null) {
						$(".error_drink").html("*Choose Any One Drink option").fadeIn(300).delay(3000).fadeOut(300);
						dr = false;
					 } else {dr = true;}
					 
					 
					 if(stone == "undefined" || stone == null) {
						$(".error_stone").html("*Choose Any One  Skin Tone option").fadeIn(300).delay(3000).fadeOut(300);
						st = false;
					 } else {st = true;}
					  if(btype == "undefined" || btype == null) {
						$(".error_btype").html("*Choose Any One body Type option").fadeIn(300).delay(3000).fadeOut(300);
						bt = false;
					 } else {bt = true;}
					 
					if($("#mobile").val() == ""){
						$(".error_mobile").html("*Can't Blank Mobile Number").fadeIn(300).delay(3000).fadeOut(300);
						mo = false;
					} else {
						var mobile_pattern = /^[0-9]{10}$/;
						
						if(!mobile_pattern.test($("#mobile").val())){
							$(".error_mobile").html("Invalid Mobile Number").fadeIn(300).delay(3000).fadeOut(300);
						mo = false;
						} else {
							mo = true;
							$("#edit_mb").val($("#mobile").val());
						}
					}
					 
					if(di==true && he==	true && sm==true && dr== true && bt==true && st == true && mo == true) {			 
						$("#progress-complete").css('width','75%');
						$("#step4").css('display',"block");
						$("#step3").css('display',"none");
					}
			});

			$(document).on("click","#btn_step4", function(e){
				e.preventDefault();
					var ft=mt=nb=mb=ns=ms=af=chk1=chk2=false;
		
					 ft = option_filed($("#father_st").val(),".error_father_st","*Select Father Status");
					 mt = option_filed($("#mother_st").val(),".error_mother_st","*Select Mother Status");
					 nb = option_filed($("#no_bro").val(),".error_no_bro","*Select No. Of Brothers");
					 mb = option_filed($("#mar_bro").val(),".error_mar_bro","*Select No. of Married Brothers");
					 ns = option_filed($("#no_sis").val(),".error_no_sis","*Select No. Of Sisters");
					 ms = option_filed($("#mar_sis").val(),".error_mar_sis","*Select No. of Married Sisters");
					 af = option_filed($("#aff_lev").val(),".error_aff_lev","*Select Affluence Level");
					// chk1 = chk_field($nb,$mb,".error_aff_lev","Select Affluence Level");
					// if(chk1 == true){				 
					 if(ft == true && mt ==	true && nb == true && mb == true && ns == true && ms == true && af == true) {
							$("#progress-complete").css('width','100%');
							$("#step5").css('display',"block");
							$("#step4").css('display',"none");
			//			}
					}
			});

			//------------------ prev btn ------------------
			
			$(document).on("click","#btn_prev1", function(e){
				e.preventDefault();
				$("#progress-complete").css('width','3%');
				$("#step1").css('display',"block");
				$("#step2").css('display',"none");
			});
			
			$(document).on("click","#btn_prev2", function(e){
				e.preventDefault();
				$("#progress-complete").css('width','22%');
				$("#step2").css('display',"block");
				$("#step3").css('display',"none");
			});
			
			$(document).on("click","#btn_prev3", function(e){
				e.preventDefault();
				$("#progress-complete").css('width','50%');
				$("#step3").css('display',"block");
				$("#step4").css('display',"none");
			});
			
			$(document).on("click","#btn_prev4", function(e){
				e.preventDefault();
				$("#progress-complete").css('width','75%');
				$("#step4").css('display',"block");
				$("#step5").css('display',"none");
			});
			
			
			$("#SignupForm").on("submit",function(e){
				e.preventDefault();
				//$("#SaveAccount").attr('data-target','#');
				var about = false;
				var d=false;
				var dis = $("input[name=dis]:checked").val();
				if(dis == "undefined" || dis == null) {
						$(".error_dis").html("*Choose Any One  Disability option").fadeIn(300).delay(3000).fadeOut(300);
						d = false;
						
					 } else {d = true;}
				if($("#about").val() =="" || $("#about").val()==null) {
						$(".error_about").html("*Tell Your self  ").fadeIn(300).delay(3000).fadeOut(300);
						
						about = false;
				}else {
				about = true;
				} 
				if(d == true && about ==true){
					if(cnt==1)
					{
						jQuery.noConflict(); 
						$("#login-modal").modal('show');
						return false;
					//alert("From submit here ");
					}
					else
					{
						jQuery.noConflict(); 
						$("#login-modal").modal('show');

						var data = {};
					
						data['city'] = $("#city").val();
						//alert(data['city']);
						data['state'] = $("#state").val();
						data['mt_status'] = $("#mt_status").val();
						data['any_ch'] = $("#any_ch").val();
						data['your_comm'] = $("#your_comm").val();
						data['sub_comm'] = $("#sub_comm").val();
						data['reg'] = $("#reg").val();
						data['ed_level'] = $("#ed_level").val();
						data['ed_filed'] = $("#ed_filed").val();
						data['work_with'] = $("#work_with").val();
						data['as'] = $("#as").val();
						data['income'] = $("#income").val();
						data['ed_diet'] = $("#ed_diet").val();
						data['smoke'] = $("#smoke").val();
						data['drink'] = $("#drink").val();
						data['height'] = $("#height").val();
						data['body_type'] = $("#body_type").val();
						data['skin_tone'] = $("#skin_tone").val();
						data['mobile'] = $("#mobile").val();
						data['father_st'] = $("#father_st").val();
						data['mother_st'] = $("#mother_st").val();
						data['no_bro'] = $("#no_bro").val();
						data['mar_bro'] = $("#mar_bro").val();
						data['no_sis'] = $("#no_sis").val();
						data['mar_sis'] = $("#mar_sis").val();
						data['aff_lev'] = $("#aff_lev").val();
						data['about'] = $("#about").val();
						data['dis'] = $("#dis").val();
			//			console.log(data);
						$.ajax({
							type:'POST',
							url:'http://localhost/marriagejunction/user_operation/add_user_data',
							dataType:'text',
							data:data,
							success:function(data) {
							console.log(data);
								if(data == 'SUCCESS'){
										cnt = 1;	
								} else {
									jQuery.noConflict(); 
								//	$("#login-modal").modal('hide');
									alert("register not valid");
								}
									//alert('hellooooooo');
							},
							error:function() {
									jQuery.noConflict(); 
									$("#login-modal").modal('hide');
									alert('Something Went Wrong');
							}
						});
					}
				}
			});
			
				function option_filed(id,msg_id,msg){
					if(id==-1 || id =='undefined') {
						$(msg_id).html(msg).fadeIn(300).delay(3000).fadeOut(300);
						return false;
					} else {
						return  true;
					}
				}
				
				function chk_field(no1,no2,msg_id,msg){
					if(no1 <= no2) {
						$(msg_id).html(msg).fadeIn(300).delay(3000).fadeOut(300);
						return false;
					} else {
						return  true;
					}
				}
				 
				});
				
				$(document).ready(function(){
					$("#state").on("change",function(){
						var s_id = $(this).val(),
						city = {};
						city = "<option value=>--Select City--</option>"; 
						//alert(s_id);
						$.ajax({
							type:'POST',
							url:'http://localhost/marriagejunction/user_operation/getcity',
							dataType:'json',
							data:{s_id:s_id},
							success: function(data){
								$.each(data,function(i,city_id,city_name){
									city += "<option value="+data[i].city_id+">"+data[i].city_name+"</option>";
								});
								$("#city").html(city);
								$("#city").removeAttr("disabled");
								 
							},
							error: function(textStatus){
							}
						 });
					});
					
					$("#your_comm").on("change",function(){
						var c_id = $(this).val(),
						subcaste = {};
						subcaste = "<option value=>--Select Subcommunity--</option>"; 
						//alert(s_id);
						$.ajax({
							type:'POST',
							url:'http://localhost/marriagejunction/user_operation/getsubcaste',
							dataType:'json',
							data:{c_id:c_id},
							success: function(data){
								$.each(data,function(i,sub_caste_id,sub_caste_name){
									subcaste += "<option value="+data[i].sub_caste_id+">"+data[i].sub_caste_name+"</option>";
								});
								$("#sub_comm").html(subcaste);
								$("#sub_comm").removeAttr("disabled");								 
							},
							error: function(textStatus){
							}
						 });
					});
					
					$("#mt_status").on("change",function(){
						var mt = $(this).val();
						//alert(mt);
						
						 if(mt == 'Devorced' || mt == 'Widowed' || mt == 'Annulled' || mt == 'Awaiting Devorced')
						 {
						 	$('#brhide').css('display',"table-row");
							$("#divhide").css('display',"block");		
						 }
						 else
						 {
						 	$('#brhide').css('display',"none");
						 	$("#divhide").css('display',"none");
						 }
						
					});
					
					$("#edit_mobile").on("click",function(e){
						e.preventDefault();
						$("#edit_mb").css('border','solid 1px');
						$("#edit_mb").removeAttr('readonly');
						$("#edit_mobile").css('display','none');
						$("#send_pin").css('display','inline');
					});
					
					$("#send_pin").on("click",function(e){
						e.preventDefault();
						var new_mb = "";
						new_mb = $("#edit_mb").val();
						//alert(new_mb);
						$.ajax({
							type:'POST',
							url:'http://localhost/marriagejunction/user_operation/updatemobile',
							dataType:'json',
							data:{new_mb:new_mb},
							success: function(data){
							},
							error: function(textStatus){
							}
						 });

						$("#send_pin").css('display','none');
						$("#edit_mobile").css('display','inline');
						$("#edit_mb").css('border','none');
						$("#edit_mb").Attr('readonly');				
					});
					
					$("#resend").on("click",function(e){
						e.preventDefault();
						var new_mb = "";
						new_mb = $("#edit_mb").val();
						//alert(new_mb);
						$.ajax({
							type:'POST',
							url:'http://localhost/marriagejunction/user_operation/resendPIN',
							dataType:'json',
							data:{new_mb:new_mb},
							success: function(data){
							},
							error: function(textStatus){
							}
						 });
					});
					
					$("#submit_pin").on("click",function(e){
						e.preventDefault();
						var userpin = "";
						usrpin = $("#m_pin").val();
						
						if(usrpin == "")
						{
							//alert();
							$(".error_modal").html("Plz Enter The OTP.").fadeIn(300).delay(3000).fadeOut(300);							
						}
						else
						{
							//alert();
							 $.ajax({
								type:'POST',
								url:'http://localhost/marriagejunction/user_operation/verifyPIN',
								dataType:'json',
								data:{userpin:usrpin},
								success: function(data){
									if(data.status == 1)
									{
										window.location.href="http://localhost/marriagejunction/user/profile_upload";
									}
									else
									{
										$(".error_modal").html("Plz Enter Valid OTP.").fadeIn(300).delay(3000).fadeOut(300);
									}
								},
								error: function(textStatus){
								}
						 	});
						}						
					});

				});
    </script>
	
<body style="margin:0;">

	<div class="navbar navbar-inverse-blue navbar" style="margin-bottom:-550px;">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?=base_url();?>"><img src="<?php echo base_url(); ?>asset/upload/MJ.png" alt="logo" style="height: 50px; width: 200px;">
				</a>
			  	<div class="clearfix"> </div>
			</div> <!-- end container -->
		</div> <!-- end navbar-inner -->
	</div> <!-- end navbar-inverse-blue -->
    
<div class="row wrap">
	<div class="col-lg-12">
		<div id='progress'>
			<div id='progress-complete'></div>
		</div>

    <form id="SignupForm" action="#" method="post">
		<div id="step1">
        	<fieldset>
				<div> 
            		<legend>Tell us more about yourself</legend>
					<div class="form-group" style="padding-top:15px;">
            			<label for="CreditcardMonth" class="col-sm-2 control-label">live in?*</label>
            			<div class="col-sm-10">
							<div class="row">
                				<?php 
                					if($this->session->userdata('couname'))
                					{
										$countryid = $this->session->userdata('couname');
										$religionid = $this->session->userdata('couname');
									}
									else
									{
										$userid = $this->session->userdata('userid');
										// print_r($userid['pro_id']);
										$crdata = $this->user_mo->getcrdata($userid['pro_id']);
									//	print_r($crdata);
										$countryid['couname'] = $crdata[0]['country'];
										$religionid['relname'] = $crdata[0]['religion'];
									}

									$coudata = $this->user_mo->getstatebyid($countryid);
									$reldata = $this->user_mo->getcastebyid($religionid);
								?>
								<div class="col-xs-6">
										<select id="state" class="form-control col-sm-2" style="width:500px; display:inline;">
							  				<option value="-1">--Select State----</option>
											<?php
												foreach($coudata as $value)
												{
											?>
							  				<option value="<?=$value['state_id']?>"><?=$value['state_name']?></option>
											<?php
												}
											?>
										</select>
										<span class="text-danger error"></span>
                				</div>	
            				</div>
							
						</div>
            		</div>
					<br>
					<div class="form-group"style="padding-top:5px;">
            			<label for="CreditcardMonth" class="col-sm-2 control-label"></label>
            				<div class="col-sm-10">
								<div class="row">
                					<div class="col-xs-6">
										<select id="city" class="form-control col-sm-2" style="width:500px;" name="sel_city" disabled="disabled">
							  				<option value="-1">--Select City--</option>	
										</select>
                					</div>
            					</div>
								<span class="text-danger error_state"></span>
							</div>
            			</div>
						<br>
						<div class="form-group" style="padding-top:15px;">
            				<label for="CreditcardMonth" class="col-sm-2 control-label">Marital status</label>
            					<div class="col-sm-10">
									<div class="row">
                						<div class="col-xs-7">
											<select id="mt_status" class="form-control col-sm-2" style="width:500px;">
							   					<option  value="-1">--Select Marital status---</option>
							  					<option value="Never Married">Never Married</option>
							  					<option value="Devorced">Devorced</option>
							  					<option value="Widowed">Widowed</option>
							  					<option value="Annulled">Annulled</option>
							  					<option value="Awaiting Devorced">Awaiting Devorced</option>
											</select>
                						</div>	
            						</div>
									<div class="text-danger error_mt_status"></div>
								</div>
            				</div>
							<br id="brhide" style="display:none;" />
							<div id="divhide" class="form-group" style="padding-top:15px;display:none;">
            					<label for="CreditcardMonth" class="col-sm-2 control-label">Any children?</label>
            					<div class="col-sm-10">
									<div class="row">
                						<div class="col-xs-6">
											<select id="any_ch" class="form-control col-sm-2" style="width:500px;">
							 					<option value="undefined" >--Any children----</option>
							  					<option value="0">0</option>
												<option value="1">1</option>
							  					<option value="2">2</option>
							  					<option value="3">3</option>
							  					<option value="4">More than 3</option>
											</select>
                						</div>
            						</div>
									<div class="text-danger error_any_ch"></div>
								</div>
            				</div>
							<br>
							<div class="form-group" style="padding-top:15px;">
            					<label for="CreditcardMonth" class="col-sm-2 control-label">community</label>
            						<div class="col-sm-10">
										<div class="row">
                							<div class="col-xs-6">
												<select id="your_comm" class="form-control col-sm-2" style="width:500px;">
							  						<option value="-1">--Select Your community---</option>
							  						<?php
														foreach($reldata as $value)
														{
													?>
							  								<option value="<?=$value['caste_id']?>"><?=$value['caste_name']?></option>
													<?php
														}
													?>
												</select>
                							</div>
            							</div>
										<div class="text-danger error_your_comm"></div>
									</div>
            					</div>
								<br>
								<div class="form-group" style="padding-top:15px;">
            						<label for="CreditcardMonth" class="col-sm-2 control-label">Sub community </label>
            						<div class="col-sm-10">
										<div class="row">
                							<div class="col-xs-6">
												<select id="sub_comm" class="form-control col-sm-2" style="width:500px;" disabled="disabled">
													<option value="-1">--Select Subcommunity--</option>
													
												</select>
                							</div>
            							</div>
										<div class="text-danger error_sub_comm"></div>
									</div>
            					</div>
								<br>	
								<div class="form-group" style="padding-top:15px;">
            						<label for="CreditcardMonth" class="col-sm-2 control-label">Regional site</label>
            						<div class="col-sm-10">
										<div class="row">
                							<div class="col-xs-6">
												<input id="reg" type="text" class="form-control" style="width:500px;" placeholder="eg. www.shaadi.com" name="regli" />	
												<div class="text-danger error_reg"></div>	
                							</div>	
            							</div>
									</div>	
					            </div>
								<br>	
							</div>
							<button id="btn_step1" class="btn btn-primary next btn_next" >Next</button>
        			</fieldset>
				</div>
				
				<div id="step2" style="display:none">
        			<fieldset>
            			<legend>Fill-up education details</legend>
            			<div class="form-group" style="padding-top:15px;">
            				<label for="CreditcardMonth" class="col-sm-2 control-label">Education level</label>
            				<div class="col-sm-10">
								<div class="row">
                					<div class="col-xs-6">
										<select id="ed_level" class="form-control col-sm-2" style="width:500px;">
							  				<option value="-1">--Select Education lavel--- </option>
							  				<option value="Master">Master</option>
							  				<option value="Bachelors">Bachelors</option>
							  				<option value="Doctorate">Doctorate</option>
							  				<option value="Honours Degree">Honours Degree</option>
							  				<option value="Undergraduate">Undergraduate</option>
							  				<option value="Diploma">Diploma</option>
							  				<option value="High School">High School</option>
							  				<option value="Lessthen high school">Lessthen high school</option>
							  				<option value="Trade school">Trade school</option>
										</select>
                					</div>
            					</div>
								<div class="text-danger error_ed_level"></div>
							</div>
            			</div>
						<br>
						<div class="form-group" style="padding-top:15px;">
            				<label for="CreditcardMonth" class="col-sm-2 control-label">Education field</label>
            				<div class="col-sm-10">
								<div class="row">
                					<div class="col-xs-6">
										<select id="ed_filed" class="form-control col-sm-2" style="width:500px;">
							 				<option value="-1">--Select Education Filed--- </option>
							  				<option value="Advertising/Marketing">Advertising/Marketing</option>
							  				<option value="Administrative servies">Administrative servies</option>
							  				<option value="Architecture">Architecture</option>
							  				<option value="Armed Forces">Armed Forces</option>
							  				<option value="Arts">Arts</option>
							  				<option value="Commerces">Commerces</option>
							  				<option value="Computer / It">Computer / It</option>
							  				<option value="Education">Education</option>
							  				<option value="Engineering/Technology">Engineering/Technology</option>
							   				<option value="Fashion Design">Fashion Design</option>
							  				<option value="Finance">Finance</option>
							  				<option value="Medicine">Medicine</option>
							  				<option value="Home Science">Home Science</option>
							  				<option value="Nursing">Nursing</option>
							  				<option value="Office administration">Office administration</option>
							  				<option value="Science">Science</option>
							  				<option value="Travel / Tourism">Travel / Tourism</option> 
							  				<option value="Management">Management</option>
							  				<option value="Shipping">Shipping</option>
										</select>
                					</div>
            					</div>
								<div class="text-danger error_ed_filed"></div>
							</div>
            			</div>
						<br>
						<div class="form-group" style="padding-top:15px;">
            				<label for="CreditcardMonth" class="col-sm-2 control-label">Work with</label>
            				<div class="col-sm-10">
								<div class="row">
                					<div class="col-xs-6">
										<select id="work_with" class="form-control col-sm-2" style="width:500px;">
							 				<option value="-1">--Select Work With --- </option>
							  				<option value="Private Company">Private Company</option>
							  				<option value="Government / Public Sector">Government / Public Sector</option>
							  				<option value="Defense / Civil Services">Defense / Civil Services</option>
							  				<option value="Business / Self Employed">Business / Self Employed</option>
							  				<option value="Not Working">Not Working</option>
										</select>
                					</div>
            					</div>
								<div class="text-danger error_work_with"></div>
							</div>
            			</div>
						<br>
						<div class="form-group" style="padding-top:15px;">
            				<label for="CreditcardMonth" class="col-sm-2 control-label">As </label>
            				<div class="col-sm-10">
								<div class="row">
                					<div class="col-xs-6">
										<select id="as" class="form-control col-sm-2" style="width:500px;">
							 				<option value="-1">--Select Work as  --- </option>
											<optgroup id="occupation-optgroup-Non Working" label="Non Working">
												<option value="Not working" label="Not working">Not working</option>
												<option value="Student" label="Student">Student</option>
											</optgroup> 
											<optgroup id="#" label="Accounting, Banking &amp; Finance">
												<option value="Banking Professional" label="Banking Professional">Banking Professional</option>
												<option value="Chartered Accountant" label="Chartered Accountant">Chartered Accountant</option>
												<option value="Company Secretary" label="Company Secretary">Company Secretary</option>
												<option value="Finance Professional" label="Finance Professional">Finance Professional</option>
												<option value="Investment Professional" label="Investment Professional">Investment Professional</option>
												<option value="Accounting Professional (Others)" label="Accounting Professional (Others)">Accounting Professional (Others)</option>
											</optgroup>
											<optgroup id="#" label="Administration &amp; HR">
												<option value="Admin Professional" label="Admin Professional">Admin Professional</option>
												<option value="Human Resources Professional" label="Human Resources Professional">Human Resources Professional</option>
											</optgroup>
							 				<optgroup id="occupation-optgroup-Advertising, Media &amp; Entertainment" label="Advertising, Media &amp; Entertainment">
												<option value="Actor" label="Actor">Actor</option>
												<option value="Advertising Professional" label="Advertising Professional">Advertising Professional</option>
												<option value="Entertainment Professional" label="Entertainment Professional">Entertainment Professional</option>
												<option value="Event Manager" label="Event Manager">Event Manager</option>
												<option value="Journalist" label="Journalist">Journalist</option>
												<option value="Media Professional" label="Media Professional">Media Professional</option>
												<option value="Public Relations Professional" label="Public Relations Professional">Public Relations Professional</option>
										</optgroup>
										<optgroup id="occupation-optgroup-Agriculture" label="Agriculture">
												<option value="Farming" label="Farming">Farming</option>
												<option value="Horticulturist" label="Horticulturist">Horticulturist</option>
												<option value="Agricultural Professional (Others)" label="Agricultural Professional (Others)">Agricultural Professional (Others)</			 													option>
										</optgroup>
										<optgroup id="occupation-optgroup-Airline &amp; Aviation" label="Airline &amp; Aviation">
												<option value="Air Hostess / Flight Attendant" label="Air Hostess / Flight Attendant">Air Hostess / Flight Attendant</option>
												<option value="Pilot / Co-Pilot" label="Pilot / Co-Pilot">Pilot / Co-Pilot</option>
												<option value="Other Airline Professional" label="Other Airline Professional">Other Airline Professional</option>
										</optgroup>
										<optgroup id="occupation-optgroup-Architecture &amp; Design" label="Architecture &amp; Design">
											<option value="Architect" label="Architect">Architect</option>
											<option value="Interior Designer" label="Interior Designer">Interior Designer</option>
											<option value="Landscape Architect" label="Landscape Architect">Landscape Architect</option>
										</optgroup>
										<optgroup id="occupation-optgroup-Artists, Animators &amp; Web Designers" label="Artists, Animators &amp; Web Designers">
											<option value="Animator" label="Animator">Animator</option>
											<option value="Commercial Artist" label="Commercial Artist">Commercial Artist</option>
											<option value="Web / UX Designers" label="Web / UX Designers">Web / UX Designers</option>
											<option value="Artist (Others)" label="Artist (Others)">Artist (Others)</option>
										</optgroup>
										<optgroup id="occupation-optgroup-Beauty, Fashion &amp; Jewellery Designers" label="Beauty, Fashion &amp; Jewellery Designers">
											<option value="Beautician" label="Beautician">Beautician</option>
											<option value="Fashion Designer" label="Fashion Designer">Fashion Designer</option>
											<option value="Hairstylist" label="Hairstylist">Hairstylist</option>
											<option value="Jewellery Designer" label="Jewellery Designer">Jewellery Designer</option>
											<option value="Designer (Others)" label="Designer (Others)">Designer (Others)</option>
										</optgroup>
										<optgroup id="occupation-optgroup-Defense" label="Defense">
											<option value="Airforce" label="Airforce">Airforce</option>
											<option value="Army" label="Army">Army</option>
											<option value="Navy" label="Navy">Navy</option>
											<option value="Defense Services (Others)" label="Defense Services (Others)">Defense Services (Others)</option>
										</optgroup>
										<optgroup id="occupation-optgroup-Education &amp; Training" label="Education &amp; Training">
											<option value="Lecturer" label="Lecturer">Lecturer</option>
											<option value="Professor" label="Professor">Professor</option>
											<option value="Research Assistant" label="Research Assistant">Research Assistant</option>
											<option value="Research Scholar" label="Research Scholar">Research Scholar</option>
											<option value="Teacher" label="Teacher">Teacher</option>
											<option value="Training Professional (Others)" label="Training Professional (Others)">Training Professional (Others)</option>
										</optgroup>
										<optgroup id="occupation-optgroup-Engineering" label="Engineering">
											<option value="Civil Engineer" label="Civil Engineer">Civil Engineer</option>
											<option value="Electronics / Telecom Engineer" label="Electronics / Telecom Engineer">Electronics / Telecom Engineer</option>
											<option value="Mechanical / Production Engineer" label="Mechanical / Production Engineer">Mechanical / Production Engineer</option>
											<option value="Non IT Engineer (Others)" label="Non IT Engineer (Others)">Non IT Engineer (Others)</option>
										</optgroup>
										<optgroup id="occupation-optgroup-IT &amp; Software Engineering" label="IT &amp; Software Engineering">
											<option value="Software Developer / Programmer" label="Software Developer / Programmer">Software Developer / Programmer</option>
											<option value="Software Consultant" label="Software Consultant">Software Consultant</option>
											<option value="Hardware &amp; Networking professional" label="Hardware &amp; Networking professional">Hardware &amp; Networking	professional</option>
											<option value="Software Professional (Others)" label="Software Professional (Others)">Software Professional (Others)</option>
										</optgroup>
										<optgroup id="occupation-optgroup-Legal" label="Legal">
											<option value="Lawyer" label="Lawyer">Lawyer</option>
											<option value="Legal Assistant" label="Legal Assistant">Legal Assistant</option>
											<option value="Legal Professional (Others)" label="Legal Professional (Others)">Legal Professional (Others)</option>
										</optgroup>
										<optgroup id="occupation-optgroup-Sales &amp; Marketing" label="Sales &amp; Marketing">
											<option value="Marketing Professional" label="Marketing Professional">Marketing Professional</option>
											<option value="Sales Professional" label="Sales Professional">Sales Professional</option>
										</optgroup>
										<optgroup id="occupation-optgroup-Others" label="Others">
											<option value="Agent / Broker / Trader / Contractor" label="Agent / Broker / Trader / Contractor">Agent / Broker / Trader / Contractor</option>
											<option value="Business Owner / Entrepreneur" label="Business Owner / Entrepreneur">Business Owner / Entrepreneur</option>
											<option value="Politician" label="Politician">Politician</option>
											<option value="Social Worker / Volunteer / NGO" label="Social Worker / Volunteer / NGO">Social Worker / Volunteer / NGO</option>
											<option value="Sportsman" label="Sportsman">Sportsman</option>
											<option value="Travel &amp; Transport Professional" label="Travel &amp; Transport Professional">Travel &amp; Transport Professional</option>
											<option value="Writer" label="Writer">Writer</option>
										</optgroup>	 
								</select>
                			</div>
            			</div>
						<div class="text-danger error_as"></div>
					</div>
            	</div>
				<br>
				<div class="form-group" style="padding-top:15px;">
            		<label for="CreditcardMonth" class="col-sm-2 control-label">Annual income </label>
            		<div class="col-sm-10">
						<div class="row">
                			<div class="col-xs-6">
								<select id="income" class="form-control col-sm-2" style="width:500px;">
								 	<option value="-1">--Select Annual Income  --- </option>
							 		<option value="Upto INR 1 Lakh" label="Upto INR 1 Lakh">Upto INR 1 Lakh</option>
									<option value="INR 1 Lakh to 2 Lakh" label="INR 1 Lakh to 2 Lakh">INR 1 Lakh to 2 Lakh</option>
									<option value="INR 2 Lakh to 4 Lakh" label="INR 2 Lakh to 4 Lakh">INR 2 Lakh to 4 Lakh</option>
									<option value="INR 4 Lakh to 7 Lakh" label="INR 4 Lakh to 7 Lakh">INR 4 Lakh to 7 Lakh</option>
									<option value="INR 7 Lakh to 10 Lakh" label="INR 7 Lakh to 10 Lakh">INR 7 Lakh to 10 Lakh</option>
									<option value="INR 10 Lakh to 15 Lakh" label="INR 10 Lakh to 15 Lakh">INR 10 Lakh to 15 Lakh</option>
									<option value="INR 15 Lakh to 20 Lakh" label="INR 15 Lakh to 20 Lakh">INR 15 Lakh to 20 Lakh</option>
									<option value="INR 20 Lakh to 30 Lakh" label="INR 20 Lakh to 30 Lakh">INR 20 Lakh to 30 Lakh</option>
									<option value="INR 30 Lakh to 50 Lakh" label="INR 30 Lakh to 50 Lakh">INR 30 Lakh to 50 Lakh</option>
									<option value="INR 50 Lakh to 75 Lakh" label="INR 50 Lakh to 75 Lakh">INR 50 Lakh to 75 Lakh</option>
									<option value="INR 75 Lakh to 1 Crore" label="INR 75 Lakh to 1 Crore">INR 75 Lakh to 1 Crore</option>
									<option value="INR 1 Crore &amp; above" label="INR 1 Crore &amp; above">INR 1 Crore &amp; above</option>
									<option value="Not applicable" label="Not applicable">Not applicable</option>
								</select>
                			</div>
            			</div>
						<div class="text-danger error_income"></div>
					</div>
           		 </div>
				<br>
				<button id="btn_prev1" class="btn btn-primary next btn_next pull-left">Prev</button>
				<button id="btn_step2" class="btn btn-primary next btn_next">Next</button>
        	</fieldset>
		</div>
		<div id="step3" style="display:none">
        	<fieldset class="form-horizontal" role="form">
            	<legend>Add your life style detail</legend>
			<div class="form-group" style="padding-top:15px;">
            	<label for="CreditcardMonth" class="col-sm-2 control-label" style="text-align:left">What's your diet? </label>
            		<div class="col-sm-10">
						<div class="row">
                		<div class="col-xs-6">
							<select id="ed_diet" class="form-control col-sm-2" style="width:500px;">
							<option value="-1">--Select Your diet---</option>
							 <option value="Veg" label="Veg">Veg</option>
							<option value="Non-Veg" label="Non-Veg">Non-Veg</option>
							<option value="Occasionally Non-Veg" label="Occasionally Non-Veg">Occasionally Non-Veg</option>
							<option value="Eggetarian" label="Eggetarian">Eggetarian</option>
							<option value="Jain" label="Jain">Jain</option>
							<option value="Vegan" label="Vegan">Vegan</option>
							</select>
                		</div>
            		</div>
						<div class="text-danger error_diet"></div>
				</div>
            </div>
            
            <div class="form-group">
            	<label for="CreditcardMonth" class="col-sm-2 control-label" style="text-align:left">Do you Smoke?</label>
            		<div class="col-sm-10">
						<table width="300px;">
						<tr>
							<td><input type="radio" name="smoke" value="no" id="smoke"> No</td>
                			<td> <input type="radio" name="smoke" value="Yes" id="smoke" > Yes</td>	
							<td><input type="radio" name="smoke" value="Occasionally" id="smoke"> Occasionally </td>   
                		</tr>
            			</table>
				</div>
				<div class="text-danger error_smoke"></div>
            </div>
			 <div class="form-group">
            	<label for="CreditcardMonth" class="col-sm-2 control-label" style="text-align:left">Do you Drink?</label>
            		<div class="col-sm-10">
						<table width="300px;">
						<tr>
							<td><input type="radio" name="drink" value="no" id="drink"> No</td>
                			<td> <input type="radio" name="drink" value="Yes"  id="drink"> Yes</td>	
							<td><input type="radio" name="drink" value="Occasionally" id="drink"> Occasionally </td>   
                		</tr>
            			</table>
				</div>
				<div class="text-danger error_drink"></div>
            </div>
			<div class="form-group" style="padding-top:15px;">
            	<label for="CreditcardMonth" class="col-sm-2 control-label" style="text-align:left">Height</label>
            		<div class="col-sm-10">
						<div class="row">
                		<div class="col-xs-6">
							<select id="height" class="form-control col-sm-2" style="width:500px;">
								<option value="-1">--Select Your Height---</option>
								<option value="4ft 5in - 134cm">4ft 5in - 134cm</option>
								<option value="4ft 6in - 137cm">4ft 6in - 137cm</option>
								<option value="4ft 7in - 139cm">4ft 7in - 139cm</option>
								<option value="4ft 8in - 142cm">4ft 8in - 142cm</option>
								<option value="4ft 9in - 144cm">4ft 9in - 144cm</option>
								<option value="4ft 10in - 147cm">4ft 10in - 147cm</option>
								<option value="4ft 11in - 149cm">4ft 11in - 149cm</option>
								<option value="5ft - 152cm">5ft - 152cm</option>
								<option value="5ft 1in - 154cm">5ft 1in - 154cm</option>
								<option value="5ft 2in - 157cm">5ft 2in - 157cm</option>
								<option value="5ft 3in - 160cm">5ft 3in - 160cm</option>
								<option value="5ft 4in - 162cm">5ft 4in - 162cm</option>
								<option value="5ft 5in - 165cm">5ft 5in - 165cm</option>
								<option value="5ft 6in - 167cm">5ft 6in - 167cm</option>
								<option value="5ft 7in - 170cm">5ft 7in - 170cm</option>
								<option value="5ft 8in - 172cm">5ft 8in - 172cm</option>
								<option value="5ft 9in - 175cm">5ft 9in - 175cm</option>
								<option value="5ft 10in - 177cm">5ft 10in - 177cm</option>
								<option value="5ft 11in - 180cm">5ft 11in - 180cm</option>
								<option value="6ft - 182cm">6ft - 182cm</option>
								<option value="6ft 1in - 185cm">6ft 1in - 185cm</option>
								<option value="6ft 2in - 187cm">6ft 2in - 187cm</option>
								<option value="6ft 3in - 190cm">6ft 3in - 190cm</option>
								<option value="6ft 4in - 193cm">6ft 4in - 193cm</option>
								<option value="6ft 5in - 195cm">6ft 5in - 195cm</option>
								<option value="6ft 6in - 198cm">6ft 6in - 198cm</option>
								<option value="6ft 7in - 200cm">6ft 7in - 200cm</option>
								<option value="6ft 8in - 203cm">6ft 8in - 203cm</option>
								<option value="6ft 9in - 205cm">6ft 9in - 205cm</option>
								<option value="6ft 10in - 208cm">6ft 10in - 208cm</option>
								<option value="6ft 11in - 210cm">6ft 11in - 210cm</option>
								<option value="7ft - 213cm">7ft - 213cm</option>
							</select>
                		</div>
            		</div>
						<div class="text-danger error_height"></div>
				</div>
            </div>
			<div class="form-group">
            	<label for="CreditcardMonth" class="col-sm-2 control-label" style="text-align:left">Body Type</label>
            		<div class="col-sm-10">
						<table width="300px;">
						<tr>
							<td><input type="radio" name="btype" value="Slim" id="body_type"> Slim</td>
                			<td> <input type="radio" name="btype" value="Athletic" id="body_type"> Athletic</td>	
							<td><input type="radio" name="btype" value="Average" id="body_type"> Average </td>
							<td><input type="radio" name="btype" value="Heavy" id="body_type"> Heavy </td>   
                		</tr>
            			</table>
				</div>
				<div class="text-danger error_btype"></div>
            </div>
			<div class="form-group">
            	<label for="CreditcardMonth" class="col-sm-2 control-label" style="text-align:left">Skin Tone</label>
            		<div class="col-sm-10">
						<table width="300px;">
						<tr>
							<td><input type="radio" name="stone" value="very_fair" id="skin_tone"> Very Fair</td>
                			<td> <input type="radio" name="stone" value="Fair" id="skin_tone"> Fair</td>	
							<td><input type="radio" name="stone" value="Wheatish" id="skin_tone"> Wheatish </td>
							<td><input type="radio" name="stone" value="Dark" id="skin_tone"> Dark </td>   
                		</tr>
            			</table>
				</div>
				<div class="text-danger error_stone"></div>
            </div>
			<div class="form-group" style="padding-top:15px;">
            	<label for="CreditcardMonth" class="col-sm-2 control-label" style="text-align:left">mobile Number</label>
            		<div class="col-sm-10">
						<div class="row">
                			<div class="col-xs-6">
								<input id="mobile" name="mobile" type="text" class="form-control" style="width:500px;" />	
									<div class="text-danger error_mobile"></div>	
                		</div>
            		</div>
				</div>
            </div>
			<button id="btn_prev2" class="btn btn-primary next btn_next pull-left">Prev</button>
			<button id="btn_step3" class="btn btn-primary next btn_next">Next</button>
          </fieldset>
		  </div>
		  
		  	<div id="step4" style="display:none">
        			<fieldset>
            			<legend>Fill-up Family details</legend>
            			<div class="form-group" style="padding-top:15px;">
            				<label for="CreditcardMonth" class="col-sm-2 control-label">Father's Status</label>
            				<div class="col-sm-10">
								<div class="row">
                					<div class="col-xs-6">
										<select id="father_st" class="form-control col-sm-2" style="width:500px;">
											<option value="-1">--Select Father's Status--</option>
											<option value="Employed">Employed</option>
										</select>
                					</div>
            					</div>
								<div class="text-danger error_father_st"></div>
							</div>
            			</div>
						<br>
						<div class="form-group" style="padding-top:15px;">
            				<label for="CreditcardMonth" class="col-sm-2 control-label">Mother's Status</label>
            				<div class="col-sm-10">
								<div class="row">
                					<div class="col-xs-6">
										<select id="mother_st" class="form-control col-sm-2" style="width:500px;">
											<option value="-1">--Select Mother's Status--</option>
											<option value="Homemaker">Homemaker</option>
										</select>
                					</div>
            					</div>
								<div class="text-danger error_mother_st"></div>
							</div>
            			</div>
						<br>
						<div class="form-group" style="padding-top:15px;">
            				<label for="CreditcardMonth" class="col-sm-2 control-label">No. Of Brothers</label>
            				<div class="col-sm-10">
								<div class="row">
                					<div class="col-xs-6">
										<select id="no_bro" class="form-control col-sm-2" style="width:100px;">
											<option value="-1">-Select-</option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
										<label for="CreditcardMonth" class="col-md-2" style="width:200px;"> Of Which Married </label>
										<select id="mar_bro" class="form-control col-sm-2" style="width:100px; margin-left:-40px;">
											<option value="-1">-Select-</option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
										
                					</div>
            					</div>
								<div>
								<div class="text-danger error_no_bro" style="display:inline;"></div>	                                     							                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="text-danger error_mar_bro" style="display:inline;"></div>
								</div>
							</div>
            			</div>
						<br>
						<div class="form-group" style="padding-top:15px;">
            				<label for="CreditcardMonth" class="col-sm-2 control-label">No. Of Sisters </label>
            				<div class="col-sm-10">
								<div class="row">
                					<div class="col-xs-6">
										<select id="no_sis" class="form-control col-sm-2" style="width:100px;">
											<option value="-1">-Select-</option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
										<label for="CreditcardMonth" class="col-sm-4" style="width:200px;"> Of Which Married </label>
										<select id="mar_sis" class="form-control col-sm-2" style="width:100px; margin-left:-40px;">
											<option value="-1">-Select-</option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
                			</div>
            			</div>
						<div class="text-danger error_no_sis" style="display:inline;"></div>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="text-danger error_mar_sis" style="display:inline;"></div>

					</div>
            	</div>
				<br>
					<div class="form-group" style="padding-top:15px;">
           				<label for="CreditcardMonth" class="col-sm-2 control-label">Affluence Level</label>
           				<div class="col-sm-10">
							<div class="row">
               					<div class="col-xs-6">
									<select id="aff_lev" class="form-control col-sm-2" style="width:500px;">
										<option value="-1">--Select Affluence Level--</option>
										<option>Middle Class</option>
									</select>
               					</div>
           					</div>
							<div class="text-danger error_aff_lev"></div>
						</div>
           			</div>
				<br>
				<button id="btn_prev3" class="btn btn-primary next btn_next pull-left">Prev</button>
				<button id="btn_step4" class="btn btn-primary next btn_next">Next</button>
        	</fieldset>
		</div>

		  		  
		  <div id="step5" style="display:none">
		  <fieldset class="form-horizontal" role="form">
            <legend>Describe your self in own word</legend>
			
			
			<div class="form-group" style="padding-top:15px;">
            	<label for="CreditcardMonth" class="col-sm-2 control-label" style="text-align:left">About Yours</label>
            		<div class="col-sm-10">
						<div class="row">
                			<div class="col-xs-6">
								 <textarea maxlength="50" class="form-control" style="width:300px; height:150px;" id="about" placeholder="Hi,thanks for visiting my profile.i have completed my master before 2 year.I am friendly person and I don't expect perfection , would  just like to find someone 'perfect' for me....."></textarea> 		
                		</div>
            		</div>
						<div class="text-danger error_about"></div>
				</div>
            </div>
			<div class="form-group">
            	<label for="CreditcardMonth" class="col-sm-2 control-label" style="text-align:left">Any Disability</label>
            		<div class="col-sm-10">
						<table width="300px;">
						<tr>
							<td><input type="radio" name="dis" value="0" id="dis"> None</td>
                			<td> <input type="radio" name="dis" value="1" id="dis"> Phisical Disability</td>	   
                		</tr>
            			</table>		
				</div>
					<div class="text-danger error_dis"></div>
            </div>
          </fieldset>
		  <br>
		  
        <p>
			<button id="btn_prev4" class="btn btn-primary next btn_next pull-left">Prev</button>
            <button id="SaveAccount" class="btn btn-primary submit" style="background-color:#FF3300" type="submit" data-toggle="modal" data-target="">create profile</button>
        </p>
		
    
</div>
</form>
</div>

<!--------------------------------- Modal ------------------------------------>

	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="padding-top:55px;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
					<img class="img-circle" id="img_logo" src="<?=base_url();?>asset/upload/MJ_Logo.png">
					<h3 style="padding-top:15px;">Please verify Your Mobile Number</h3>
				</div>
                <div id="div-forms" style="auto !important">
					<div class="text-danger error_modal" style="text-align:center;">
						
					</div>
					<center><i class="fa fa-4x fa-mobile" aria-hidden="true"></i></center>
                	<form method="post">
						<center>
							<h4>We have sent a 4 digit PIN to <br> <input type="text" id="edit_mb" readonly="" value="" style="border:none; background-color:transparent;width:30%;" > | <a href="#" id="edit_mobile" style="display:inline;">Edit</a><a href="#" id="send_pin" style="display:none;">Send</a></h4>
							<input class="text" type="text" id="m_pin" name="m_pin" maxlength="4" placeholder="Enter Your PIN" style="width:40%; height:32px; text-align:center;"/>
					
							<a href="#"><button class="btn btn-info" type="submit" id="submit_pin" name="submit_pin" style="width:25%; border-radius:4px;">Verify</button></a>
						</center>
					</form>
					<h5 style="padding-left:15px; padding-bottom:8px"> Didn't receive the PIN ? <a href="#" id="resend">Resend PIN</a></h5>
				</div>
			</div>
		</div>            
     </div>               

		<!------------------------- /Modal ------------------------------------>
<div class="col-md-12" style="padding-bottom:70px;">

</div>
<?php
	include('footer.php');
?>