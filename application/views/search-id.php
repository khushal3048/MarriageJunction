<?php 
	include('header.php');
?>
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
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo base_url('user/profile');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Search By Profile ID</li>
     </ul>
   </div>
   	<div align="center" class="text-danger error_search"></div>
   <div class="col-md-9 profile_left">	
	  <div class="form_but1">
		<label class="col-sm-3 control-lable1" for="sex">Profile ID : </label>
		<div class="col-sm-9 form_radios">
		  <div class="input-group1">
		 <form method="post" action="">
		 	<input type="text" id="txtprofile" onfocus="this.value = '';" placeholder="Enter Profile ID :"  style="width:50%;"/>
			<input type="text" style="width:40%; border-color:transparent" readonly="" />
			<input type="submit" value="Search" id="btnsearch" />
		 </form>
	      </div>
	    </div>
		<div class="clearfix"> </div>
	 </div>
 <div class="paid_people">
   <h1>Most Visited Profiles</h1>
   <?php

   		$cn = $this->user_mo->cnt();
   		
   			$res = $this->user_mo->getuserpro($cn[0]['profile_id']);
   			$r = $this->user_mo->getR($res[0]['religion']);

   			$res1 = $this->user_mo->getuserpro($cn[1]['profile_id']);
   			$r1 = $this->user_mo->getR($res1[0]['religion']);

   			$res2 = $this->user_mo->getuserpro($cn[2]['profile_id']);
   			$r2 = $this->user_mo->getR($res2[0]['religion']);

   			$res3 = $this->user_mo->getuserpro($cn[3]['profile_id']);
   			$r3 = $this->user_mo->getR($res3[0]['religion']);

   			$res4 = $this->user_mo->getuserpro($cn[4]['profile_id']);
   			$r4 = $this->user_mo->getR($res4[0]['religion']);

   			$res5 = $this->user_mo->getuserpro($cn[5]['profile_id']);
   			$r5 = $this->user_mo->getR($res5[0]['religion']);
   			
   		
   ?>
   <div class="row_1">
	   <div class="col-sm-6 paid_people-left">
	 	<ul class="profile_item">
		  <a href="#">
		   <li class="profile_item-img">
		   	  <img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$res[0]['file_name']?>" class="img-responsive" alt=""/>
		   </li>
		   <li class="profile_item-desc">
		   	  <h4><?=$res[0]['profile_id']?></h4>
		   	  <p>29 Yrs, <?=$res[0]['height']?> <?=$r[0]['religion_name']?></p>
		   	  <h5>View Full Profile</h5>
		   </li>
		   <div class="clearfix"> </div>
		  </a>
	     </ul>
	   </div>
	   <div class="col-sm-6">
	 	<ul class="profile_item">
		  <a href="#">
		   <li class="profile_item-img">
		   	  <img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$res1[0]['file_name']?>" class="img-responsive" alt=""/>
		   </li>
		   <li class="profile_item-desc">
		   	  <h4><?=$res1[0]['profile_id']?></h4>
		   	  <p>29 Yrs, <?=$res1[0]['height']?> <?=$r1[0]['religion_name']?></p>
		   	  <h5>View Full Profile</h5>
		   </li>
		   <div class="clearfix"> </div>
		  </a>
	     </ul>
	   </div>
	   <div class="clearfix"> </div>
   </div>
   <div class="row_1">
	   <div class="col-sm-6 paid_people-left">
	 	<ul class="profile_item">
		  <a href="#">
		   <li class="profile_item-img">
		   	  <img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$res3[0]['file_name']?>" class="img-responsive" alt=""/>
		   </li>
		   <li class="profile_item-desc">
		   	  <h4><?=$res3[0]['profile_id']?></h4>
		   	  <p>29 Yrs, <?=$res3[0]['height']?> <?=$r3[0]['religion_name']?></p>
		   	  <h5>View Full Profile</h5>
		   </li>
		   <div class="clearfix"> </div>
		  </a>
	     </ul>
	   </div>
	   <div class="col-sm-6">
	 	<ul class="profile_item">
		  <a href="#">
		   <li class="profile_item-img">
		   	  <img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$res2[0]['file_name']?>" class="img-responsive" alt=""/>
		   </li>
		   <li class="profile_item-desc">
		   	  <h4><?=$res2[0]['profile_id']?></h4>
		   	  <p>29 Yrs, <?=$res2[0]['height']?> <?=$r2[0]['religion_name']?></p>
		   	  <h5>View Full Profile</h5>
		   </li>
		   <div class="clearfix"> </div>
		  </a>
	     </ul>
	   </div>
	   <div class="clearfix"> </div>
   </div>
   <div class="row_1">
	   <div class="col-sm-6 paid_people-left">
	 	<ul class="profile_item">
		  <a href="#">
		   <li class="profile_item-img">
		   	  <img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$res4[0]['file_name']?>" class="img-responsive" alt=""/>
		   </li>
		   <li class="profile_item-desc">
		   	  <h4><?=$res4[0]['profile_id']?></h4>
		   	  <p>29 Yrs, <?=$res4[0]['height']?> <?=$r4[0]['religion_name']?></p>
		   	  <h5>View Full Profile</h5>
		   </li>
		   <div class="clearfix"> </div>
		  </a>
	     </ul>
	   </div>
	   <div class="col-sm-6">
	 	<ul class="profile_item">
		  <a href="#">
		   <li class="profile_item-img">
		   	  <img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$res5[0]['file_name']?>" class="img-responsive" alt=""/>
		   </li>
		   <li class="profile_item-desc">
		   	  <h4><?=$res5[0]['profile_id']?></h4>
		   	  <p>29 Yrs, <?=$res5[0]['height']?> <?=$r5[0]['religion_name']?></p>
		   	  <h5>View Full Profile</h5>
		   </li>
		   <div class="clearfix"> </div>
		  </a>
	     </ul>
	   </div>
	   <div class="clearfix"> </div>
   </div>
  </div>
</div>
<div class="col-md-3 match_right">
   <section class="slider">
	 <h3>Happy Marriage</h3>
	 <div class="flexslider">
		<ul class="slides">
		  <li>
			<img src="<?php echo base_url(); ?>assets/images/s2.jpg" alt=""/>
			<h4>Lorem & Ipsum</h4>
			<p>It is a long established fact that a reader will be distracted by the readable</p>
		  </li>
		  <li>
			<img src="<?php echo base_url(); ?>assets/images/s1.jpg" alt=""/>
			<h4>Lorem & Ipsum</h4>
			<p>It is a long established fact that a reader will be distracted by the readable</p>
		  </li>
		  <li>
			<img src="<?php echo base_url(); ?>assets/images/s3.jpg" alt=""/>
			<h4>Lorem & Ipsum</h4>
			<p>It is a long established fact that a reader will be distracted by the readable</p>
		  </li>
	    </ul>
	  </div>
   </section>
 
     </div>
     <div class="clearfix"> </div>
  </div>
</div>


<!-- FlexSlider -->
<link href="<?php echo base_url(); ?>assets/css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
  <script type="text/javascript">
	$(function(){
	  SyntaxHighlighter.all();
	});
	$(window).load(function(){
	  $('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
		  $('body').removeClass('loading');
		}
	  });
	});
  </script>
<!-- FlexSlider -->

<?php 
	include('footer.php');
?>