<?php
/**
Template Name: Page - Academic
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
					<li><a class="homeb" href="<?php echo home_url(); ?>/" title="Homr">&nbsp;</a></li>
					<li class="arrow">&nbsp;</li>
					<li><a href="<?php echo home_url(); ?>/academic" title="Academic">Academic</a></li>
				</ul>
			</div>
		</div>
		<div class="inner">
			<div class="wrapcontentpage">
				<div class="leftside">
					<div class="nsasubmenu bg_achieve">
						<img class="htp3" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunAcademy.png" alt="" />
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>
				<div class="rightside">
					<h1>Academic</h1>
					<h2></h2>
					<div class="wrap_inner_content">
						<div class="wrapAcademic">
							<?php
							include 'conf.php';
							$query = mysql_query("select * from academics order by academic_id");
							while($row = mysql_fetch_array($query)){
							?>
							<div class="box_academic" style="background:<?= $row['academic_color'] ?>">
								<div class="titleacademic"><h4><?= $row['academic_name']?></h4></div>
								<div class="textacademic">
									<p><?= $row['academic_desc'] ?>
									</p>
								</div>
								<div class="clear_fix"></div>
							</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->

<?php get_footer(); ?>