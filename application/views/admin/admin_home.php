
<?php
	 
	include_once('admin_header.php');
?>

<aside class="right-side">
    <!-- Content Header (Page header) --><title></title>
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small>Control panel</small>                    </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tabmale" data-toggle="tab">Member Info</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tabmale">
                            <div class="row">
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-aqua">
                                        <div class="icon">
                                            <i class="fa fa-fw fa-male"></i>
                                        </div>
                                        <div class="inner" align="center">
                                            <h3>
                                               <?php print_r(count($tot_vis));?>
                                           </h3>
                                            <h4>
                                                Total Visitor
                                            </h4>
                                        </div>
                                        
                                        <a href="<?php echo base_url('/admin/visitor_members');?>" class="small-box-footer">
                                            Total Visitor More Info <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-yellow">      
                                        <div class="inner" align="center" >
                                            <h3>
                                               <?php print_r(count($tot_reg));?> 
											</h3>
                                            <h4>
                                                Register Members
                                            </h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-fw fa-male"></i>
                                        </div>
                                       <a href="<?php echo base_url('/admin/register_members');?>" class="small-box-footer">
                                            Register member More Info <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div><!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner" align="center">
                                            <h3>
                                                0                                   </h3>
                                            <h4>
                                                Paid Members
                                            </h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-fw fa-male"></i>
                                        </div>
                                        <a href="<?php echo base_url('/admin/paid_members');?>" class="small-box-footer">
                                            Paid Member More Info <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div><!-- ./col -->
								 <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-yellow">
                                        <div class="inner" align="center">
                                                <h3>
                                                    <?php print_r(count($tot_block));?>
                                                </h3>
                                                <h4>
                                                    Block Members
                                                </h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-fw fa-male"></i>
                                        </div>
                                        <a href="<?php echo base_url('/admin/block_members');?>" class="small-box-footer">
                                           block Member More info <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div><!-- ./col -->
                              
                            </div></div>


                         <div class="row">
                            <div class="col-xs-12">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tabmale" data-toggle="tab">Location Info</a></li>
                                        <!--<li class=""><a href="#tabfemale" data-toggle="tab">Occupation </a></li>

                                           <li class=""><a href="#tabonline" data-toggle="tab">Employed In </a></li>
    -->
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabmale">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-aqua">
                                                        <div class="inner" align="center">
                                                   <h3>
                                                        <?php print_r(count($tot_country)); ?>
                                                    </h3>
                                                    <h4 align="center">
                                                       Country
                                                    </h4>
                                                    <div class="icon">
                                                        <i class="fa fa-fw fa-male"></i>
                                                    </div>
                                                 </div>
                                                        <a href="<?php echo base_url('/admin/admin_country');?>" class="small-box-footer">
                                                        country More Info <i class="fa fa-arrow-circle-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- ./col -->
                                                    <div class="col-lg-4 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-yellow">
                                                        <div class="inner" align="center">
                                                    <h3>
                                                        <?php print_r(count($tot_state)); ?>
                                                    </h3>
                                                    <h4 align="center">
                                                       State
                                                    </h4>
                                                    <div class="icon">
                                                        <i class="fa fa-fw fa-male"></i>
                                                    </div>
                                                </div>
                                                        <a href="<?php echo base_url('/admin/admin_state');?>" class="small-box-footer">
                                                        State More Info <i class="fa fa-arrow-circle-right"></i>
                                                        </a>
                                                    </div>
                                                </div><!-- ./col -->
                                               <div class="col-lg-4 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-red">
                                                        <div class="inner" align="center">
                                                    <h3>
                                                        <?php print_r(count($tot_city));?>
                                                    </h3>
                                                    <h4 align="center">
                                                       City
                                                    </h4>
                                                    <div class="icon">
                                                        <i class="fa fa-fw fa-male"></i>
                                                    </div>
                                                </div>
                                                        <a href="<?php echo base_url('/admin/admin_city');?>" class="small-box-footer">
                                                        City More Info <i class="fa fa-arrow-circle-right"></i>
                                                        </a>
                                                    </div>
                                                </div><!-- ./col -->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="nav-tabs-custom">
                                                        <ul class="nav nav-tabs" >
                                                            <li class="active"><a href="#tabmale" data-toggle="tab"> Religion / Caste / SubCaste</a></li>
                                                            <!--<li class=""><a href="#tabfemale" data-toggle="tab">Occupation </a></li>

                                                               <li class=""><a href="#tabonline" data-toggle="tab">Employed In </a></li>
                        -->                             </ul>
                                                         <div class="tab-content">
                                                            <div class="tab-pane active" id="tabmale">
                                                                <div class="row">
                                                                    <!-- ./col -->
                                                                    <div class="col-lg-4 col-xs-6">
                                                                        <!-- small box -->
                                                                        <div class="small-box bg-aqua">
                                                                            <div class="inner" align="center">
                                                                                 <h3>
                                                                                    <?php print_r(count($tot_religion));?>
                                                                                 </h3>
                                                                                <h4>
                                                                                   Religion
                                                                                </h4>

                                                                            </div>
                                                                            <div class="icon">
                                                                                <i class="fa fa-graduation-cap"></i>
                                                                            </div>
                                                                            <div class="icon">
                                                                                 <i class="fa fa-fw fa-male"></i>
                                                                            </div>
                                                                            <a href="<?php echo base_url('/admin/admin_religion');?>" class="small-box-footer">
                                                                            Religion More Info<i class="fa fa-arrow-circle-right"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <!-- ./col -->
                                                                    <div class="col-lg-4 col-xs-6">
                                                                        <!-- small box -->
                                                                        <div class="small-box bg-yellow">
                                                                            <div class="inner" align="center">
                                                                                 <h3>
                                                                                    <?php print_r(count($tot_caste));?>
                                                                                 </h3>
                                                                                <h4 align="center">
                                                                                    Caste
                                                                                </h4>

                                                                            </div>
                                                                            <div class="icon">
                                                                                 <i class="fa fa-fw fa-male"></i>
                                                                            </div>
                                                                            <a href="<?php echo base_url('/admin/admin_caste');?>" class="small-box-footer">
                                                                               Caste More Info <i class="fa fa-arrow-circle-right"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div><!-- ./col -->
                                                                    <div class="col-lg-4 col-xs-6">
                                                                        <!-- small box -->
                                                                        <div class="small-box bg-red">
                                                                            <div class="inner" align="center">
                                                                                <h3>
                                                                                    <?php print_r(count($tot_subcaste));?>
                                                                                 </h3>
                                                                                <h4 align="center">
                                                                                    SubCaste
                                                                                </h4>
                                                                            </div>
                                                                            <div class="icon">
                                                                               <i class="fa fa-fw fa-male"></i>
                                                                            </div>
                                                                            <a href="<?php echo base_url('/admin/admin_subcaste');?>" class="small-box-footer">
                                                                                SubCaste More Info <i class="fa fa-arrow-circle-right"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div></div>





                                                                <div class="tab-pane" id="tabonline">
                                                                    <div class="row">

                                                                    </div>



                                                                </div>

                                                            </div>

                                                        </div><!-- /.tab-content -->
                                                    </div><!-- /.nav-tabs-custom -->
                                                </div><!-- /.col -->
                                            </div></div></div></div></div></div></div></div></div></div></section><!-- /.content -->
</aside><!-- /.right-side -->
<!-- ./wrapper -->



