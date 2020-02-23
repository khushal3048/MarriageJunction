<?php
	$msg='';

	if(isset($_GET['msg']))
	{
		$msg = $_GET['msg'];
	}	
?>

<html>

<head>
	<title>Admin Login</title>

	<!-- For-Mobile-Apps -->
	
	<meta name="robots" content="ALL">
	<meta name="reply-to" content="">
	<meta name="document-classification" content="Scripts">
	
	
	
	<script async="" src="<?php echo base_url(); ?>asset/js/analytics.js"></script>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	
	<!-- //For-Mobile-Apps -->
	
	<!-- Style --> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/cssforlogin.css" type="text/css" media="all">
	
	<!--Google analytics start-->
	
	 <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','<?php echo base_url(); ?>asset/js/analytics.js','ga');
	
	  ga('create', 'UA-53883333-2', 'auto');
	  ga('send', 'pageview');
	
	</script>
	
	<!--End Google analytics -->

</head>

<body>

	<div class="container">
		<h1 style="color:#FFF">Admin Login</h1>
		<center><h2 style="color:#FFF;"></h2></center>
		<div class="signin">
			<form action="<?php echo base_url('admin_operation/admin_login'); ?>" method="post">
				<center>
					<h2 style="color:#FFF; font-size:24px;padding-bottom:15px;"><?php echo $msg;?></h2>
						<input type="text" class="user" name="userid" placeholder="User Name" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Username';}" >
						<input type="password" class="pass" name="password" placeholder="User password" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Password';}">
						<input type="submit" value="LOGIN" name="submit" style="width:85%;">
				</center>
			</form>
		</div>
	</div>
	<div class="footer">
		 <p>© 2017-2018 All Rights Reserved marriagejunction.com.</p>
	</div>

</body>

</html>