<?php
/**
Template Name: Page - Career
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
					<li><a href="<?php echo home_url(); ?>/career" title="Career">Career</a></li>
				</ul>
			</div>
		</div>
		<div class="inner">
			<div class="wrapcontentpage">
				<div class="leftside">
					<div class="nsasubmenu bg_career">
						<img class="htp3" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunCareer.png" alt="" />
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>
				<div class="rightside">
					<div class="wrap_inner_content">

						

						<div class="box_career borderbot">
							<?php
						include 'conf.php';
						$query = mysql_query("select * from manual_pages where page_id = '1' ");
						$row = mysql_fetch_array($query);
						
						
						?>
							<h2><?= $row['page_title'] ?></h2>
							<p><?= $row['page_desc'] ?></p>
						
						</div>
						
					</div>
				</div>
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->

<?php get_footer(); ?>