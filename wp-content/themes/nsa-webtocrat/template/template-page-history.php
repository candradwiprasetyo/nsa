
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
					<li><a href="<?php echo home_url(); ?>/history" title="History">About Us</a></li>
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
							<li><a class="active" href="<?php echo home_url(); ?>/?page_id=52" title="History">History</a></li>
							<li><a href="<?php echo home_url(); ?>/?page_id=53" title="Vision & Mission">Vision & Mission</a></li>
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
						$query = mysql_query("select * from profiles where profile_type_id = '1' order by profile_id desc ");
						while($row = mysql_fetch_array($query)){
						
						
						?>
					<h1><?= $row['profile_name'] ?></h1>
					<h2></h2>
					<div class="rs_left">
						<p>
							<?= $row['profile_desc'] ?>
						</p>
					</div>
					<div class="rs_right">
						<div class="wrapimg_circle icsize_1">
							<div class="img_circle">
								<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row['profile_img'] ?>" alt="" />
							</div>
						</div>
					</div>
					<?php
					}
					?>
				</div>
				
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->

	<div class="wrap_value add_fix">
		<div class="value_title">
			<div class="titlebox">
				<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/5_core.png" alt="" />
			</div>
			<hr />
		</div>
		<div class="value_middle"></div>
		<div class="value_box">
			<div class="inner add_fix">
				<div class="value_item">
					<div class="value_img">
						<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/core_1.png" alt="" />
					</div>
					<div class="value_text">
						<span>CHARACTER<br />FOCUS</span>
					</div>
				</div>
				<div class="value_item">
					<div class="value_img">
						<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/core_2.png" alt="" />
					</div>
					<div class="value_text">
						<span>SENSE OF<br />NATIONALISM</span>
					</div>
				</div>
				<div class="value_item">
					<div class="value_img">
						<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/core_3.png" alt="" />
					</div>
					<div class="value_text">
						<span>MULTICULTURALISM</span>
					</div>
				</div>
				<div class="value_item">
					<div class="value_img">
						<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/core_4.png" alt="" />
					</div>
					<div class="value_text">
						<span>ECOLOGICAL<br />AWARENESS</span>
					</div>
				</div>
				<div class="value_item">
					<div class="value_img">
						<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/core_5.png" alt="" />
					</div>
					<div class="value_text">
						<span>ENTREPRENEURSHIP</span>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>