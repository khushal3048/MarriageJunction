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
                                    <h3 class="box-title">Religion </h3>
                                </div><!-- /.box-header -->
                                <tr>
            <td>
                <form name="religion" id="religion" method="post" action="<?php echo base_url('admin_operation/add_religion');?>"> 
                    <table width="50%" border="0" align="center" cellpadding="3" cellspacing="3" class="blackbox">
                        <?php 
                            if($this->session->flashdata('success'))
                            {                       
                        ?>
                            <caption> <?php echo $this->session->flashdata('success')?></caption>
                        <?php 
                            }
                            elseif($this->session->flashdata('error'))
                            {
                        ?>
                            <caption> <?php echo $this->session->flashdata('error')?></caption>
                        <?php 
                            }
                         ?>
                        <tbody>
                            <tr>
                                <td width="40%">Enter Religion: </td>
                                <td width="60%"><input name="religion_name" type="text" id="name" required="required"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="submit" value="Add"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </td>
        </tr>
                                <div class="box-body table-responsive">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
									<table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                                        <thead>
                                            <tr role="row">
												<th aria-label="ReligionID: activate to sort column descending" aria-sort="ascending" style="width: 221px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">ReligionID</th>
												<th aria-label="Religion: activate to sort column ascending" style="width: 411px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Religion Name</th>
                                                <th aria-label="Edit: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Edit</th>
												<th aria-label="Delete: activate to sort column ascending" style="width: 242px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Delete</th>
											    
                                            </tr>
                                        </thead>
                                        
                                      
                                    <tbody aria-relevant="all" aria-live="polite" role="alert">
                                       <?php foreach($religion as $value) {?>
                                            <tr>
                                                <td align="center"><?=$value['religion_id'];?></td>
                                                <td>
                                                <form action="<?php echo base_url('admin_operation/edit_religion/').$value['religion_id'];?>" method="post">
                                                            <input type="text" value="<?=$value['religion_name'];?>" readonly=""  style="border:none;background-color: transparent;width:100%;height:30px;" name="religion_name" id="txt_religion<?=$value['religion_id'];?>"/>
                                                </td>
                                                    <td align="center" class="edit_religion">
                                                            <a href="#" data-value="<?=$value['religion_id'];?>"><i class="fa fa-pencil" id="i_edit<?=$value['religion_id'];?>"></i></a>
                                                            <input type="hidden" name="id" value="<?=$value['religion_id'];?>">
                                                            <button type="submit" id="btn_update<?=$value['religion_id'];?>" style="display:none">Update</button>
                                                        </form>
                                                    </td>
                                                    <td align="center"><a href="<?php echo base_url('admin_operation/delete_religion?id=').$value['religion_id'];?>"><i class="fa fa-trash-o"></i></a></td>
                                            <?php
                                                 }
                                            ?>
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
            $(function() {
                $('#example1').dataTable()});
			
			
        </script>
    

 <script>
    $(document).ready(function(){
        $(".edit_religion a").on("click", function(){
            var id = $(this).attr('data-value');
            $("#btn_update"+id).css('display','block');
            $("#i_edit"+id).css('display','none');
            $("#txt_religion"+id).removeAttr('readonly').css('border','1px solid');
            });
    });
</script>