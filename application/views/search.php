<?php
	include('header.php');
	
//	print_r($country);
?>

<script type="text/javascript">
  
  $(document).ready(function(){

      $("#country").on("change",function(){
        $("#divstate").css("display","block");
        var c_id = $(this).val(),
        state= {};
        state="<option value='-1'>Any</option>";
        $.ajax({
          type:'POST',
          url:'http://localhost/marriagejunction/admin_operation/getState',
          dataType:'json',
          data:{c_id:c_id},
          success: function(data){
            $.each(data,function(i,state_id,state_name){
            state += "<option value="+data[i].state_id+">"+data[i].state_name+"</option>";
            });
            $("#state").html(state);
          },
          error: function(textStatus){
          }
        });
      });
      
      $("#state").on("change",function(){
        $("#divcity").css("display","block");
            var s_id = $(this).val(),
            city = {};
            city = "<option value='-1'>Any</option>"; 
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
              },
              error: function(textStatus){
              }
             });
      });

      $("#reli").on("change",function(){
        $("#divcaste").css("display","block");
        var c_id = $(this).val(),
        caste= {};
        caste="<option value='-1'>Any</option>";
        $.ajax({
          type:'POST',
          url:'http://localhost/marriagejunction/admin_operation/getCaste',
          dataType:'json',
          data:{c_id:c_id},
          success: function(data){
            $.each(data,function(i,caste_id,caste_name){
            caste += "<option value="+data[i].caste_id+">"+data[i].caste_name+"</option>";
            });
            $("#Caste").html(caste);
          },
          error: function(textStatus){
          }
        });
      });

      $("#Caste").on("change",function(){
        $("#divsubcaste").css("display","block");
            var c_id = $(this).val(),
            subcaste = {};
            subcaste = "<option value='-1'>Any</option>"; 
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
                $("#subcaste").html(subcaste);                 
              },
              error: function(textStatus){
              }
             });
      });

      $("#frm").on("submit",function(){
        var data = {};
         data['ms'] = $("#ms").val();
         data['country'] = $("#country").val();
         data['state'] = $("#state").val();
         data['city'] = $("#city").val();
         data['reli'] = $("#reli").val();
         data['Caste'] = $("#Caste").val();
         data['subcaste'] = $("#subcaste").val();
         data['edu'] = $("#edu").val();
         data['mt'] = $("#mt").val();
         data['from'] = $("#from").val();  
         data['to'] = $("#to").val();
         // alert(data['ms']);
         $.ajax({
              type:'POST',
              url:'http://localhost/marriagejunction/user_operation/getsearch',
              dataType:'html',
              data:data,
              success: function(data){
                  $("#search_result").html(data);
              },
              error: function(textStatus){
              }
             });
      });

  });
</script>
<div class="grid_3" id="search_result">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo base_url('user/profile');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Regular Search</li>
     </ul>
   </div>
<div class="col-md-9 search_left">
  <form method="POST" id="frm" action="<?=base_url('user');?>">	
  <div class="form_but1">
	<label class="col-sm-5 control-lable1" for="sex">Marital Status : </label>
	<div class="col-sm-7 form_radios">
   <div class="select-block1">
    <select id="ms">
      <option value="-1">Any</option>
      <option value="Never Married">Never Married</option>
      <option value="Divorced">Divorced</option>
      <option value="Widowed">Widowed</option>
      <option value="Annulled">Annulled</option>
    </select>
    </div>
	</div>
	<div class="clearfix"> </div>
  </div>
  <div class="form_but1" id="divcountry">
    <label class="col-sm-5 control-lable1" for="sex">Country : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select id="country">
            	<option value="-1">Any</option>
        	<?php 
				foreach($country as $value)
				{
			?>
		    	<option value="<?=$value['country_id']?>"><?=$value['country_name']?></option>
			<?php
				}
			?>
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1" style="display: none;" id="divstate">
    <label class="col-sm-5 control-lable1" for="sex">State : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select id="state">
          
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1" style="display: none;" id="divcity">
    <label class="col-sm-5 control-lable1" for="sex">City : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select id="city">
          
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Religion : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1" >
        <select id="reli">
            <option value="-1">Any</option>
            <?php 
        foreach($religion as $value)
        {
      ?>
          <option value="<?=$value['religion_id']?>"><?=$value['religion_name']?></option>
      <?php
        }
      ?>
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1" style="display:none;" id="divcaste">
    <label class="col-sm-5 control-lable1" for="sex">Caste : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select id="Caste">
            
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
	<div class="form_but1" style="display:none;" id="divsubcaste">
    	<label class="col-sm-5 control-lable1" for="sex">Sub-Caste : </label>
    	<div class="col-sm-7 form_radios">
     	 <div class="select-block1">
      	  <select id="subcaste">
       	     
      	  </select>
      	</div>
    </div>
    <div class="clearfix"> </div>
  </div>

  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Mother Tongue : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select id="mt">
            <option value="-1">Any</option>
            <option value="">English</option>
            <option value="">French</option>
            <option value="">Telugu</option>
            <option value="">Bengali</option>
            <option value="">Bihari</option>
            <option value="">Hindi</option> 
            <option value="">Koshali</option> 
            <option value="">Khasi</option> 
            <option value="">Tamil</option> 
            <option value="">Urdu</option> 
            <option value="">Manipuri</option> 
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
	<label class="col-sm-5 control-lable1" for="sex">Education : </label>
	<div class="col-sm-7 form_radios">
		<div class="select-block1">
      <select id="edu">
        <option value="-1">Any</option>
        <option value="Bachelors">Bachelors</option>  
        <option value="Master">Master</option>
        <option value="Doctorate">Doctorate</option>
        <option value="Honours Degree">Honours Degree</option>        
        <option value="Diploma">Diploma</option>    
      </select>
    </div>
	</div>
	<div class="clearfix"> </div>
  </div>
  <div class="form_but1">
	<label class="col-sm-5 control-lable1" for="sex">Age : </label>
	<div class="col-sm-7 form_radios">
	  <div class="col-sm-5 input-group1">
        <select class="form-control has-dark-background" id="from">
          <option value="-1">From</option>
            <?php
             for($i=18; $i<=40; $i++)
             { 
            ?>
              <option value="<?=$i?>"><?=$i?></option>
             <?php
             }
             ?>
        </select>
      </div>
      <div class="col-sm-5 input-group1">
        <select class="form-control has-dark-background" id="to">
           <option value="-1">To</option>
          <?php
             for($i=19; $i<=40; $i++)
             { 
            ?>
              <option value="<?=$i?>"><?=$i?></option>
             <?php
             }
             ?>
        </select>
      </div>
      <div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
  </div>
  <div align="right" class="col-sm-offset-3 col-sm-5 input-group1">
    <input type="submit" value="Find Matches" id="regsearch" name="regsearch">
  </div>
  <div class="col-md-12"></div>
 </form>
 <div class="col-md-12"></div>
</div>
<div class="col-md-3 match_right" >
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
<div style="margin-top: 50px;">
  <p><input type="text" name="" style="border-color: transparent;"></p>
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