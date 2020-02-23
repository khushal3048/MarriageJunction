<?php
	include('header.php');
?>
<!-- Add fancyBox main JS and CSS files -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.js" type="text/javascript"></script>
	<link href="<?php echo base_url(); ?>assets/css/popup.css" rel="stylesheet" type="text/css">
	<script>
		$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});
		});
	</script>

<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo base_url('user/profile');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Upgrade</li>
     </ul>
   </div>
   <div class="col-md-3 pricing-table">
	  <div class="pricing-table-grid">
		<h3><span class="dollar">Rs.</span>1100<br><span class="month1">1 Month</span></h3>
		<ul>
			<li><span>Basic</span></li>
			<li><a href="#"><i class="fa fa-envelope-o icon_3"></i>E-Mails (10)</a></li>
			<li><a href="#"><i class="fa fa-phone icon_3"></i>Phone Number (20)</a></li>
			<li><a href="#"><i class="fa fa-video-camera icon_3"></i>Video Call (5)</a></li>
			<li><a href="#"><i class="fa fa-eye icon_3"></i>Express Interest</a></li>
			<li><a href="#"><i class="fa fa-user icon_3"></i>Profile Highlight</a></li>
			<li><a href="#"><i class="fa fa-smile-o icon_3"></i>View Profile</a></li>
			<li><a href="#"><i class="fa fa-lock icon_3"></i>Protect Photo</a></li>
			<li><a href="#"><i class="fa fa-smile-o icon_3"></i>Get SMS Alert</a></li>
		</ul>
		<a class="popup-with-zoom-anim order-btn" href="#small-dialog">Pay Now</a>
	  </div>
	  <div id="small-dialog" class="mfp-hide">
			<div class="pop_up">
			 	<div class="payment-online-form-left">
					<form>
						<h4><span class="shipping"> </span>Shipping</h4>
						<ul>
							<li><input class="text-box-dark" type="text" value="Frist Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Frist Name';}"></li>
							<li><input class="text-box-dark" type="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}"></li>
						</ul>
						<ul>
							<li><input class="text-box-dark" type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"></li>
							<li><input class="text-box-dark" type="text" value="Company Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Company Name';}"></li>
						</ul>
						<ul>
							<li><input class="text-box-dark" type="text" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}"></li>
							<li><input class="text-box-dark" type="text" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}"></li>
							<div class="clearfix"> </div>
						</ul>
						<div class="clear"> </div>
					<ul class="payment-type">
						<h4><span class="payment"> </span> Payments</h4>
						<li>
							<span class="col_checkbox">
							<input id="3" class="css-checkbox1" type="checkbox">
							<label for="3" name="demo_lbl_1" class="css-label1"> </label>
							<a class="visa" href="#"> </a>
							</span>
						</li>
						<li>
							<span class="col_checkbox">
								<input id="4" class="css-checkbox2" type="checkbox">
								<label for="4" name="demo_lbl_2" class="css-label2"> </label>
								<a class="paypal" href="#"> </a>
							</span>
						</li>
						<div class="clearfix"> </div>
					</ul>
						<ul>
							<li><input class="text-box-dark" type="text" value="Card Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Card Number';}"></li>
							<li><input class="text-box-dark" type="text" value="Name on card" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name on card';}"></li>
							<div class="clearfix"> </div>
						</ul>
						<ul>
							<li><input class="text-box-light hasDatepicker" type="text" id="datepicker" value="Expiration Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Expiration Date';}"><em class="pay-date"> </em></li>
							<li><input class="text-box-dark" type="text" value="Security Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Security Code';}"></li>
							<div class="clearfix"> </div>
						</ul>
						<ul class="payment-sendbtns">
							<li><input type="reset" value="Cancel"></li>
							<li><input type="submit" value="Process order"></li>
						</ul>
						<div class="clearfix"> </div>
					</form>
				</div>
  			</div>
		</div>
	  </div>
	  <div class="col-md-3 pricing-table">
		<div class="pricing-table-grid">
		  <h3><span class="dollar">Rs.</span>2999<br><span class="month1">3 Months</span></h3>
		  <ul>
			<li><span>Silver</span></li>
			<li><a href="#"><i class="fa fa-envelope-o icon_3"></i>E-Mails (10)</a></li>
			<li><a href="#"><i class="fa fa-phone icon_3"></i>Phone Number (20)</a></li>
			<li><a href="#"><i class="fa fa-video-camera icon_3"></i>Video Call (5)</a></li>
			<li><a href="#"><i class="fa fa-eye icon_3"></i>Express Interest</a></li>
			<li><a href="#"><i class="fa fa-user icon_3"></i>Profile Highlight</a></li>
			<li><a href="#"><i class="fa fa-smile-o icon_3"></i>View Profile</a></li>
			<li><a href="#"><i class="fa fa-lock icon_3"></i>Protect Photo</a></li>
			<li><a href="#"><i class="fa fa-smile-o icon_3"></i>Get SMS Alert</a></li>
		</ul>
		  <a class="popup-with-zoom-anim order-btn" href="#small-dialog">Pay Now</a>
		</div>
	  </div>
	  <div class="col-md-3 pricing-table">
		<div class="pricing-table-grid">
			<h3><span class="dollar">Rs.</span>3999<br><span class="month1">6 Months</span></h3>
			<ul>
				<li><span>Gold</span></li>
				<li><a href="#"><i class="fa fa-envelope-o icon_3"></i>E-Mails (10)</a></li>
				<li><a href="#"><i class="fa fa-phone icon_3"></i>Phone Number (20)</a></li>
				<li><a href="#"><i class="fa fa-video-camera icon_3"></i>Video Call (5)</a></li>
				<li><a href="#"><i class="fa fa-eye icon_3"></i>Express Interest</a></li>
				<li><a href="#"><i class="fa fa-user icon_3"></i>Profile Highlight</a></li>
				<li><a href="#"><i class="fa fa-smile-o icon_3"></i>View Profile</a></li>
				<li><a href="#"><i class="fa fa-lock icon_3"></i>Protect Photo</a></li>
				<li><a href="#"><i class="fa fa-smile-o icon_3"></i>Get SMS Alert</a></li>
		    </ul>
			<a class="popup-with-zoom-anim order-btn" href="#small-dialog">Pay Now</a>
		</div>
	  </div>
	  <div class="col-md-3 pricing-table">
		<div class="pricing-table-grid">
			<h3><span class="dollar">Rs.</span>4999<br><span class="month1">10 Months</span></h3>
			<ul>
				<li><span>Diamond</span></li>
				<li><a href="#"><i class="fa fa-envelope-o icon_3"></i>E-Mails (10)</a></li>
				<li><a href="#"><i class="fa fa-phone icon_3"></i>Phone Number (20)</a></li>
				<li><a href="#"><i class="fa fa-video-camera icon_3"></i>Video Call (5)</a></li>
				<li><a href="#"><i class="fa fa-eye icon_3"></i>Express Interest</a></li>
				<li><a href="#"><i class="fa fa-user icon_3"></i>Profile Highlight</a></li>
				<li><a href="#"><i class="fa fa-smile-o icon_3"></i>View Profile</a></li>
				<li><a href="#"><i class="fa fa-lock icon_3"></i>Protect Photo</a></li>
				<li><a href="#"><i class="fa fa-smile-o icon_3"></i>Get SMS Alert</a></li>
		    </ul>
			<a class="popup-with-zoom-anim order-btn" href="#small-dialog">Pay Now</a>
		</div>
	  </div>
	  <div class="clearfix"> </div>
    </div>
</div>

<?php
	include('footer.php');
?>