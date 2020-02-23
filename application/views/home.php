<?php
	include("header.php");
		
?>
	

<style type="text/css">
	select
	{
		padding:5px;
		
	}
	select option
	{
		font-size:18px;
	}
</style>

<div class="banner">
			<div class="container">
				<div class="banner_info">
			  		<h3 style="margin-left: 500px;">Find your life partner</h3>
			  		<a href="#" class="btn hvr-shutter-out-horizontal" data-toggle="modal" data-target="#login-modal">Create your Profile</a>
					
				</div>
		  	</div>
		  	<div class="profile_search">
				<div class="container wrap_1">
			  		<form action="" style="padding-bottom:75px;">
						<div class="col-md-2">
							<label class="gender_1" style="font-size:18px;">I'm Looking For a</label>
							<select class="" style="width:80%;">
								<option >--Select--</option>
								<option >Man</option>
								<option >Woman</option>
							</select>
						</div>
						<div class="col-md-2">
							<label class="gender_1" style="font-size:18px;">aged</label><br />
							<select class="" style="width:40%;">
								<?php
									for ($i=18; $i<=40; $i++)
									{
								?> 
								<option value="<?=$i?>"><?=$i?></option>
								<?php
									}
								?>
							</select>
							<label class="gender_1">&nbsp;to</label>
							<select class="" style="width:40%; float:right;">
								<?php
									for ($i=19; $i<=40; $i++)
									{
								?> 
								<option value="<?=$i?>"><?=$i?></option>
								<?php
									}
								?>
							</select>				
						</div>
						<div class="col-md-2">
							<label class="gender_1" style="font-size:18px;">of religion</label>
							<select class="" style="width:80%;">
								<option >--Select--</option>
								<?php foreach($religion as $value){?>
									<option value="<?=$value['religion_id'];?>" style="text-align:left;"><?=$value['religion_name'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2">
							<label class="gender_1" style="font-size:17.3px;width:100%;">and mother toungue</label>
							<select class="" style="width:90%;">
								<option >--Select--</option>
								<option value="Gujarati">Gujarati</option>
								<option value="Hindi">Hindi</option>
								<option value="English">English</option>
								<option value="Marathi">Marathi</option>

							</select>
						</div>

						<div class="col-md-2 submit">
							<label style="padding-top:39px;;"></label>
				   			<input id="submit-btn" class="btn hvr-wobble-vertical" style="width:90%;font-size:16px;padding:12px;font-style:italic;" type="button" value="Find Matches" data-toggle="modal" data-target="#login-modal">
						</div>
			 		</form>
				</div>
		  	</div>
		</div>
		<div class="grid_1" style="margin-top:-200px;">
			<div class="container">
				<h1>Featured Profiles</h1>
				<div class="heart-divider">
					<span class="grey-line"></span>
					<i class="fa fa-heart pink-heart"></i>
					<i class="fa fa-heart grey-heart"></i>
					<span class="grey-line"></span>
				</div>
				<ul id="flexiselDemo3">
							<li>
								<div class="col_1">
									<a href="#">
										<img src="<?php echo base_url(); ?>assets/images/1.jpg" alt="" class="hover-animation image-zoom-in img-responsive" height="100" />
										<h3><span class="m_3">Profile ID : MJ-59</span><br> Christian, India<br>Engineer</h3>
									</a>
								</div>
							</li>
							<li>
								<div class="col_1">
									<a href="#">
										<img src="<?php echo base_url(); ?>assets/images/2.jpg" alt="" class="hover-animation image-zoom-in img-responsive" height="100" />
										<h3><span class="m_3">Profile ID : MJ-65</span><br> Sikh, India<br>C.S.</h3>
									</a>
								</div>
							</li>
							<li>
								<div class="col_1">
									<a href="#">
										<img src="<?php echo base_url(); ?>assets/images/3.jpg" alt="" class="hover-animation image-zoom-in img-responsive" height="100" />
										<h3><span class="m_3">Profile ID : MJ-78</span><br> Christian, U.K.<br>Teacher</h3>
									</a>
								</div>
							</li>
							<li>
								<div class="col_1">
									<a href="#">
										<img src="<?php echo base_url(); ?>assets/images/4.jpg" alt="" class="hover-animation image-zoom-in img-responsive" height="100" />
										<h3><span class="m_3">Profile ID : MJ-84</span><br> Jain, U.S.<br>C.A.</h3>
									</a>
								</div>
							</li>
							<li>
								<div class="col_1">
									<a href="#">
										<img src="<?php echo base_url(); ?>assets/images/5.jpg" alt="" class="hover-animation image-zoom-in img-responsive" height="100" />
										<h3><span class="m_3">Profile ID : MJ-91</span><br> Hindu, India<br>Accountant</h3>
									</a>
								</div>
							</li>
							<li>
								<div class="col_1">
									<a href="#">
										<img src="<?php echo base_url(); ?>assets/images/6.jpg" alt="" class="hover-animation image-zoom-in img-responsive" height="100" />
										<h3><span class="m_3">Profile ID : MJ-95</span><br> Christian, Australia<br>Corporate</h3>
									</a>
								</div>
							</li>
			  	</ul>
				<script type="text/javascript">
			 		$(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 6,
							animationSpeed: 1000,
							autoPlay:false,
							autoPlaySpeed: 3000,
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: {
								portrait: {
									changePoint:480,
									visibleItems: 1
								},
								landscape: {
									changePoint:640,
									visibleItems: 2
								},
								tablet: {
									changePoint:768,
									visibleItems: 3
								}
							}
						});
					});
				</script>
		   		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flexisel.js"></script>
			</div>
		</div>
		<div class="grid_2">
			<div class="container">
				<h2>Success Stories</h2>
				<div class="heart-divider">
					<span class="grey-line"></span>
					<i class="fa fa-heart pink-heart"></i>
					<i class="fa fa-heart grey-heart"></i>
					<span class="grey-line"></span>
				</div>
				<div class="row_1">
					<div class="col-md-8 suceess_story">
						<ul>
					  		
							<li>
								<div class="suceess_story-date">
									<span class="entry-1">Dec 20, 2015</span>
								</div>
								<div class="suceess_story-content-container">
									<figure class="suceess_story-content-featured-image">
										<img width="75" height="75" src="<?php echo base_url(); ?>assets/images/8.jpg" class="img-responsive" alt=""/>
									</figure>
									<div class="suceess_story-content-info">
										<h4><a href="http://www.worldoffestival.com/">Apoorva & Praveen</a></h4>
										<p>Well, I registered on Shaadi as my parents forced me to. The hunt went on and on.. It was about to be an year since the search started but before it could reach there I got a request from my dearest hubby.. <a href="http://www.worldoffestival.com/">Read More...</a></p>
									</div>
								</div>
							</li>
							<li>
								<div class="suceess_story-date">
									<span class="entry-1">Apr 01, 2014</span>
								</div>
								<div class="suceess_story-content-container">
									<figure class="suceess_story-content-featured-image">
								   		<img width="75" height="75" src="<?php echo base_url(); ?>assets/images/10.jpg" class="img-responsive" alt=""/>
									</figure>
									<div class="suceess_story-content-info">
										<h4><a href="http://www.worldoffestival.com/">Viplesh & Bhairvi</a></h4>
										<p>After many years of searching on marriagejunction.com, I felt I would never find my suitable match. However, I never gave up trying. I met Bhairvi after she had contacted me on marriagejunction.com in November 2013.<a href="http://www.worldoffestival.com/">Read More...</a>
										</p>
									</div>
								</div>
							</li>
							<li>
								<div class="suceess_story-date">
									<span class="entry-1">Nov 18, 2014</span>
								</div>
								<div class="suceess_story-content-container">
									<figure class="suceess_story-content-featured-image">
								   		<img width="75" height="75" src="<?php echo base_url(); ?>assets/images/11.jpg" class="img-responsive" alt=""/>
									</figure>
									<div class="suceess_story-content-info">
										<h4><a href="http://www.worldoffestival.com/">Saurabh & Gunjan</a></h4>
										<p>My parents were searching a guy for me since 5 years but couldn't get suitable match. They searched everywhere in UP/Delhi/NCR. Then they registered in Shaadi.com and started searching my match we reviewed near about 500 profiles but no result.<a href="http://www.worldoffestival.com/">Read More...</a></p>
									</div>
								</div>
							</li>
							<li>
								<div class="suceess_story-date">
									<span class="entry-1">Feb 12, 2013</span>
								</div>
								<div class="suceess_story-content-container">
									<figure class="suceess_story-content-featured-image">
										<img width="75" height="75" src="<?php echo base_url(); ?>assets/images/13.jpg" class="img-responsive" alt=""/>
									</figure>
									<div class="suceess_story-content-info">
										<h4><a href="http://www.worldoffestival.com/">Mausam & Mohit</a></h4>
										<p>I found my hubby through marriagejunction.com. For the first few days we chatted through marriagejunction.com, after talking to each other for a week we spoke to each other for nearly 2 months and found each other very compatible and understanding.<a href="http://www.worldoffestival.com/">Read More...</a></p>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="col-md-4 row_1-right">
				  		<h3>News & Events</h3>
						<div class="box_1">
					  		<figure class="thumbnail1"><img width="170" height="155" src="<?php echo base_url(); ?>assets/images/14.jpg" class="img-responsive" alt=""/></figure>
					  		<div class="extra-wrap">
								<div class="post-meta">
									<span class="day">
										<time datetime="2014-05-25T10:15:43+00:00">25</time>
									</span>
									<span class="month">
										<time datetime="2014-05-25T10:11:51+00:00">May</time>
									</span>
								</div>
								<h4 class="post-title"><a href="#">Sachin Javdekar</a></h4>
								<div class="clearfix"> </div>
								<div class="post-content">Hi My Name is Sachin. I'm getting Married With Poonam on 25th May 2017.</div>
								<a href="http://www.worldoffestival.com/" class="vertical">Read More</a>
					  		</div>
						</div>
						<div class="box_1">
					  		<figure class="thumbnail1"><img width="170" height="155" src="<?php echo base_url(); ?>assets/images/p2.jpg" class="img-responsive" alt=""/></figure>
					  		<div class="extra-wrap">
								<div class="post-meta">
									<span class="day">
										<time datetime="2014-05-25T10:15:43+00:00">20</time>
									</span>
									<span class="month">
										<time datetime="2014-05-25T10:11:51+00:00">July</time>
									</span>
								</div>
								<h4 class="post-title"><a href="#">Pooja Mishra</a></h4>
								<div class="clearfix"> </div>
								<div class="post-content">Hello all members, my name is Pooja. I'm Waiting For my perfect match. So Please Visit my profile.</div>
								<a href="http://www.worldoffestival.com/" class="vertical">Read More</a>
					  		</div>
						</div>
						<div class="box_2">
					  		<figure class="thumbnail1"><img width="170" height="155" src="<?php echo base_url(); ?>assets/images/1.jpg" class="img-responsive" alt=""/></figure>
					  		<div class="extra-wrap">
								<div class="post-meta">
									<span class="day">
										<time datetime="2014-05-25T10:15:43+00:00">07</time>
									</span>
									<span class="month">
										<time datetime="2014-05-25T10:11:51+00:00">January</time>
									</span>
								</div>
								<h4 class="post-title"><a href="#">Rahul Parmar</a></h4>
								<div class="clearfix"> </div>
								<div class="post-content">Hii guys, My name is Rahul Parmar. I'm very Happy after met my perfect Match by marriagejunction.com</div>
								<a href="http://www.worldoffestival.com/" class="vertical">Read More</a>
					  		</div>
						</div>
						
				 	</div>
				 	<div class="clearfix"> </div>
			   	</div>
			</div>
		</div>
		<div class="bg">
			<div class="container">
				<h3>Guest Messages</h3>
				<div class="heart-divider">
					<span class="grey-line"></span>
					<i class="fa fa-heart pink-heart"></i>
					<i class="fa fa-heart grey-heart"></i>
					<span class="grey-line"></span>
				</div>
				<div class="col-sm-6">
					<div class="bg_left">
						<h4>But I must explain</h4>
						<h5>Friend of Bride</h5>
						<p>"I hope you know that we, all of your friends and well-wishers, have been impatiently and eagerly waiting for this special day to come. We hope that today is nothing but a grand success. We hope that this special day will give you many fond memories to remember for years to come. Congrats!"</p>
						<ul class="team-socials">
							<li><a href="https://www.facebook.com/Marriage-Junction-184082242112438/"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
							<li><a href="https://twitter.com/Marri_Junction"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
							<li><a href="https://plus.google.com/u/0/107466304298140538193"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="bg_left">
						<h4>But I must explain</h4>
						<h5>Friend of Groom</h5>
						<p>"You are a great person and a very good friend. I know that you are going to be a successful family man, too. I can't wait to witness your wonderful future, filled with a content wife and beautiful children. My best wishes to you on your marriage!"</p>
						<ul class="team-socials">
							<li><a href="https://www.facebook.com/Marriage-Junction-184082242112438/"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
							<li><a href="https://twitter.com/Marri_Junction"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
							<li><a href="https://plus.google.com/u/0/107466304298140538193"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		


<?php
	include("footer.php");
?>