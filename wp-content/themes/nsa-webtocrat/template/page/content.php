<?php
						
						$query = mysql_query("select * from menus where menu_id = '".$_GET['menu_id']."' limit 1 ");
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
				<ul class="breadcrumb_real">
					<li><a class="homeb" href="<?php echo home_url(); ?>/" title="Home">&nbsp;</a></li>
					<li class="arrow">&nbsp;</li>
					<li><a href="<?php echo home_url(); ?>/history" title="History"><?= $row['menu_name'] ?></a></li>
				</ul>
			</div>
		</div>
		<div class="container">
			<div class="wrapcontentpage">

				<div class="col-md-3 col-md-offset-1">
					<div class="nsasubmenu bg_profile">
						<h1 class="htp1"><?= $row['menu_name']?></h1>
						
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>

				<div class="col-md-7">
					
					<h1><?= $row['menu_name'] ?></h1>
					<h2></h2>
					<div class="col-md-12">
                    <div class="row">
						<p>
							<?= $row['menu_content'] ?>
						</p>
                    </div>
					</div>
					
					
				</div>
				
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->

	
