<?php
/**
Template Name: Page - Vision & Mission
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
					<li><a href="<?php echo home_url(); ?>/history" title="Profile">Profile</a></li>
					<li class="arrow">&nbsp;</li>
					<li><a href="<?php echo home_url(); ?>/vision-mission" title="Vision & Mission">Vision & Mission</a></li>
				</ul>
			</div>
		</div>
		<div class="inner">
			<div class="wrapcontentpage">

				<div class="leftside">
					<div class="nsasubmenu bg_profile">
						<img class="htp1" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunProfil.png" alt="Profile" />
						<!--<h1 class="htp1">Profile</h1>-->
						<ul>
							<li><a href="<?php echo home_url(); ?>/?page_id=52" title="History">History</a></li>
							<li><a class="active" href="<?php echo home_url(); ?>/?page_id=53" title="Vision & Mission">Vision & Mission</a></li>
							<li><a href="<?php echo home_url(); ?>/?page_id=54" title="Values">Values</a></li>
							<li><a href="<?php echo home_url(); ?>/?page_id=55" title="Board of Trustees">Board of Trustees</a></li>
							<li><a href="<?php echo home_url(); ?>/?page_id=60" title="Management">Management</a></li>
							<li><a href="<?php echo home_url(); ?>/?page_id=61" title="GM & Division">GM & Division</a></li>
						</ul>
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>

				<div class="rightside">
					<?php
						include 'conf.php';
						$no = 1;
						$query = mysql_query("select * from profiles where profile_type_id = '2' order by profile_id asc ");
						while($row = mysql_fetch_array($query)){
							if($no%2==1){
						?>
					<div class="wrap_inner_content">
						<div class="rs_left">
							<h3><?= $row['profile_name'] ?></h3>
							<p><?= $row['profile_desc'] ?></p>
							</div>
						<div class="rs_right">
							<div class="wrapimg_circle icsize_2">
								<div class="img_circle">
									<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row['profile_img'] ?>" alt="" />
								</div>
							</div>
						</div>
						<div class="clear_fix"></div>
					</div>
					<?php
					}else{
					?>
					<div class="wrap_inner_content">
						<div class="rs_left">
							<div class="wrapimg_circle icsize_2">
								<div class="img_circle">
									<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row['profile_img'] ?>" alt="" />
								</div>
							</div>							
						</div>
						<div class="rs_right">
							<h3><?= $row['profile_name'] ?></h3>
							<p><?= $row['profile_desc'] ?></p>
							</div>
						<div class="clear_fix"></div>
					</div>
					<?php
					}
					$no++;
					}
					?>
				</div>
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->

<?php get_footer(); ?>