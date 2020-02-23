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
                                    <h3 class="box-title">Block Member</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                  <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
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
                                        <thead>
                                            <tr role="row">
                                              <th aria-label="ProfileID: activate to sort column descending" aria-sort="ascending" style="width: 221px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">ProfileID</th>
                                              <th aria-label="Photo: activate to sort column ascending" style="width: 411px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Photo</th>
                                              <th aria-label="Name: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Name</th>
                                              <th aria-label="Gender: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Gender</th>
                                              <th aria-label="Delete: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php foreach ($block_details as $value) {
                                            //print_r($value);
                                        ?>
                                        <tr>
                                           <td width="5%"><?=$value['profile_id'];?></td>
                                            <td><img src="<?=base_url();?>assets/images/user_profile/<?=$value['file_name'];?>" alt="image" height="30px" ></td>
                                           <td ><?=$value['name'];?></td>  
                                           <td ><?=$value['gender'];?></td>
                                           <td ><button type="submit"align="center" class="btn btn-denger"><a href="<?php echo base_url('admin_operation/blockmember_delete?id=').$value['profile_id'];?>"><i class="fa fa-trash-o"></i></a></button></td>
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
                </section><!-- /.co
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            
           
        </div><!-- ./wrapper -->
		
  <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url();?>asset/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>asset/js/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
		

		
		<script src="<?php echo base_url();?>asset/js/jquery-ui-1.10.3.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/jquery-jvectormap-world-mill-en.js"></script>
		<script src="<?php echo base_url();?>asset/js/daterangepicker.js"></script>
		<script src="<?php echo base_url();?>asset/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url();?>asset/js/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/icheck.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/dashboard.js"></script>
		<script src="<?php echo base_url();?>asset/js/demo.js"></script>
		<script src="<?php echo base_url();?>asset/js/jquery.inputmask.js"></script>
		<script src="<?php echo base_url();?>asset/js/jquery.inputmask.date.extensions.js"></script>
		<script src="<?php echo base_url();?>asset/js/jquery.inputmask.extensions.js"></script>

       <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable()});
      
      
        </script>