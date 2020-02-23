<?php
	//include('header.php');
?>

<title>Marriage Junction | Change Password Form</title>
		
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
		
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!--===================== Custom Theme files ======================= -->

		<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />

		<link href="<?php echo base_url(); ?>assets/css/oswald_font.css" rel='stylesheet' type='text/css'>

		<link href="<?php echo base_url(); ?>assets/css/ubuntu_font.css" rel='stylesheet' type='text/css'>

		<!-- =============== font-Awesome ================= -->

		<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">


	<div class="navbar navbar-inverse-blue navbar" style="margin-bottom:-650px;">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?=base_url();?>"><img src="<?php echo base_url(); ?>asset/upload/MJ.png" alt="logo" style="height: 50px; width: 200px;"></a>
			  	<div class="clearfix"> </div>
			</div> <!-- end container -->
		</div> <!-- end navbar-inner -->
	</div> <!-- end navbar-inverse-blue -->
	
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?=base_url('user/'); ?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Change Password</li>
     </ul>
   </div>
   <div class="services">
   	  <div class="col-sm-6 login_left">
	  <div class="text-danger" style="text-align:center;">
	  		<?php
				if($this->session->flashdata('error1'))
				{
					echo  $this->session->flashdata('error1');
				}
				elseif($this->session->flashdata('error2'))
				{
					echo  $this->session->flashdata('error2');
				}
			?>
	  </div>
	   <form method="post" id="frm_pwd" action="<?=base_url('user_operation/change_pwd');?>">
  	    <div class="form-item form-type-textfield form-item-name">
	      <label for="new_pwd">New Password <span class="form-required" title="This field is required.">*</span></label>
	      <input type="password" id="new_pwd" name="new_pwd" placeholder="Enter New Password" class="form-text">
	    </div>
	    <div class="form-item form-type-password form-item-pass">
	      <label for="confirm_pwd">Confirm Password <span class="form-required" title="This field is required.">*</span></label>
	      <input type="password" id="confirm_pwd" name="confirm_pwd" placeholder="Re-enter the Password" class="form-text">
	    </div>
	    <div class="form-actions">
			<input type="hidden" id="token" name="token" value="<?=$token?>" />
	    	 <button class="btn_1" type="submit" id="">Change Password</button> 
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
//	include('footer.php');
?>