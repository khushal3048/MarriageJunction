<?php
		include('header.php');
	
//	print_r($pro_id);
//	print_r($reguser);
	

	$con = $reguser[0]['country'];
	$st = $reguser[0]['state'];
	$ci = $reguser[0]['city'];
	$reg = $reguser[0]['city'];
	$cast = $reguser[0]['city'];
	$sub = $reguser[0]['city'];
	$data = $this->user_mo->getdetail($con,$st,$ci,$reg,$cast,$sub);
//	print_r($data);
	
?>
<script>
	$(document).ready(function(){
		$("#btnupdate").on("click",function(e){
			e.preventDefault();
			$("#txtname").css('border-color','light black');
			$("#txtname").removeAttr('readonly');
			$("#txtms").css('border-color','light black');
			$("#txtms").removeAttr('readonly');
			$("#txtbt").css('border-color','light black');
			$("#txtbt").removeAttr('readonly');
			$("#txtheight").css('border-color','light black');
			$("#txtheight").removeAttr('readonly');
			$("#txtps").css('border-color','light black');
			$("#txtps").removeAttr('readonly');
			$("#txtmt").css('border-color','light black');
			$("#txtmt").removeAttr('readonly');
			$("#txtcom").css('border-color','light black');
			$("#txtcom").removeAttr('readonly');
			$("#txtdiet").css('border-color','light black');
			$("#txtdiet").removeAttr('readonly');
			$("#txtsmoke").css('border-color','light black');
			$("#txtsmoke").removeAttr('readonly');
			$("#txtdrink").css('border-color','light black');
			$("#txtdrink").removeAttr('readonly');
			$("#btnupdate").css('display','none');
			$("#btnok").css('display','block');
		});
		
		$("#btnupdate1").on("click",function(e){
			e.preventDefault();
			$("#txtfo").css('border-color','light black');
			$("#txtfo").removeAttr('readonly');
			$("#txtmo").css('border-color','light black');
			$("#txtmo").removeAttr('readonly');
			$("#txtnob").css('border-color','light black');
			$("#txtnob").removeAttr('readonly');
			$("#txtnmb").css('border-color','light black');
			$("#txtnmb").removeAttr('readonly');
			$("#txtnos").css('border-color','light black');
			$("#txtnos").removeAttr('readonly');
			$("#txtnms").css('border-color','light black');
			$("#txtnms").removeAttr('readonly');
			$("#txtal").css('border-color','light black');
			$("#txtal").removeAttr('readonly');
			$("#btnupdate1").css('display','none');
			$("#btnok1").css('display','block');
		});

		$("#btnupdate2").on("click",function(e){
			e.preventDefault();
			$("#txtel").css('border-color','light black');
			$("#txtel").removeAttr('readonly');
			$("#txtef").css('border-color','light black');
			$("#txtef").removeAttr('readonly');
			$("#txtei").css('border-color','light black');
			$("#txtei").removeAttr('readonly');
			$("#txtdes").css('border-color','light black');
			$("#txtdes").removeAttr('readonly');
			$("#txtai").css('border-color','light black');
			$("#txtai").removeAttr('readonly');
			$("#btnupdate2").css('display','none');
			$("#btnok2").css('display','block');
		});
		
		$("#btnok").on("click",function(){
			var data = {};
			data['pro'] = $("#txtpro").val();
			data['name'] = $("#txtname").val();
			data['ms'] = $("#txtms").val();
			data['bt'] = $("#txtbt").val();
			data['height'] = $("#txtheight").val();
			data['ps'] = $("#txtps").val();
			data['mt'] = $("#txtmt").val();
			data['com'] = $("#txtcom").val();
			data['diet'] = $("#txtdiet").val();
			data['smoke'] = $("#txtsmoke").val();
			data['drink'] = $("#txtdrink").val();
			$.ajax({
					type:'POST',
					url:'http://localhost/marriagejunction/user_operation/update_info',
					dataType:'json',
					data:data,
					success:function(data) {
						if(data.status == 1) {
								window.location.href="http://localhost/marriagejunction/user/profile";
						}								
					},
					error:function() {							
					}
			});
			$("#txtname").css('border-color','transparent');
			$("#txtname").attr('readonly');
			$("#txtms").css('border-color','transparent');
			$("#txtms").attr('readonly');
			$("#txtbt").css('border-color','transparent');
			$("#txtbt").attr('readonly');
			$("#txtheight").css('border-color','transparent');
			$("#txtheight").attr('readonly');
			$("#txtps").css('border-color','transparent');
			$("#txtps").attr('readonly');
			$("#txtmt").css('border-color','transparent');
			$("#txtmt").attr('readonly');
			$("#txtcom").css('border-color','transparent');
			$("#txtcom").attr('readonly');
			$("#txtdiet").css('border-color','transparent');
			$("#txtdiet").attr('readonly');
			$("#txtsmoke").css('border-color','transparent');
			$("#txtsmoke").attr('readonly');
			$("#txtdrink").css('border-color','transparent');
			$("#txtdrink").attr('readonly');
			$("#btnok").css('display','none');
			$("#btnupdate").css('display','block');
		});

		$("#btnok1").on("click",function(){
			var data = {};
			data['pro'] = $("#txtpro").val();
			data['fo'] = $("#txtfo").val();
			data['mo'] = $("#txtmo").val();
			data['nob'] = $("#txtnob").val();
			data['nmb'] = $("#txtnmb").val();
			data['nos'] = $("#txtnos").val();
			data['nms'] = $("#txtnms").val();
			data['al'] = $("#txtal").val();
			$.ajax({
					type:'POST',
					url:'http://localhost/marriagejunction/user_operation/update_info1',
					dataType:'json',
					data:data,
					success:function(data) {
						if(data.status == 1) {
								window.location.href="http://localhost/marriagejunction/user/profile";
						}								
					},
					error:function() {							
					}
			});
			$("#txtfo").css('border-color','transparent');
			$("#txtfo").attr('readonly');
			$("#txtmo").css('border-color','transparent');
			$("#txtmo").attr('readonly');
			$("#txtnob").css('border-color','transparent');
			$("#txtnob").attr('readonly');
			$("#txtnmb").css('border-color','transparent');
			$("#txtnmb").attr('readonly');
			$("#txtnos").css('border-color','transparent');
			$("#txtnos").attr('readonly');
			$("#txtnms").css('border-color','transparent');
			$("#txtnms").attr('readonly');
			$("#txtal").css('border-color','transparent');
			$("#txtal").attr('readonly');
			$("#btnok1").css('display','none');
			$("#btnupdate1").css('display','block');
		});

		$("#btnok2").on("click",function(){
			var data = {};
			data['pro'] = $("#txtpro").val();
			data['el'] = $("#txtel").val();
			data['ef'] = $("#txtef").val();
			data['ei'] = $("#txtei").val();
			data['des'] = $("#txtdes").val();
			data['ai'] = $("#txtai").val();
			$.ajax({
					type:'POST',
					url:'http://localhost/marriagejunction/user_operation/update_info2',
					dataType:'json',
					data:data,
					success:function(data) {
						if(data.status == 1) {
								window.location.href="http://localhost/marriagejunction/user/profile";
						}								
					},
					error:function() {							
					}
			});
			$("#txtel").css('border-color','transparent');
			$("#txtel").attr('readonly');
			$("#txtef").css('border-color','transparent');
			$("#txtef").attr('readonly');
			$("#txtei").css('border-color','transparent');
			$("#txtei").attr('readonly');
			$("#txtdes").css('border-color','transparent');
			$("#txtdes").attr('readonly');
			$("#txtai").css('border-color','transparent');
			$("#txtai").attr('readonly');
			$("#btnok2").css('display','none');
			$("#btnupdate2").css('display','block');
		});

	});
</script>
<script>
	$(document).ready(function(){
		$("#btnsearch").on("click",function(e){
			e.preventDefault();
			var data = $("#txtprofile").val();
			var pro = $("#txtprofile").val();
			if(data)
			{
				$.ajax({
					type:'POST',
					url:'http://localhost/marriagejunction/user_operation/search_id',
					dataType:'json',
					data:{id:data},
					success:function(data) {
					if(data.status == 1){
							window.location.href="http://localhost/marriagejunction/user/view_profile/"+pro;												
					} else {
						}			
					},
					error:function() {
							
					}
				});
			}
			else
			{
		
			}
		});
	});
</script>

<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo base_url('user/profile');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">My Profile</li>
     </ul>
   </div>
   <div class="profile">
   	 <div class="col-md-8 profile_left">
   	 	<h2>Profile Id : <input type="text" value="<?=$reguser[0]['profile_id']?>" id="txtpro" style="border-color:transparent;" readonly=""  /></h2>
   	 	<div class="col_3">
   	        <div class="col-sm-4 row_2">
				<div class="flexslider">
					 <ul class="slides">
						<li data-thumb="<?php echo base_url(); ?>assets/images/user_profile/<?=$reguser[0]['file_name']?>">
							<img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$reguser[0]['file_name']?>" />
						</li>
						<li data-thumb="<?php echo base_url(); ?>assets/images/user_profile/<?=$reguser[0]['file_name']?>">
							<img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$reguser[0]['file_name']?>" />
						</li>
						<li data-thumb="<?php echo base_url(); ?>assets/images/user_profile/<?=$reguser[0]['file_name']?>">
							<img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$reguser[0]['file_name']?>" />
						</li>
						<li data-thumb="<?php echo base_url(); ?>assets/images/user_profile/<?=$reguser[0]['file_name']?>">
							<img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$reguser[0]['file_name']?>" />
						</li>
					 </ul>
				  </div>
			</div>
			<div class="col-sm-8 row_1">
				<table class="table_working_hours">
		        	<tbody>
						<tr class="opened_1">
							<td class="day_label">Name :</td>
							<td class="day_value"><?=$reguser[0]['name']?></td>
						</tr>
						<tr class="opened_1">
							<td class="day_label">Birth date :</td>
							<td class="day_value"><?=$reguser[0]['date_of_birth']?></td>
						</tr>
		        		<tr class="opened_1">
							<td class="day_label">Age / Height :</td>
							<td class="day_value">28, <?=$reguser[0]['height']?></td>
						</tr>
						<tr class="opened">
							<td class="day_label">Mobile No. :</td>
							<td class="day_value"><?=$reguser[0]['mobile']?></td>
						</tr>
						<tr class="opened">
							<td class="day_label">Marital Status :</td>
							<td class="day_value"><?=$reguser[0]['marital_status']?></td>
						</tr>
						<tr class="closed">
							<td class="day_label">Education :</td>
							<td class="day_value closed"><span><?=$reguser[0]['education_field']?></span></td>
						</tr>

					    <tr class="opened">
							<td class="day_label">Religion :</td>
							<td class="day_value"><?=$data[0]['religion_name']?></td>
						</tr>
					    <tr class="opened">
							<td class="day_label">Location :</td>
							<td class="day_value"><?=$data[0]['country_name']?></td>
						</tr>
						<tr class="opened">
							<td class="day_label">State :</td>
							<td class="day_value"><?=$data[0]['state_name']?></td>
						</tr>
						<tr class="opened">
							<td class="day_label">City :</td>
							<td class="day_value"><?=$data[0]['city_name']?></td>
						</tr>
				    </tbody>
				</table>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col_4">
		    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			   <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
				  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">About Myself</a></li>
				  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Family Details</a></li>
				  <li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Education Details</a></li>
			   </ul>
			   <div id="myTabContent" class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				    <div class="basic_1">
				    	<h3>Basics & Lifestyle</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
								<form method="post" action="<?=base_url('user_operation/update_profile');?>">
				        		<tr class="opened_1">
									<td class="day_label">Name :</td>
									<td class="day_value"><input type="text" id="txtname" value="<?=$reguser[0]['name']?>" style="border-color:transparent;" readonly="" /></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Marital Status :</td>
									<td class="day_value"><input type="text" id="txtms" value="<?=$reguser[0]['marital_status']?>" style="border-color:transparent;" readonly="" /></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Body Type :</td>
									<td class="day_value"><input type="text" id="txtbt" value="<?=$reguser[0]['body_type']?>" style="border-color:transparent;" readonly="" /></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Height :</td>
									<td class="day_value"><input type="text" id="txtheight" value="<?=$reguser[0]['height']?>" style="border-color:transparent;" readonly="" /></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Physical Status :</td>
									<td class="day_value closed"><span><input type="text" id="txtps" value="<?php if($reguser[0]['disability']==0){echo "Normal";}else{echo "Abnormal";}?>" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
						    </tbody>
				          </table>
				         </div>
				         <div class="col-md-6 basic_1-left">
				          <table class="table_working_hours">
				        	<tbody>
							    <tr class="opened">
									<td class="day_label">Mother Tongue :</td>
									<td class="day_value"><input type="text" value="<?=$reguser[0]['mother_tongue']?>" id="txtmt" style="border-color:transparent;" readonly="" /></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Complexion :</td>
									<td class="day_value"><input type="text" value="<?=$reguser[0]['body_tone']?>" id="txtcom" style="border-color:transparent;" readonly="" /></td>
								</tr>
							    <tr class="closed">
									<td class="day_label">Diet :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['diet']?>" id="txtdiet" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">Drink :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['drink']?>" id="txtdrink" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
							    <tr class="closed">
									<td class="day_label">Smoke :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['smoke']?>" id="txtsmoke" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
								
						    </tbody>
				        </table>
				        </div>
				        <div class="clearfix"> </div>
				    </div>
					<div align="right">	
					  	<button type="button" class="btn btn-info" id="btnupdate">Update</button>
						<button type="submit" class="btn btn-info" id="btnok" style="display:none;">OK</button>
						</form>
					</div>
				  </div>
				  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
				    <div class="basic_3">
				    	<h4>Family Details</h4>
				    	<div class="basic_1 basic_2">
				    	<h3>Basics</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">Father's Occupation :</td>
									<td class="day_value"><input type="text" value="<?=$reguser[0]['father_status']?>" id="txtfo" style="border-color:transparent;" readonly="" /></td>
								</tr>
				        		<tr class="opened">
									<td class="day_label">Mother's Occupation :</td>
									<td class="day_value"><input type="text" value="<?=$reguser[0]['mother_status']?>" id="txtmo" style="border-color:transparent;" readonly="" /></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">No. of Brothers :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['no_of_brothers']?>" id="txtnob" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">No. of Married Brothers :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['no_of_merried_brother']?>" id="txtnmb" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">No. of Sisters :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['no_of_sister']?>" id="txtnos" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">No. of Married Sisters :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['no_of_merried_sister']?>" id="txtnms" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">Affluence Level :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['affluence_level']?>" id="txtal" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
							 </tbody>
				          </table>
				         </div>
				       </div>
				    </div>
					<div align="right" style="margin-top:200px;">	
						<button type="button" class="btn btn-info" id="btnupdate1">Update</button>
						<button type="button" class="btn btn-info" id="btnok1" style="display:none;">OK</button>
					</div>
				 </div>
				 <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
				   <div class="basic_3">
				    <h4>Education Details</h4>
				    <div class="basic_1 basic_2">
				       <div class="basic_1-left">
				    		<table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">Education Level :</td>
									<td class="day_value"><input type="text" value="<?=$reguser[0]['education_level']?>" id="txtel" style="border-color:transparent;" readonly="" /></td>
								</tr>
				        		<tr class="opened">
									<td class="day_label">Education Field :</td>
									<td class="day_value"><input type="text" value="<?=$reguser[0]['education_field']?>" id="txtef" style="border-color:transparent;" readonly="" /></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Employee In :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['employee_in']?>" id="txtei" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">Designation :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['post']?>" id="txtdes" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Annual Income :</td>
									<td class="day_value closed"><span><input type="text" value="<?=$reguser[0]['annual_income']?>" id="txtai" style="border-color:transparent;" readonly="" /></span></td>
								</tr>
							 </tbody>
				          </table>
					   </div>
				     </div>
					</div>
					<div align="right">	
					  	<button type="button" class="btn btn-info" id="btnupdate2">Update</button>
						<button type="button" class="btn btn-info" id="btnok2" style="display:none;">OK</button>
					</div>
				 </div>
		     </div>
		  </div>
	   </div>
   	 </div>
   	 <script>
	$(document).ready(function(){
		$("#btnsearch").on("click",function(e){
			e.preventDefault();
			var data = $("#txtprofile").val();
			var pro = $("#txtprofile").val();
			if(data)
			{
				$.ajax({
					type:'POST',
					url:'http://localhost/marriagejunction/user_operation/search_id',
					dataType:'json',
					data:{id:data},
					success:function(data) {
					if(data.status == 1){
							window.location.href="http://localhost/marriagejunction/user/view_profile/"+pro;												
					} else {
							$(".error_search").html("Profile Id Doesn't Match....").fadeIn(300).delay(3000).fadeOut(300);
						}			
					},
					error:function() {
							
					}
				});
			}
			else
			{
				$(".error_search").html("Plz Enter Profile ID...").fadeIn(300).delay(3000).fadeOut(300);
			}
		});
	});
</script>
     <div class="col-md-4 profile_right">
     	<div class="newsletter">
     	<center><div class="error_search text-danger"></div></center>
		   <form method="post">
			  <input type="text" name="ne" size="30" id="txtprofile" required="" placeholder="Enter Profile ID :" onfocus="this.value = '';">
			  <input type="submit" value="Go" id="btnsearch">
		   </form>
        </div>
        <div class="view_profile view_profile1">
        	<h3>Members who viewed My profile</h3>
        	<?php
				$getpro = $this->user_mo->whoviewedmypro($reguser[0]['profile_id']);
				foreach($getpro as $value)
				{
					$data = $this->user_mo->getuserpro($value['who_view']);
					//print_r($data);
					$r = $this->user_mo->getR($data[0]['religion']);
					//print_r($r);
			?>
			<ul class="profile_item">
        	  <a href="<?=base_url('user/view_profile/').$data[0]['profile_id']?>">
        	   <li class="profile_item-img">
        	   	  <img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$data[0]['file_name']?>" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4><?=$data[0]['profile_id']?></h4>
        	   	  <p>29 Yrs, <?=$data[0]['height']?>, <?=$r[0]['religion_name']?></p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
		   <?php
		   	}
		   ?>
         </div>
        </div>
       <div class="clearfix"> </div>
    </div>
  </div>
</div>


<!-- FlexSlider -->
<script defer src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css" type="text/css" media="screen" />
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>   

<?php 
		include('footer.php');
?>