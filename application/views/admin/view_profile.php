

<script src="<?php echo base_url();?>asset/js/jquery-1.11.1.min.js"></script>

<script language="JavaScript" type="text/javascript">

$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are You Really Want To Delete This Profile?.... Click OK To Confirm?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
<style>

vruda1
{
	  color:#090;
      background: #E5E55E;
      font-size: 3em;
      text-decoration: none;
 
  
}
 
  </style>

<?php 
    include_once('admin_header.php');
?>
  <!-- Right side column. Contains the navbar and content of the page -->
  
  <aside class="right-side"> 
    <!-- Content Header (Page header) -->
        <section class="content-header">
    
      <h1> Profile Details <small></small>
        <?php foreach ($user_registration as $value) { ?>
        <button class="btn btn-warning btn-sm"><i class="fa fa-user"></i> Status : <?=$value['status'];?></button>
 <?php } ?>
        
        
 <div class="btn-group">
       

      
        </div>   
        
        
       
               <div class="btn-group">
  
          
        </div></h1>
      
      <!--  popup start
        -->
        
 
        <!--<a  href="#myModal10" data-toggle="modal" >
        
                    <button class="btn btn-default pull-right"><i class="fa fa-pencil"></i>  Edit</button></a> </td>-->
                    
        
        <div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="">
    <div class="modal-content " id="dialog_content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="fa fa-times"></i> </button>
   <h4 class="modal-title" align="center" style="font-size:24px">Activity Log</h4>
      </div>
      <div class="modal-body">
      <p>
       <!--<u> Daily Status Log</u>
-->        </p><table class="table table-responsive" id="smart" style="border:thin" border="1">
                  <tbody>
                    <tr>
                                          <!--<td width="25%">Daily Status Log</td>-->
         <td width="168" style="font-size:16px;" bgcolor="#dbeffc">Last Login Details</td>
                      
            <td colspan="3" style="color:#090">6 hours
23 minutes
23 Seconds
<div class=""></div></td>

    <td width="747" align="left" style="font-size:16px;">Mail Details</td></tr>
    
 
                 <tr>    
    <td width="168" style="font-size:16px;" bgcolor="#E5E5E5" height="23" align="left">Name:</td>
    <td width="157" style="color:#090" align="left">Janu Amrutatti</td>
        
    <td width="161" align="left" bgcolor="#E5E5E5" style="font-size:16px;">Basic:</td>
    <td width="106" align="left" style="color:#090"><i class="fa fa-times"></i></td>
    <td width="747" rowspan="11" align="left" style="color:#090" class="pre-scrollable">
    
    
    
    
    <table width="681" height="110" border="1" align="center" cellpadding="1" cellspacing="1" style="border:thin;">
      <tbody><tr>
        <td width="66" height="38" style="font-size:16px;" bgcolor="#dbeffc">Type</td>
        <td width="92" height="38" style="font-size:16px;" bgcolor="#dbeffc">Date</td>
        <td width="150" height="38" style="font-size:16px;" bgcolor="#dbeffc">Subject</td>
        <td width="192" style="font-size:16px;" bgcolor="#dbeffc">Message</td>
       <!-- <td width="103"  height="38" style="font-size:16px;" bgcolor="#dbeffc">&nbsp;</td>-->
      </    tr>
            <tr>
        <td>Group</td>
        <td>2017-03-30</td>
        <td>dfg</td>
        <td><a href="view_mail_history.php">...View Message </a>
		</td>
        <!--<td>&nbsp;</td>-->
      </tr>
           <!-- <tr>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>-->
    </tbody></table></td></tr>
    
   
    
     
    
     
                         
                        
        
        
        
        
       </tbody></table><p></p>
       
       
       
       
     <!-- LOG POPUP END HERE-->
  
    </div></div></div></div></section>
    
    
    <!-- Main content -->
   
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
           <h3 class="box-title">Basic Information</h3>
             </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                
                <tbody>
                 <?php foreach ($user_registration as $value) {

                  ?>   
                  <tr>
                    <td>ProfileID</td>
                   <td><?=$value['profile_id'];?></td>
                  </tr>
                  <tr>
                <td>Email</td>
                <td><?=$value['user_name'];?></td>
                </tr>
                  
                  <tr>
                  </tr><tr>
                    <td>Name</td>
                    <td><?=$value['name'];?></td>
                  </tr>
                   <tr>
                    <td>Gender</td>
                    <td><?=$value['gender'];?></td>
                  </tr>
                  <tr>
                    <td>Create Profile For </td>
                    <td><?=$value['create_profile_for'];?></td>
                  </tr>
                 <tr>
                    <td>Date Of Birth</td>
                    <td><?=$value['date_of_birth'];?></td>
                  </tr>
               <tr> <td>Mother Tongue</td>
                    <td><?=$value['mother_tongue'];?></td>
                  </tr>
                  <tr>
                    <td>Religion</td>
                    <td><?=$value['r_name'];?></td>
                  </tr>
                   <tr>
                    <td bgcolor="#dbeffc">Country</td>
                    <td><?=$value['c_name'];?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body --> 
            
          </div>
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body padding">
              <table class="table table-bordered">
                <tbody>
                    <?php foreach ($user_basic_info as $value) { ?>
                  <tr>
                    <td>State</td>
                    <td><?=$value['state_name'];?></td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td><?=$value['city_name'];?></td>
                  </tr>
                 
                
                  <tr>
                    <td>Marital Status</td>
                    <td><?=$value['marital_status'];?></td>
                  </tr>
                  <tr>
                    <td>No Of Child</td>
                    <td><?=$value['no_of_child'];?></td>
                  </tr>
                  <tr>
                    <td>Community</td>
                    <td><?=$value['community_name'];?></td>
                  </tr>
                 
                  <?php } ?>
                 
                </tbody>
              </table>
            </div>
            <!-- /.box-body --> 
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Education Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body padding">
              <table class="table table-bordered">
                <tbody>
                    <?php foreach ($user_education_info as $value) { ?>
                  <tr>
                    <td>Education Level</td>
                    
                    <td><?=$value['education_level'];?></td>
                  </tr>
                  <tr>
                    <td>Education Field</td>
                    
                    <td><?=$value['education_field'];?></td>
                  </tr>
                 
                
                  <tr>
                    <td>Employed In</td>
                    <td><?=$value['employee_in'];?></td>
                  </tr>
                  <tr>
                    <td>Post</td>
                    <td><?=$value['post'];?></td>
                  </tr>
                   <tr>
                    <td>Annual Income </td>
                    <td><?=$value['annual_income'];?></td>
                  </tr>
                  
                  
                 <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body --> 
          </div>
          <!-- /.box -->
          
                   
          
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
                         <h3 class="box-title">Profile</h3>
              
           </div>
            <!-- /.box-header -->
            <div class="box-body padding">
		      <?php
            foreach ($user_photo as $value) {
            //  print_r($value);
            
          ?>
         <center><img src="<?=base_url();?>assets/images/user_profile/<?=$value['file_name'];?>" border="0"></center>
            <?php } ?>
            </div>
            <!-- /.box-body --> 
          </div>
          
          
          
          
        </div>
        <!-- /.col -->
        
        
        
        
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Family Details </h3>
             </div>
             <!-- /.box-header -->
            <div class="box-body padding">
              <table class="table table-bordered">
                <tbody>
                    <?php foreach ($family_details as $value) { ?>
                 <tr>
                    <td>Father Status</td>
                    <td><?=$value['father_status'];?></td>
                  </tr>
                   <tr>
                    <td>Mother Status </td>
                    <td><?=$value['mother_status'];?></td>
                  </tr>
                  <tr>
                    <td>No Of Brother</td>
                    <td><?=$value['no_of_brothers'];?> </td>
                  </tr>
                    
                  <tr>
                    <td>No Of Married Brother</td>
                   <td> <?=$value['no_of_merried_brother'];?></td>
                  </tr>
                 
                   <tr>
                    <td>No Of Sister </td>
                    <td><?=$value['no_of_sister'];?></td>
                  </tr>
                  <tr>
                    <td>No Of Married Sister </td>
                   <td> <?=$value['no_of_merried_sister'];?></td>
                  </tr>
                   <tr>
                    <td>Affluence level</td>
                    <td><?=$value['affluence_level'];?>   </td>
                  </tr>
                 
                 
                  <?php } ?>
                  
                </tbody>
              </table>
            </div>
            <!-- /.box-body --> 
          </div>
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lifestyle Details</h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body padding">
              <table class="table table-bordered">
                <tbody>
                    <?php foreach ($user_lifestyle as $value) { ?>
                <tr>
                    <td>Diet </td>
                    <td><?=$value['diet'];?></td>
                  </tr>
                  <tr>
                    <td>Smoke </td>
                    <td><?=$value['smoke'];?> </td>
                  </tr>
                   <tr>
                    <td> Drink </td>
                    <td><?=$value['drink'];?></td>
                  </tr>
                  <tr>
                    <td>Height</td>
                    <td><?=$value['height'];?></td>
                  </tr>
                  <tr>
                    <td>Body type </td>
                    <td><?=$value['body_type'];?></td>
                  </tr>
                  <tr>
                    <td> Body tone </td>
                    <td> <?=$value['body_tone'];?> <?=$value['mobile'];?></td>
                  </tr>
                  <tr>
                    <td> Mobile </td>
                    <td><?=$value['mobile'];?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div> <!-- /.box -->
          
          
          
        </div>
        <!-- /.col --> 
      </div>
      
      <!-- BASIC INFO MODAL -->
      
   
        
<!--   - - - -START  Delete/Remove  Memeber -- - - - - -->
<div class="modal fade" id="Delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="delete_dialog">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"><i class="fa fa-fw fa-info-circle"></i> Delete Member Confirmation

</h4>
                    </div>
                    <form action="#" method="post">
                        <div class="modal-body">
                         <input type="hidden" name="id" value="SHI00012">
                          <p class="text-red">Are you  sure to delete member?</p>

                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>

                            <button type="button" class="btn btn-primary pull-left" onclick="delete_member('SHI00012')"> Yes</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        
        
        <!--   - - - -END Delete/Remove  Memeber -- - - - - -->
      </section>
    <!-- /.content -->
      </aside>
  <!-- /.right-side --> 
</div>
<!-- ./wrapper --> 





      
       

</body></html>