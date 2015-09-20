<?php
/**
Template Name: Page - Achievement Detail
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
					<li><a class="homeb" href="<?php echo home_url(); ?>/" title="Home">&nbsp;</a></li>
					<li class="arrow">&nbsp;</li>
					<li><a href="<?php echo home_url(); ?>/achievement" title="Achievement">Achievement</a></li>
					<li class="arrow">&nbsp;</li>
					<li><a href="<?php echo home_url(); ?>/achievement/" title="2015">2015</a></li>
				</ul>
			</div>
		</div>
		<div class="inner">
			<div class="wrapcontentpage">

				<div class="leftside">
					<div class="nsasubmenu bg_achieve">
						<img class="htp2" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunAchieve.png" alt="" />
						<!--<h1 class="htp1">Profile</h1>-->
						<ul>
							<li><a class="active" href="<?php echo home_url(); ?>/achievement/" title="Achievement 2015">2015</a></li>
						</ul>
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>

				<div class="rightside">
					<h1>Achievement</h1>
					<h2></h2>
					<div class="wrap_inner_content">
						<div class="bot_big">
							<img src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/imgaci1big.jpg" alt="" />
						</div>
						<h2>Lorem Ipsum</h2>
						<h6>03 July 2015</h6>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						<a class="more" href="<?php echo home_url(); ?>/achievement/" title="">Back</a>
					</div>
				</div>
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->

<?php get_footer(); ?>