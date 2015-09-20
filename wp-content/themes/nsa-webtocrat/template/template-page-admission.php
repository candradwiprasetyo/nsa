<?php
/**
Template Name: Page - Admission
*/

get_header(); ?>
		
	<div class="wrapHeader rich_text">
		<div class="headerpage">
			<img src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/header1.jpg" alt="" />
		</div>
	</div><!-- end.wrapTop -->
		
	<div class="wrapContent rich_text">

		<div class="wrapbreadcrumb">
			<div class="inner">
				<ul class="breadcrumb">
					<li><a class="homeb" href="<?php echo home_url(); ?>/" title="">&nbsp;</a></li>
					<li class="arrow">&nbsp;</li>
					<li><a href="<?php echo home_url(); ?>/admission" title="Admission">Admission</a></li>
				</ul>
			</div>
		</div>

		<div class="inner">
			<div class="wrapcontentpage">

				<div class="leftside">
					<div class="nsasubmenu bg_admission">
						<img class="htp3" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunAdmission.png" alt="" />
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>

				<div class="rightside">
					<h1>Admission</h1>
					<h2></h2>
					<div class="wrap_inner_content">
						<div class="Ad_big">
							<div class="textAd">
								<h1>Registration</h1>
								<h2>Register now!</h2>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
								<a class="more" href="<?php echo home_url(); ?>/admission/registration" title="">Read More</a>
							</div>
							<img src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/imgAd1.jpg" alt="" />
						</div>
					</div>
				</div>

				<div class="clear_fix"></div>

				<div class="wrap_Adsmall">
					<div class="Adsmall">
						<h1>Schedule!</h1>
						<a class="more" href="<?php echo home_url(); ?>/admission/schedule" title="">Read More</a>
						<img src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/imgAd1s.jpg" alt="" />
					</div>
					<div class="Adsmall">
						<h1>Lorem Ipsum</h1>
						<a class="more" href="<?php echo home_url(); ?>/admission/lorem-ipsum" title="Lorem Ipsum">Read More</a>
						<img src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/imgAd2s.jpg" alt="" />
					</div>
					<div class="Adsmall">
						<h1>Register</h1>
						<a class="more" href="<?php echo home_url(); ?>/admission/register" title="">Read More</a>
						<img src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/imgAd1s.jpg" alt="" />
					</div>
				</div>

				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->

<?php get_footer(); ?>