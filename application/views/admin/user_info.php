<?php
    include_once('admin_header.php');
?>
    
        
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Admin Dashboard
                        <small>Control panel</small>                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('admin/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                               
                <section class="content">
                
                 <h3 align="center">Basic Information</h3>
                  <form action="" method="post" name="user">
                    <table width="102%" border="0" align="center" class="table-responsive">
                      
                    <br>
                    <?php foreach ($user_registration as $value) {
                                            # code...
                                        ?>
                    <div class="col-md-12">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">ProfileID : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['profile_id'];?>
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Email : </lable>
                        </div>
                        
                          <div class="col-md-3">
                             <?=$value['user_name'];?>
                        </div>
                    </div>
                </div>
                     <br>
                      <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Name : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['name'];?>
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Gender : </lable>
                        </div>
                        
                          <div class="col-md-3">
                             <?=$value['gender'];?>
                        </div>
                    </div>
                </div>
                     
                           <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Profile for : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['create_profile_for'];?>
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Birth date : </lable>
                        </div>
                        
                          <div class="col-md-3">
                              <?=$value['date_of_birth'];?>
                        </div>
                    </div>
                </div>
                     
                           <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Religion : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['religion'];?>
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Country : </lable>
                        </div>
                        
                          <div class="col-md-3">
                             india
                        </div>
                    </div>
                </div>
                     
                           <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Mother tongue : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['mother_tongue'];?>
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left"></lable>
                        </div>
                        
                          
                    </div>
                </div>
                     
                  <?php } ?>

                    </table>
                  
                  
                  
                  
				 </form>
                                                 
          <h4 align="center"></h4>
                  <form action="#" method="post" name="user">
                    <table width="102%" border="0" align="center" class="table-responsive">
                      
                    <br>
                    <?php foreach ($user_basic_info as $value) { ?>
                    <div class="col-md-12">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">State : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['state'];?>
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">City : </lable>
                        </div>
                        
                          <div class="col-md-3">
                             <?=$value['city'];?>
                        </div>
                    </div>
                </div>
                     <br>
                      <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Marital status : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['marital_status'];?>
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">No_Of_Child</lable>
                        </div>
                        
                          <div class="col-md-3">
                             <?=$value['no_of_child'];?>
                        </div>
                    </div>
                </div>
                     
                           <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Community : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['community'];?>
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Sub community: </lable>
                        </div>
                        
                          <div class="col-md-3">
                             <?=$value['sub-community'];?>
                        </div>
                    </div>
                </div>
                     
                          
                </div>
                     
                <?php } ?>

                    </table>
                  
                  
                  
                  
         </form>

         <h3 align="center" style="padding-top:4%">Education Information</h3>
                  <form action="#" method="post" name="user">
                    <table width="102%" border="0" align="center" class="table-responsive">
                      
                    <br>
                    <?php foreach ($user_education_info as $value) { ?>
                    <div class="col-md-12">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Education level:</lable>
                          </div>
                          
                          <div class="col-md-3">
                           <?=$value['education_level'];?> 
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Education field :</lable>
                        </div>
                        
                          <div class="col-md-3">
                             <?=$value['education_field'];?> 
                        </div>
                    </div>
                </div>
                     <br>
                      <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Employee in :</lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['employee_in'];?> 
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Post :</lable>
                        </div>
                        
                          <div class="col-md-3">
                             <?=$value['post'];?> 
                        </div>
                    </div>
                </div>
                     
                           <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Annual income :</lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['annual_income'];?> 
                          </div>
                    </div>
                    
                </div>
                     
                <?php } ?>

                    </table>
                  
                  
                  
                  
         </form>

         <h3 align="center" style="padding-top:4%">Life Style Information</h3>
                  <form action="#" method="post" name="user">
                    <table width="102%" border="0" align="center" class="table-responsive">
                      
                    <br>
                    <?php foreach ($user_lifestyle as $value) { ?>
                  <div class="col-md-12" style="padding-top:5px;">
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Diet : </lable>
                          </div>
                          <div class="col-md-3">
                            <?=$value['diet'];?> 
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Smoke : </lable>
                          </div>
                          <div class="col-md-3">
                             <?=$value['smoke'];?> 
                        </div>
                    </div>
                </div>
                     <br>
                 <div class="col-md-12" style="padding-top:5px;">
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Drink : </lable>
                          </div>
                          <div class="col-md-3">
                            <?=$value['drink'];?> 
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Height : </lable>
                          </div>
                          <div class="col-md-3">
                             <?=$value['height'];?> 
                        </div>
                    </div>
                </div>
                     
                           <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Body type : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['body_type'];?> 
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Body tone : </lable>
                        </div>
                        
                          <div class="col-md-3">
                             <?=$value['body_tone'];?> 
                        </div>
                    </div>
                </div>
                     
                           <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">mobile : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['mobile'];?> 
                          </div>
                    </div>
                   </div>
                  </div>
                <?php } ?>
            </table>
        </form>
        
        <h3 align="center" style="padding-top:4%">Family Detail</h3>
                  <form action="#" method="post" name="user">
                    <table width="102%" border="0" align="center" class="table-responsive">
                      
                    <br>
                    <?php foreach ($family_details as $value) { ?>
                  <div class="col-md-12" style="padding-top:5px;">
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Father Status : </lable>
                          </div>
                          <div class="col-md-3">
                            <?=$value['father_status'];?> 
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Mother Status : </lable>
                          </div>
                          <div class="col-md-3">
                             <?=$value['mother_status'];?> 
                        </div>
                    </div>
                </div>
                     <br>
                 <div class="col-md-12" style="padding-top:5px;">
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">No Of brother : </lable>
                          </div>
                          <div class="col-md-3">
                            <?=$value['no_of_brothers'];?> 
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">No Of Merried Brother : </lable>
                          </div>
                          <div class="col-md-3">
                             <?=$value['no_of_merried_brother'];?> 
                        </div>
                    </div>
                </div>
                     
                           <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">No Of Sister : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['no_of_sister'];?> 
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">No Of Merried Sister : </lable>
                        </div>
                        
                          <div class="col-md-3">
                             <?=$value['no_of_merried_sister'];?> 
                        </div>
                    </div>
                </div>
                     
                           <div class="col-md-12" style="padding-top:5px;">

                    <div class="col-md-6">
                          <div class="col-md-3">
                            <lable aling="left">Affluence level : </lable>
                          </div>
                          
                          <div class="col-md-3">
                            <?=$value['affluence_level'];?> 
                          </div>
                    </div>
                   </div>
                  </div>
                <?php } ?>
            </table>
        </form>  
 </section></aside></div>        
 

                                    
                        
             
                                   

                                <!-- /.tab-content -->
                            <!-- /.nav-tabs-custom -->
                        <!-- /.col -->
                        
                <!-- /.content -->
            <!-- /.right-side -->
       <!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
                       

                   <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
      
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
	
    
</body></html>