<?php 
	include_once('admin_header.php')
?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Admin Dashboard
                        <small>Control panel</small>                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('admin/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 
				 
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tabmale" data-toggle="tab">Education </a></li>
                                    <!--<li class=""><a href="#tabfemale" data-toggle="tab">Occupation </a></li>
                                   
                                   	<li class=""><a href="#tabonline" data-toggle="tab">Employed In </a></li>
-->
                                </ul>
                                
                                <div class="tab-content">
                                   <div class="tab-pane active" id="tabmale">
                                   <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h2 align="center">
                                        Education
                                    </h2>
                                    
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="add_education.php" class="small-box-footer">
                                    Insert Education <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h2 align="center">
                                        Occupation
                                    </h2>
                                    
                                </div>
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="add_occupation.php" class="small-box-footer">
                                    Insert Occupation <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h2 align="center">
                                       Employed In
                                    </h2>
                                    
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="add_employed.php" class="small-box-footer">
                                    Insert Employed In <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div>
                                   </div>
                                   <div class="tab-pane" id="tabfemale">
                                   <div class="row">
                                               <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                  </h3>
                                    <p>
                                        Active Members
                                    </p>
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-fw fa-female"></i>
                                </div>
                                <a href="active_female_reports.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                  </h3>
                                    <p>
                                        Paid Members
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-female"></i>
                                </div>
                                <a href="paid_female_reports.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                  </h3>
                                    <p>
                                        Elapsed Members
                                    </p>
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-fw fa-female"></i>
                                </div>
                                <a href="membership_expired_female_report.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div>
                    
          </div>                                  
          
          
          
          
          
          
          
          
           <div class="tab-pane" id="tabonline">
                                   <div class="row">
                                   
                </div>        
 

                                    
                        </div>
             
                              </div>

                          </div><!-- /.tab-content -->
                      </div><!-- /.nav-tabs-custom -->
                  </div><!-- /.col -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
       <!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
                       
