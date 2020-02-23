<?php
	include('header.php');
//	print_r($user);
?>


<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo base_url('user/profile');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">New Matches</li>
     </ul>
   </div>
   <div class="col-md-9 profile_left2" id="profile_left2">
   		<?php 
   		foreach($user as $value)
		{     
			//print_r($value);
			$con = $value->country;
			$reg = $value->religion;
			$cr = $this->user_mo->getcr($con,$reg);
					//	print_r($cr);
  		 ?>
      <div class="profile_top">
      	<h2><?=$value->profile_id?> | <?=$value->name?></h2>
	    <div class="col-sm-3 profile_left-top">
	    	 <img src="<?php echo base_url(); ?>assets/images/user_profile/<?=$value->file_name?>" class="img-responsive" alt=""/> 
	    </div>
	    <div class="col-sm-1">
	    	
	    </div>
	    <div class="col-sm-8">
	    	<table class="table_working_hours">
	        	<tbody>
	        		<tr class="opened_1">
						<td class="day_label1">Age / Height :</td>
						<td class="day_value">28, <?=$value->height?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Date Of Birth :</td>
						<td class="day_value"><?=$value->date_of_birth?></td>
					</tr>
					<tr class="closed">
						<td class="day_label1">Education :</td>
						<td class="day_value closed"><span><?=$value->education_field?></span></td>
					</tr>
					<tr class="opened">
						<td class="day_label1">Marital Status :</td>
						<td class="day_value"><?=$value->marital_status?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Religion :</td>
						<td class="day_value"><?=$cr[0]['religion_name']?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Location :</td>
						<td class="day_value"><?=$cr[0]['country_name']?></td>
					</tr>
			    </tbody>
		   </table>
		   <div class="buttons" style="margin-left:100px;">
			   <a href="<?=base_url('user/view_profile/').$value->profile_id;?>"><div class="vertical">View Profile</div></a>
			   <a href="<?=base_url();?>livechat/php/app.php/admin"><div class="vertical">Live Chat</div></a>
		   </div>
	    </div>
	    <div class="clearfix"> </div>
    	</div>
		<?php
		}
		?>
 		<ul class="pagination">
 	 		<li><?php echo $links; ?></li>
		</ul>
  	</div>
  <div class="col-md-3 match_right">
    <ul class="menu">
		<li class="item1"><h3 class="m_2">Marital Status</h3>
		  <ul class="cute" id="mt">
			<li class="subitem1"><label id="nm" data-value="Never Married" style="margin-left:1%;font-size: 13px;font-weight: 500">Never Married</label></li>
			<li class="subitem2"><label id="di" data-value="Devorced" style="margin-left:1%;font-size: 13px;font-weight: 500">	Devorced</label></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Mother Tongue</h3>
		  <ul class="cute">
			<li class="subitem2"><label id="guj" data-value="Gujarati" style="margin-left:1%;font-size: 13px;font-weight: 500">Gujarati</label></li>
			<li class="subitem2"><label id="hin" data-value="Hindi" style="margin-left:1%;font-size: 13px;font-weight: 500">Hindi</label></li>
			<li class="subitem2"><label id="eng" data-value="English" style="margin-left:1%;font-size: 13px;font-weight: 500">English</label></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Education</h3>
		  <ul class="cute">
			<li class="subitem2"><label id="mas" data-value="Master" style="margin-left:1%;font-size: 13px;font-weight: 500">Master</label></li>
			<li class="subitem2"><label id="bac" data-value="Bachelors" style="margin-left:1%;font-size: 13px;font-weight: 500">Bachelors</label></li>
			<li class="subitem2"><label id="doc" data-value="Doctorate" style="margin-left:1%;font-size: 13px;font-weight: 500">Doctorate</label></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Country</h3>
		  <ul class="cute">
			<li class="subitem2"><label id="in" data-value="india" style="margin-left:1%;font-size: 13px;font-weight: 500">India</label></li>
			<li class="subitem2"><label id="us" data-value="U.S." style="margin-left:1%;font-size: 13px;font-weight: 500">U.S.</label></li>
			<li class="subitem2"><label id="uk" data-value="U.K." style="margin-left:1%;font-size: 13px;font-weight: 500">U.K.</label></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Religion</h3>
		  <ul class="cute">
			<li class="subitem2"><label id="hi" data-value="Hindu" style="margin-left:1%;font-size: 13px;font-weight: 500">Hindu</label></li>
			<li class="subitem2"><label id="sikh" data-value="sikh" style="margin-left:1%;font-size: 13px;font-weight: 500">Sikh</label></li>
			<li class="subitem2"><label id="jain" data-value="jain" style="margin-left:1%;font-size: 13px;font-weight: 500">Jain</label></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Physical Status</h3>
		  <ul class="cute">
			<li class="subitem2"><label id="nor" data-value="0" style="margin-left:1%;font-size: 13px;font-weight: 500">Normal</label></li>
			<li class="subitem2"><label id="abn" data-value="1" style="margin-left:1%;font-size: 13px;font-weight: 500">Abnormal</label></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Eating Habits</h3>
		  <ul class="cute">
			<li class="subitem2"><label id="veg" data-value="Veg" style="margin-left:1%;font-size: 13px;font-weight: 500">Veg</label></li>
			<li class="subitem2"><label id="nonveg" data-value="Non-Veg" style="margin-left:1%;font-size: 13px;font-weight: 500">Non-Veg</label></li>
			<li class="subitem2"><label id="egg" data-value="Eggetarian" style="margin-left:1%;font-size: 13px;font-weight: 500">Eggetarian</label></li>
		  </ul>
		</li>	
	  </ul>
   </div>
   <div class="clearfix"> </div>
  </div>
</div>
<?php
	include('footer.php');
?>
<script>
	/*	$("#nm").on("click",function() {
			var list="";

			var id=$(this).attr('data-value');
			$("#di").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#nm").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/user_operation/statuswise',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					$("#profile_left2").html("");
					$("#profile_left2").html(data);
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#di").on("click",function() {
			var list="";

			var id=$(this).attr('data-value');
			//alert(id);
			$("#nm").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#di").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/user_operation/statuswisedi',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					$("#profile_left2").html("");
					$("#profile_left2").html(data);
				},
				error:function()
				{
					console.log();
				}
			});
		});	
		$("#guj").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#guj").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/user_operation/mtwiseguj',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					$("#profile_left2").html("");
					$("#profile_left2").html(data);
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#hin").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#hin").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/user_operation/mtwisehin',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					$("#profile_left2").html("");
					$("#profile_left2").html(data);
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#eng").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#eng").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/user_operation/mtwiseeng',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					$("#profile_left2").html("");
					$("#profile_left2").html(data);
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#mas").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#mas").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/user_operation/eduwisemas',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					$("#profile_left2").html("");
					$("#profile_left2").html(data);
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#bac").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#bac").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/user_operation/eduwisebac',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					$("#profile_left2").html("");
					$("#profile_left2").html(data);
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#doc").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/user_operation/eduwisedoc',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					$("#profile_left2").html("");
					$("#profile_left2").html(data);
				},
				error:function()
				{
					console.log();
				}
			});
		});
		*/
</script>