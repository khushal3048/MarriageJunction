<?php 
	include_once('admin_header.php');
?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Admin Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row"><!-- /.col -->
                    <div class="col-xs-12">
                     <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">registered member</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
									<table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                                        <thead>
                                            <tr role="row">
												<th aria-label="ProfileID: activate to sort column descending" aria-sort="ascending" style="width: 221px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">ProfileID</th>
												<th aria-label="Name: activate to sort column ascending" style="width: 411px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Name</th>
												<th aria-label="Email: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Email</th>
                                                <th aria-label="Gender: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Gender</th>
                                                <th aria-label="Country: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Country</th>
												<th aria-label="Status: activate to sort column ascending" style="width: 137px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Status</th>
											    <th aria-label="See: activate to sort column ascending" style="width: 137px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">See More</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                      
                                    <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php foreach ($regi_details as $value) {
                                            # code...
                                        ?>
											<tr class="odd">
                                                <td class="  sorting_1"><?=$value['profile_id'];?></td>
                                                <td class=" "><?=$value['name'];?></td>
                                                <td class=" "><?=$value['user_name'];?></td>
                                                <td class=" "><?=$value['gender'];?></td>
                                                <td class=" "><?=$value['c_name'];?></td>
                                                
                                            <?php if ($value['status']=='active'){?>
                                                <td><button type="submit"><a href="<?php echo base_url() ?>/admin_operation/userblock/<?php echo $value['profile_id']?>">Block</a></button></td> <?php } else {?>
                                                <td><button type="submit"  ><a href="<?php echo base_url() ?>/admin_operation/useractive/<?php echo $value['profile_id']?>">Active</a></button></td><?php }?>
                                        <!--<td align="center" class="btn btn-denger"><a href="<?php //echo base_url('admin_operation/delete_membership_plan?id=').$value['plan_id'];?>"><i class="fa fa-trash-o"></i></a>delete</td>-->
                                                <td><button type="button"><a href="<?php echo base_url();?>/admin_operation/full_details/<?php echo $value['profile_id']?>">See more</a></button>                                            
                                            </tr>
                                        <?php } ?>
										</tbody>
									</table>
									</div>
                                </div><!-- /.box-body -->
                            </div>
                      <!-- /.box -->
                        </div>
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

       
        <!-- DATA TABES SCRIPT -->
       <script src="<?php echo base_url();?>asset/js/jquery.dataTables.js" type="text/javascript"></script>//searches
        <script src="<?php echo base_url();?>asset/js/dataTables.bootstrap.js" type="text/javascript"></script>//pagination
        <!-- AdminLTE App -->
        
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable()});
			
			
        </script>
    