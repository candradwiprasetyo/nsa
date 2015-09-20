<?php
						
						$query = mysql_query("select * from admissions where admission_id = '".$_GET['id']."' limit 1 ");
						$row = mysql_fetch_array($query);
						
						
						?>
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
					<li><a href="<?php echo home_url(); ?>/history" title="History"><?= $row['admission_name'] ?></a></li>
				</ul>
			</div>
		</div>
		<div class="inner">
			<div class="wrapcontentpage">

				<div class="leftside">
					<div class="nsasubmenu bg_profile">
						<h1 class="htp1"><?= $row['admission_name']?></h1>
						<h6></h6>
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>

				<div class="rightside">
					

						<div class="wrap_inner_content">
						<div class="bot_big">
							<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row['admission_img']?>" alt="" class="img_class" />
						</div>
						<h2><?= $row['admission_name'] ?></h2>
						<h6><?= $row['admission_date'] ?></h6>
						<p>
							<?= $row['admission_desc'] ?>
						</p>
						<a class="more" href="javascript:history.back()" title="">Back</a>
						<br>
						</div>
					
					
				</div>
				
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->

	
