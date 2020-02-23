<?php 
	include_once('admin_header.php'); 
?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Membership Plan                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('admin/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
				 
                <section class="content" id="data"><div class="box"><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
									
									<?php 
									if($this->session->flashdata('success'))
									{
							?>
										<caption><?php echo  $this->session->flashdata('success'); ?></caption>		
							<?php
									}
									elseif($this->session->flashdata('error'))
									{
							?>
										<caption><?php echo  $this->session->flashdata('error'); ?></caption>
							<?php
									}		
							?>
							
                                       
										
										
                                    <form action="<?php echo base_url('admin_operation/add_plan');?>" method="post">   
                                      <tr>
                                        <td>&nbsp;</td>
                                            <td><input type="text" name="plan_name" class="form-control" id="addplan" placeholder="Plan Name" requied="requied"></td>
                                            <td><input type="text" name="plan_display_name" class="form-control" id="adddisplay" placeholder="Plan Display Name" requied="requied"></td>
                                            <td><input type="text" name="plan_details"  class="form-control" id="plandetail" placeholder="Plan Details" requied="requied"></td>
                                            <td><input type="text" name="no_of_contacts"  class="form-control" id="addcontacts" placeholder="No Of Contacts" requied="requied"></td>
                                            <td><input type="text" name="plan_duration"  class="form-control" id="addduration" placeholder="Plan Duration" requied="requied"></td>
                                            <td><input type="text" name="plan_amount"  class="form-control" id="addamount" placeholder="Plan Amount" requied="requied"></td>
                                            
                                            <td colspan="2"><button type="submit" class="btn btn-primary" >Add Plan</button></td>
											
                                        </tr>
										</form>
										 <tbody>
										 <tr>
                                            <th>Id</th>
                                            <th>Plan Name</th>
                                            <th>Plan Display Name</th>
                                            <th>Plan Details</th>
                                            <th>No of Contacts</th>
                                            <th>Plan Duration</th>
                                            <th>Plan Amount</th>
                                            <th>Edit</th>
											<th>Status</th>
                                            <th>delete</th>
                           				 </tr>
										
										<?php  foreach($membership_plan as $value ) {?>
							<tr>
										<td align="center"><?=$value['plan_id'];?></td>
										<td align="center"><?=$value['plan_name'];?></td>
										<td align="center"><?=$value['plan_display_name'];?></td>
										<td align="center"><?=$value['plan_details'];?></td>
										<td align="center"><?=$value['no_of_contacts'];?></td>
										<td align="center"><?=$value['plan_duration'];?></td>
										<td align="center"><?=$value['plan_amount'];?></td>
										<td><button type="submit">Edit</button></td>
										<?php if ($value['status']=='active'){?>
										<td><button type="submit"><a href="<?php echo base_url() ?>/admin_operation/planblock/<?php echo $value['plan_id']?>">Block</a></button></td> <?php } else {?>
										<td><button type="submit"  ><a href="<?php echo base_url() ?>/admin_operation/planactive/<?php echo $value['plan_id']?>">Active</a></button></td><?php }?>
										<td ><button type="submit"align="center" class="btn btn-denger" ><a href="<?php echo base_url('admin_operation/delete_membership_plan?id=').$value['plan_id'];?>"><i class="fa fa-trash-o"></i></a></button></td>
        					</tr>
        					
						<?php } ?>

                                      </tbody></table>
                                </div><!-- /.box-body -->
                            </div></section>
							
							<!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <!-- Bootstrap -->
        <!-- DATA TABES SCRIPT -->
      
        <!-- Bootstrap -->
        
        <!-- DATA TABES SCRIPT -->
        
        
        