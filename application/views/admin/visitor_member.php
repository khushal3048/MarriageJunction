<?php
	 include_once('admin_header.php');
?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Admin Dashboard
                         
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('admin/home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row"><!-- /.col -->
                    <div class="col-xs-12">
                     <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Total visitor</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                   <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                                        <thead>
                                             <tr role="row">
                                                <th aria-label="visitorID: activate to sort column descending" aria-sort="ascending" style="width: 221px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">visitorID</th>
                                                <th aria-label="IP: activate to sort column ascending" style="width: 411px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">IP</th>
                                                <th aria-label="OS: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">OS</th>
                                                <th aria-label="Browser: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Browser</th>
                                                <th aria-label="Date: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Date</th>
                                                <th aria-label="Time: activate to sort column ascending" style="width: 137px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Time</th>
                                                <th aria-label="Country: activate to sort column descending" aria-sort="ascending" style="width: 221px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">Country</th>
                                                <th aria-label="State: activate to sort column ascending" style="width: 411px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">State</th>
                                                <th aria-label="City: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">city</th>
                                                <th aria-label="Zipcode: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Zip</th>
                                                <th aria-label="Latitude: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Latitude</th>
                                                <th aria-label="Longitude: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Longitude</th>
                                                <th aria-label="Action: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">action</th>
                                             </tr>  
                                        </thead>
                                        
                                      
                                       <tbody aria-relevant="all" aria-live="polite" role="alert">
                                            <?php foreach($visitor as $value){?>
                                            <tr>
                                                <td class="center"><?php echo $value['visitor_id'];?></td>
                                                <td class="center"><?php echo $value['ip_address'];?></td>
                                                <td class="center"><?php echo $value['os'];?></td>
                                                <td class="center"><?php echo $value['browser'];?></td>
                                                <td class="center"><?php echo $value['date'];?></td>
                                                <td class="center"><?php echo $value['time'];?></td>
                                                <td class="center"><?php echo $value['country'];?></td>
                                                <td class="center"><?php echo $value['state'];?></td>
                                                <td class="center"><?php echo $value['city'];?></td>
                                                <td class="center"><?php echo $value['zipcode'];?></td>
                                                <td class="center"><?php echo $value['latitude'];?></td>
                                                <td class="center"><?php echo $value['longitude'];?></td>
                                                <td class="center">
                                        		  <a class="btn btn-danger" onclick="return confirm('ARE YOU SURE WANT TO DELETE THIS VISITOR?')" href="<?=base_url();?>admin_operation/deletevisitor/<?= $value['visitor_id'];?>"></i>delete
                                        		  </a>
                                                </td>
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
        <script src="<?php echo base_url();?>asset/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        
        <!-- page script -->
        <script type="text/javascript">
            	$(function() 
				{
                	$('#example1').dataTable()
				});
        </script>
    