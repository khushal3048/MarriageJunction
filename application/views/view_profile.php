<?php
		include('header.php');
	
//	print_r($pro_id);
//	print_r($userpro);
	
	$this->user_mo->who_viewed($userpro[0]['profile_id'],$pro_id[0]['profile_id']);
	$con = $userpro[0]['country'];
	$st = $userpro[0]['state'];
	$ci = $userpro[0]['city'];
	$reg = $userpro[0]['religion'];
	$cast = $userpro[0]['community'];
	$sub = $userpro[0]['sub-community'];
	$data = $this->user_mo->getdetail($con,$st,$ci,$reg,$cast,$sub);
	
	$view = $this->user_mo->getviewedpro($userpro[0]['profile_id']);
//	print_r($view);

	$simi = $this->user_mo->getsimi($userpro[0]['marital_status'],$userpro[0]['profile_id']);
	//print_r($simi);
	
?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo base_url('user/profile');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">View Profile</li>
     </ul>
   </div>
   <div class="profile">
   	 <div class="col-md-8 profile_left">
   	 	<h2>Profile Id : <?=$userpro[0]['profile_id']?></h2>
   	 	<div class="col_3">
   	        <div class="col-sm-4 row_2">
				<div class="flexslider">
					 <ul class="slides">
						<li data-thumb="<?php echo base_url(); ?>assets/images/<?=$userpro[0]['file_name']?>">
							<img src="<?php echo base_url(); ?>assets/images/<?=$userpro[0]['file_name']?>" />
						</li>
						<li data-thumb="<?php echo base_url(); ?>assets/images/<?=$userpro[0]['file_name']?>">
							<img src="<?php echo base_url(); ?>assets/images/<?=$userpro[0]['file_name']?>" />
						</li>
						<li data-thumb="<?php echo base_url(); ?>assets/images/<?=$userpro[0]['file_name']?>">
							<img src="<?php echo base_url(); ?>assets/images/<?=$userpro[0]['file_name']?>" />
						</li>
						<li data-thumb="<?php echo base_url(); ?>assets/images/<?=$userpro[0]['file_name']?>">
							<img src="<?php echo base_url(); ?>assets/images/<?=$userpro[0]['file_name']?>" />
						</li>
					 </ul>
				  </div>
			</div>
			<div class="col-sm-8 row_1">
				<table class="table_working_hours">
		        	<tbody>
						<tr class="opened_1">
							<td class="day_label">Name :</td>
							<td class="day_value"><?=$userpro[0]['name']?></td>
						</tr>
						<tr class="opened_1">
							<td class="day_label">Birth date :</td>
							<td class="day_value"><?=$userpro[0]['date_of_birth']?></td>
						</tr>
		        		<tr class="opened_1">
							<td class="day_label">Age / Height :</td>
							<td class="day_value">28, <?=$userpro[0]['height']?></td>
						</tr>
						<tr class="opened">
							<td class="day_label">Mobile No. :</td>
							<td class="day_value"><?=$userpro[0]['mobile']?></td>
						</tr>
						<tr class="opened">
							<td class="day_label">Marital Status :</td>
							<td class="day_value"><?=$userpro[0]['marital_status']?></td>
						</tr>
						<tr class="closed">
							<td class="day_label">Education :</td>
							<td class="day_value closed"><span><?=$userpro[0]['education_field']?></span></td>
						</tr>

					    <tr class="opened">
							<td class="day_label">Religion :</td>
							<td class="day_value"><?=$data[0]['religion_name']?></td>
						</tr>
					    <tr class="opened">
							<td class="day_label">Location :</td>
							<td class="day_value"><?=$data[0]['country_name']?></td>
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
				    <div class="tab_box">
				    	
				    </div>
				    <div class="basic_1">
				    	<h3>Basics & Lifestyle</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">Name :</td>
									<td class="day_value"><?=$userpro[0]['name']?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Marital Status :</td>
									<td class="day_value"><?=$userpro[0]['marital_status']?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">State :</td>
									<td class="day_value"><?=$data[0]['state_name']?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Body Type :</td>
									<td class="day_value"><?=$userpro[0]['body_type']?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Height :</td>
									<td class="day_value"><?=$userpro[0]['height']?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Physical Status :</td>
									<td class="day_value closed"><span><?php if($userpro[0]['disability']==0){echo "Normal";}else{echo "Abnormal";}?></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">Drink :</td>
									<td class="day_value closed"><span><?=$userpro[0]['drink']?></span></td>
								</tr>
						    </tbody>
				          </table>
				         </div>
				         <div class="col-md-6 basic_1-left">
				          <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">Age :</td>
									<td class="day_value">28 Yrs</td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Mother Tongue :</td>
									<td class="day_value"><?=$userpro[0]['mother_tongue']?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">City :</td>
									<td class="day_value"><?=$data[0]['city_name']?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Complexion :</td>
									<td class="day_value"><?=$userpro[0]['body_tone']?></td>
								</tr>
							    <tr class="closed">
									<td class="day_label">Diet :</td>
									<td class="day_value closed"><span><?=$userpro[0]['diet']?></span></td>
								</tr>
							    <tr class="closed">
									<td class="day_label">Smoke :</td>
									<td class="day_value closed"><span><?=$userpro[0]['smoke']?></span></td>
								</tr>
						    </tbody>
				        </table>
				        </div>
				        <div class="clearfix"> </div>
				    </div>
				    <div class="basic_1">
				    	<h3>Religious / Social & Astro Background</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
								<tr class="opened">
									<td class="day_label">Date of Birth :</td>
									<td class="day_value closed"><span><?=$userpro[0]['date_of_birth']?></span></td>
								</tr>
				        		<tr class="opened">
									<td class="day_label">Caste :</td>
									<td class="day_value"><?=$data[0]['caste_name']?></td>
								</tr>
							 </tbody>
				          </table>
				         </div>
				         <div class="col-md-6 basic_1-left">
				          <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">Religion :</td>
									<td class="day_value"><?=$data[0]['religion_name']?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Sub Caste :</td>
									<td class="day_value"><?=$data[0]['sub_caste_name']?></td>
								</tr>
							</tbody>
				        </table>
				        </div>
				        <div class="clearfix"> </div>
				    </div>
				  </div>
				  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
				    <div class="tab_box">
				    	
				    </div>
				    <div class="basic_3">
				    	<h4>Family Details</h4>
				    	<div class="basic_1 basic_2">
				    	<h3>Basics</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">Father's Occupation :</td>
									<td class="day_value"><?=$userpro[0]['father_status']?></td>
								</tr>
				        		<tr class="opened">
									<td class="day_label">Mother's Occupation :</td>
									<td class="day_value"><?=$userpro[0]['mother_status']?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">No. of Brothers :</td>
									<td class="day_value closed"><span><?=$userpro[0]['no_of_brothers']?></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">No. of Married Brothers :</td>
									<td class="day_value closed"><span><?=$userpro[0]['no_of_merried_brother']?></span></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">No. of Sisters :</td>
									<td class="day_value closed"><span><?=$userpro[0]['no_of_sister']?></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">No. of Married Sisters :</td>
									<td class="day_value closed"><span><?=$userpro[0]['no_of_merried_sister']?></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">Affluence Level :</td>
									<td class="day_value closed"><span><?=$userpro[0]['affluence_level']?></span></td>
								</tr>
							 </tbody>
				          </table>
				         </div>
				       </div>
				    </div>
				 </div>
				 <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
				 <div class="tab_box">
				 	
				 </div>
				 <div class="basic_3">
				   <h4>Education & Career Details</h4>
				    <div class="basic_1 basic_2">
				       <div class="basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">Education Level :</td>
									<td class="day_value"><?=$userpro[0]['education_level']?></td>
								</tr>
				        		<tr class="opened">
									<td class="day_label">Education Field :</td>
									<td class="day_value"><?=$userpro[0]['education_field']?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Employee In :</td>
									<td class="day_value closed"><span><?=$userpro[0]['employee_in']?></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">Designation :</td>
									<td class="day_value closed"><span><?=$userpro[0]['post']?></span></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Annual Income :</td>
									<td class="day_value closed"><span><?=$userpro[0]['annual_income']?></span></td>
								</tr>
							 </tbody>
				          </table>
				        </div>
						</div>
				     </div>
				 </div>
		     </div>
		  </div>
	   </div>
   	 </div>
     <div class="col-md-4 profile_right">
<script type="text/javascript">
	$(document).ready(function(){
		$("#btnsubmit").on("click",function(e){
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
							$(".error_search").html("Profile Id Doesn't Match....").fadeIn(300).delay(2000).fadeOut(300);
						}			
					},
					error:function() {
							
					}
				});
			}
			else
			{
				$(".error_search").html("Plz Enter Profile ID...").fadeIn(300).delay(2000).fadeOut(300);
			}
		});
	});
</script>
     	<div class="newsletter">
     		<center><div class="error_search text-danger"></div></center>
		   <form method="post">
			  <input type="text" name="ne" id="txtprofile" size="30" required="" placeholder="Enter Profile ID :">
			  <input type="submit" value="Go" id="btnsubmit">
		   </form>
        </div>
        <div class="view_profile">
        	<h3>View Similar Profiles</h3>
        	<?php
        		foreach ($simi as $value) {
        	//	print_r($value);
        		$cr1 = $this->user_mo->getcr($value['country'],$value['religion']);
        	//	print_r($cr1);
        	?>
        	<ul class="profile_item">
        	  <a href="<?=base_url('user/view_profile/').$value['profile_id'];?>">
        	   <li class="profile_item-img">
        	   	  <img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$value['file_name']?>" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4><?=$value['profile_id']?></h4>
        	   	  <p>29 Yrs, <?=$value['height']?> <?=$cr1[0]['religion_name']?></p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <?php } ?>
       </div>
       <div class="view_profile view_profile1">
        	<h3>Members who viewed this profile also viewed</h3>
		<?php
			foreach($view as $value)
			{
				$viewed = $this->user_mo->getuserpro($value['profile_id']);
				$cr = $this->user_mo->getcr($viewed[0]['country'],$viewed[0]['religion']);
		?>
        	<ul class="profile_item">
        	  <a href="<?=base_url('user/view_profile/').$value['profile_id'];?>">
        	   <li class="profile_item-img">
        	   	  <img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$viewed[0]['file_name']?>" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4><?=$value['profile_id']?></h4>
        	   	  <p>29 Yrs, <?=$viewed[0]['height']?> <?=$cr[0]['religion_name']?></p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
		<?php } ?>
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