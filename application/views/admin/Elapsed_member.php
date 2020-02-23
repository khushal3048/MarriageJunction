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
                        <li><a href="<?php echo base_url('admin/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row"><!-- /.col -->
                    <div class="col-xs-12">
                     <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Membership Expired Male </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"><div class="dataTables_length" id="example1_length"><label><select aria-controls="example1" size="1" name="example1_length"><option selected="selected" value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-xs-6"><div id="example1_filter" class="dataTables_filter"><label>Search: <input aria-controls="example1" type="text"></label></div></div></div><table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                                        <thead>
                                            <tr role="row"><th aria-label="MatriId: activate to sort column descending" aria-sort="ascending" style="width: 264px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">MatriId</th><th aria-label="Name: activate to sort column ascending" style="width: 292px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Name</th><th aria-label="Reference: activate to sort column ascending" style="width: 290px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Reference</th><th aria-label="View: activate to sort column ascending" style="width: 165px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">View</th></tr>
                                        </thead>
                                        
                                      
                                    <tbody aria-relevant="all" aria-live="polite" role="alert"><tr class="odd">
                                                <td class="  sorting_1">SHI00004</td>
                                                <td class=" ">Teju Kedar</td>
                                                <td class=" "><a href="franchise_edit.php?ID="></a></td>
                                                <td class=" "><a href="profile_view.php?ID=SHI00004">View</a></td>
                                            </tr></tbody></table><div class="row"><div class="col-xs-6"><div id="example1_info" class="dataTables_info">Showing 1 to 1 of 1 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">? Previous</a></li><li class="active"><a href="#">1</a></li><li class="next disabled"><a href="#">Next ? </a></li></ul></div></div></div></div>
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
    