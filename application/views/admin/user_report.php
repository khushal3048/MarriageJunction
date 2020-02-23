
<?php
     
    include_once('admin_header.php');
?>

<aside class="right-side">
    <!-- Content Header (Page header) --><title></title>
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small>Control panel</small>       
        </h1>
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
                        <li class="active"><a href="#tabmale" data-toggle="tab">Register user Report Info</a></li>
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
                                                <?php print_r(count($tot_block_report));?>
                                            </h3>
                                            <h4 align="center">
                                                       Monthly block<br> report
                                            </h4>
                                            <div class="icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            </div>
                                                <a href="<?php echo base_url('/admin_operation/blockuser_chart');?>" class="small-box-footer">
                                                         More Info <i class="fa fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                                <!-- ./col -->
                                        <div class="col-lg-4 col-xs-6">
                                                    <!-- small box -->
                                            <div class="small-box bg-yellow">
                                                <div class="inner" align="center">
                                                    <h3>
                                                        <?php print_r(count($tot_reg_report));?>
                                                    </h3>
                                                    <h4 align="center">
                                                       Yearly register <br>
                                                       report
                                                    </h4>
                                                    <div class="icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                    <a href="<?php echo base_url('/admin_operation/yearly_registeruser_chart');?>" class="small-box-footer">
                                                         More Info <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                            </div>
                                        </div><!-- ./col -->
                                        <div class="col-lg-4 col-xs-6">
                                                    <!-- small box -->
                                            <div class="small-box bg-yellow">
                                                <div class="inner" align="center">
                                                    <h3>
                                                        <?php print_r(count($tot_reg_report));?>
                                                    </h3>
                                                    <h4 align="center">
                                                       Monthly register <br>
                                                       report
                                                    </h4>
                                                    <div class="icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                    <a href="<?php echo base_url('/admin_operation/monthly_registeruser_chart');?>" class="small-box-footer">
                                                         More Info <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                            </div>
                                        </div><!-- ./col -->
                                        <div class="col-lg-4 col-xs-6">
                                                    <!-- small box -->
                                            <div class="small-box bg-yellow">
                                                <div class="inner" align="center">
                                                    <h3>
                                                        <p> 
                                                         </p>
                                                    </h3>
                                                    <h4 align="center">
                                                       top profile userview <br>
                                                       report
                                                    </h4>
                                                    <div class="icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                    <a href="<?php echo base_url('/admin_operation/top_profile_chart');?>" class="small-box-footer">
                                                         More Info <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                            </div>
                                        </div><!-- ./col -->
                                       <!-- ./col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>