<?php
if(!isset($_SESSION['username']))
{
	redirect(base_url().'admin');
}
else
{
?>
	<html style="min-height: 1371px;"><head>
		<meta charset="UTF-8">
		<title>Admin Dashboard</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="shortcut icon" href="<?=base_url();?>asset/upload/MJ_Logo.png">
		<link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!-- font Awesome -->
		<link href="<?php echo base_url();?>asset/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Ionicons -->
		<link href="<?php echo base_url();?>asset/css/ionicons.min.css" rel="stylesheet" type="text/css">
		<!-- Morris chart -->
		<link href="<?php echo base_url();?>asset/css/morris.css" rel="stylesheet" type="text/css">
		<!-- jvectormap -->
		<link href="<?php echo base_url();?>asset/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
		<!-- Date Picker -->
		<link href="<?php echo base_url();?>asset/css/datepicker3.css" rel="stylesheet" type="text/css">
		<!-- Daterange picker -->
		<link href="<?php echo base_url();?>asset/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link href="<?php echo base_url();?>asset/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css">
		<!-- Theme style -->
		<link href="<?php echo base_url();?>asset/css/AdminLTE.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>asset/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>asset/css/all.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>asset/css/bootstrap-switch.css" rel="stylesheet">
		<!-- jQuery 2.0.2 -->
	
	
		<script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/apps_admin.js"></script>
		
		<!-- Bootstrap -->
		<script src="<?php echo base_url();?>asset/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- DATA TABES SCRIPT -->
	
		<script src="<?php echo base_url();?>asset/js/app.js" type="text/javascript"></script>
	
	
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="skin-blue  pace-done" style="min-height: 1371px;"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
			<div class="pace-progress-inner"></div>
		</div>
		<div class="pace-activity"></div></div>
	<!-- header logo: style can be found in header.less -->
	<header class="header">
		<!-- Header Navbar: style can be found in header.less -->
		<a href="<?php echo base_url();?>index.php" class="logo">
			<!-- Add the class icon to your logo image or logo icon to add the margining -->
				Marriage Junction
			            </a>
	
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-user"></i>
							<span>&nbsp;&nbsp;<i class="caret"></i></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="bg-light-blue">
								<img src="<?php echo base_url();?>asset/upload/MJ_Logo.png" alt="User Image" height="150" style="padding-left:55px;">
								<p class="user-header" align="center">
									Marriage Junction                                    </p>
	
							</li>
							<!-- Menu Body -->
	
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="<?php echo base_url('user');?>" class="btn btn-default btn-flat">Visit Site</a>
								</div>
								<div class="pull-right">
									<a href="<?php echo base_url('admin_operation/admin_signout');?>" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>        </header>
	<div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 612px;">
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="left-side sidebar-offcanvas" style="min-height: 1371px;">
			<!-- sidebar: style can be found in sidebar.less -->
	
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left col-md-5">
						<img src="<?php echo base_url();?>asset/upload/MJ_Logo.png" class="img-circle img-responsive" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>Hello, Admin</p>
	
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form -->
				<form action="search_result.php" method="post" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
									<button type="button" name="seach" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
								</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="active">
						<a href="<?php echo base_url('admin/home');?>">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
						</a>
					</li>
					<!--<li>
						<a href="<?php echo base_url('admin/member_approval');?>">
							<i class="fa fa-th"></i> <span>Members Approval</span> </a>
					</li>
	
	
	
	
					<li class="treeview">
						<a href="#">
							<i class="fa fa-camera"></i>
							<span>Photo Approval</span>
							<i class="fa fa-angle-left pull-right"></i></a>
	
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url('admin/profile_photo');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Profile Photo</a>
							</li>
							<li><a href="<?php echo base_url('admin/profile_gallary');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Gallary<small class="badge pull-right bg-red">
										1</small></a></li>
	
						</ul>
					</li>-->
	
					<li>
						<a href="<?php echo base_url('admin/membership_plan');?>">
							<i class="fa fa-laptop"></i>
							<span>Membership Plan</span>
							
						</a>
	
					</li>
					<!--<li class="treeview">
						<a href="">
							<i class="fa fa-table"></i> <span>Mailer Option</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="group_mail.php" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Group Mail</a></li>
							<li><a href="group_mail.php" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Personalise Mail</a></li>
	
						</ul>
					</li>-->
					<li class="treeview">
						<a href="">
							<i class="fa fa-plus-circle"></i> <span>City/State/Country</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url('admin/country');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Add Country</a></li>
							<li><a href="<?php echo base_url('admin/state');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Add State</a></li>
							<li><a href="<?php echo base_url('admin/city');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Add City</a></li>
	
	
						</ul>
					</li>
					<li class="treeview">
						<a href="">
							<i class="fa fa-plus-circle"></i> <span>Religion/Caste/SubCaste</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url('admin/religion');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Add Religion</a></li>
							<li><a href="<?php echo base_url('admin/caste');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Add Caste </a></li>
							<li><a href="<?php echo base_url('admin/sub_caste');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Add Sub Caste</a></li>
	
	
						</ul>
					</li>
					<li class="treeview">
						<a href="">
							<i class="fa fa-bar-chart-o"></i> <span>Reports</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= base_url('admin/visitor_report')?>" style="margin-left: 10px;"><i class="fa fa-user"></i>Visitor</a></li>
							<li><a href="<?= base_url('admin/user_reports')?>" style="margin-left: 10px;"><i class="fa fa-table"></i>User</a></li>
							
									<!-- <i class="fa fa-ban"></i>  -->
							
									<!-- <i class="fa fa-trash-o"></i> <span>Deleted Profiles</span></a>  </li> -->
							
							
						</ul>
					</li>
					<!--<li>
						<a href="<?php echo base_url('admin/add_fields');?>">
							<i class="fa fa-pencil-square-o"></i> <span>Add Fields</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('admin/pages');?>">
							<i class="fa fa-pencil-square-o"></i> <span>Pages</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('admin/match_mail');?>">
							<i class="fa fa-pencil-square-o"></i> <span>Send My Match Mail</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('admin/user_info');?>">
							<i class="fa fa-pencil-square-o"></i> <span> User Information</span>
						</a>
					</li>
					<!--<li>
						<a href="<?php echo base_url('admin/featured_user');?>">
							<i class="fa fa-pencil-square-o"></i> <span>Featured User</span>
						</a>
					</li>-->
	
					<!-- /.sidebar -->
				</ul></section></aside>
<?php
}
?>