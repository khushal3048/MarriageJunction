
<div class="container" style="margin-top: -50px;">
  	<div class="breadcrumb1">
    	<ul>
        	<a href="<?php echo base_url('user/profile');?>"><i class="fa fa-home home_1"></i></a>
        	<span class="divider">&nbsp;|&nbsp;</span>
        	<li class="current-page">Viewed Profiles</li>
     	</ul>
   </div>
	<div class="col-md-3 col_5">
   		<img src="<?php echo base_url(); ?>assets/images/v1.jpg" class="img-responsive" alt=""/>
    	<div style="box-sizing: 10px;">
  	</div>
</div>
   <div class="col-md-9 profile_left">
     <div class="col_4">
		    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			   <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
				  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Search Result</a></li>
			   </ul>
			   <div id="myTabContent" class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				    
	                <div class="jobs-item with-thumb">
					<?php
					// print_r($userdata);
					foreach($userdata as $value)
						{
							
							//print_r($value['profile_id']);
							$data = $this->user_mo->getuserpro($value['profile_id']);
							//print_r($data);
							$r = $this->user_mo->getR($data[0]['religion']);
						
					?>
	                   <div class="thumb_top">
				        <div class="thumb"><img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$data[0]['file_name']?>" class="img-responsive" alt=""/></div>
					    <div class="jobs_right">
							<h6 class="title"><?=$data[0]['name']?> (<?=$data[0]['profile_id']?>)</h6>
							<p class="description">30 years, <?=$data[0]['height']?> | <span class="m_1">Reliogion</span> : <?=$r[0]['religion_name']?> | <span class="m_1">Education</span> : <?=$data[0]['education_level']?> | <span class="m_1">Occupation</span> : <?=$data[0]['education_field']?><br>
							<a href="<?=base_url('user/view_profile/').$data[0]['profile_id'];?>" class="read-more">view full profile</a></p>
						</div>
						<div class="clearfix"> </div>
					   </div>
					   <div class="thumb_bottom">
					   	   <div class="thumb_but"><a href="<?=base_url();?>livechat/php/app.php/admin" class="photo_view">Live Chat</a></div>
					   	  <div class="clearfix"> </div>
					   </div>
					   <?php } ?>
					  </div>
					
				    <ul class="pagination pagination_1">
				 	  <li class="active"><a href="#">1</a></li>
				 	  <li><a href="#">2</a></li>
				 	  <li><a href="#">3</a></li>
				 	  <li><a href="#">4</a></li>
				 	  <li><a href="#">5</a></li>
				 	  <li><a href="#">...</a></li>
				 	  <li><a href="#">Next</a></li>
	                </ul>
	                <div class="clearfix"> </div>
				 </div> 
		  </div>
	   </div>
   </div>
   <div class="clearfix"> </div>
  </div>
</div>


<?php
	include('footer.php');
?>