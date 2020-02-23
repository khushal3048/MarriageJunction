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
                        <li class="active">Approve Success Story</li>
                    </ol>
                </section>

                <!-- Main content -->
              <section class="content">
                    <div class="row"><!-- /.col -->
                    <div class="col-xs-12"><!-- /.box -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Approve Success Story</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"><div id="example1_length" class="dataTables_length"><label><select size="1" name="example1_length" aria-controls="example1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-xs-6"><div class="dataTables_filter" id="example1_filter"><label>Search: <input aria-controls="example1" type="text"></label></div></div></div><table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 151px;" aria-sort="ascending" aria-label="Groom ID: activate to sort column descending">Groom ID</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 202px;" aria-label="Groom Name: activate to sort column ascending">Groom Name</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 131px;" aria-label="Bride ID: activate to sort column ascending">Bride ID</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 183px;" aria-label="Bride Name: activate to sort column ascending">Bride Name</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 137px;" aria-label="Approve: activate to sort column ascending">Approve</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 174px;" aria-label="Unapprove: activate to sort column ascending">Unapprove</th></tr>
                                        </thead>
                                                                              
                                    <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd"><td colspan="6" class="dataTables_empty" valign="top">No data available in table</td></tr></tbody></table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing 0 to 0 of 0 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">? Previous</a></li><li class="next disabled"><a href="#">Next ? </a></li></ul></div></div></div></div>                                    
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div><!-- /.row -->
                    
<!----------------------Approve Active to Paid Dialog --------------------------------------------->


    
<!----------------------dialog End ---------------------------------------------------------------->
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script src="<?php echo base_url();?>asset/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        
