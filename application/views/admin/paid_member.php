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
                                    <h3 class="box-title">Paid Member</h3>
                                </div><!-- /.box-header -->
                                 <div class="box-body table-responsive">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                        <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                                        <thead>
                                            <tr role="row">
												<th aria-label="MatriId: activate to sort column descending" aria-sort="ascending" style="width: 221px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">MatriId</th>
												<th aria-label="Name: activate to sort column ascending" style="width: 411px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Name</th>
												<th aria-label="Reference: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Reference</th>
												<th aria-label="View: activate to sort column ascending" style="width: 137px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">View</th>
											</tr>
                                        </thead>
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
            $(function() {
                $('#example1').dataTable()});
			
			
        </script>
    