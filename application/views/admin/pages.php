<?php 
 	include_once('admin_header.php')
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
                                    <li class="active"><a href="#tabmale" data-toggle="tab">Site Pages</a></li>
                                    <!--<li class=""><a href="#tabfemale" data-toggle="tab">Occupation </a></li>
                                   
                                   	<li class=""><a href="#tabonline" data-toggle="tab">Employed In </a></li>
-->
                                </ul>
                                
                                <div class="tab-content">
                                   <div class="tab-pane active" id="tabmale">
                                   <div class="row">
                        
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h2 align="center">
                                        Terms
                                    </h2>
                                    
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="add_terms.php" class="small-box-footer">
                                    Create Cms For T &amp; C <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h2 align="center">
                                        Faq's
                                    </h2>
                                    
                                </div>
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="add_faq.php" class="small-box-footer">
                                   Create Cms For Faq's <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h2 align="center">
                                       Contact Us
                                    </h2>
                                    
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="add_contactus.php" class="small-box-footer">
                                    Create Cms For Contact Us<i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h2 align="center">
                                       About Us
                                    </h2>
                                    
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="add_aboutus.php" class="small-box-footer">
                                    Create Cms For About Us<i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h2 align="center">
                                      News
                                    </h2>
                                    
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="cms_event.php" class="small-box-footer">
                                    Create Cms For News<i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h2 align="center">
                                       Membership
                                    </h2>
                                    
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="add_membership.php" class="small-box-footer">
                                    Create Cms For Membership<i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h2 align="center">
                                      Privacy/Policy
                                    </h2>
                                    
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="add_privacy_policy.php" class="small-box-footer">
                                    Create Cms For Privacy/Policy<i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                         <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h2 align="center">
                                     Payment
                                    </h2>
                                    
                                </div>
                                 <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="add_payment.php" class="small-box-footer">
                                    Create Cms For Payment<i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
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
                       

                   <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
      
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
	
    
</div></body></html>