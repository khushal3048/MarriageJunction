
<title>Marriage Junction | Upload Profile Photo</title>
		
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
		
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!--===================== Custom Theme files ======================= -->

		<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />

		<link href="<?php echo base_url(); ?>assets/css/oswald_font.css" rel='stylesheet' type='text/css'>

		<link href="<?php echo base_url(); ?>assets/css/ubuntu_font.css" rel='stylesheet' type='text/css'>

		<!-- =============== font-Awesome ================= -->

		<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">

<script>
	function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile').attr('src', e.target.result);
			
        }

        reader.readAsDataURL(input.files[0]);
		$("#upload_img").css('display','none');
		$("#upload").css('display','block');		
    }
}
</script>
	<div class="navbar navbar-inverse-blue navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?=base_url();?>"><img src="<?php echo base_url(); ?>asset/upload/MJ.png" alt="logo" style="height: 50px; width: 200px;">
				</a>
			  	<div class="clearfix"> </div>
			</div> <!-- end container -->
		</div> <!-- end navbar-inner -->
	</div> <!-- end navbar-inverse-blue -->
	
<div class="grid_3" style="margin-top:-620px;">
	<div class="container">
		<div class="breadcrumb1">
     		<ul>
        		<a href="#"><i class="fa fa-home home_1"></i></a>
        		<span class="divider">&nbsp;|&nbsp;</span>
        		<li class="current-page">Add your Profile Photo</li>
     		</ul>
   		</div>
   		<div class="services">
   			<div class="col-md-12" style="border:1px solid; border-color:#a9a9a9">
			<div class="text-danger" align="center" style="margin-top:10px;">
				<h3>
					<?php
						if($error_reg = $this->session->flashdata("success"))
						{ 
             				print_r( $error_reg);  
     			    	}
					?>
				</h3>
			</div>
	   			<form  method="post" action="<?php echo base_url('user_operation/uploadpic');?>" enctype="multipart/form-data" >
					<div class="col-md-4" style="display:inline; margin:50px">
						<img src="<?=base_url();?>asset/upload/profile.png" id="profile" alt="Error" name="cover" class="" height="300" width="280">
					</div>
					<div class="col-md-6" style="margin-top:170px;">	
						<label for="upload_img">
							<button id="upload_img" class="form-control" style="height:7%; font-size:20px; background-color:#C32143; color:#FFFFFF;">Upload                                    From Computer</button>
							<input type="file" name="userfile" id="upload_img" style="margin-top:-30px; opacity: 0; " onchange="readURL(this);"/>
							<button id="upload" type="submit" class="form-control" style="height:7%; background-color:#C32143; color:#FFFFFF; font-size:18px; display:none;">Upload</button>
						</label>
					</div>	
				</form>
   			</div>
   			<div class="clearfix"></div>
  		</div>
  	</div>
</div>


<?php
	//include('footer.php');
?>
<!--
	<label for="upload_img" >
					<button id="upload_img" class="form-control" style="height:7%; font-family:sans-serif; font-size:20px; background-color:#C32143; color:#FFFFFF;">Upload From 	  							Computer</button>
					<input type="file" name="img_upload" id="upload_img" style="margin-top:-30px;opacity:0;"/>
				</label>
			
				<center><h2 style="margin-top:-150px;margin-left:280px;">OR</h2></center>
			
				<button class="form-control" style="height:7%; width:290px;; font-family:sans-serif; font-size:20px; margin-left:570px; background-color:#C32143; color:#FFFFFF;">    						Import From Facebook</button>
-->