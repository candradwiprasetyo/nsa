
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
					<li><a href="<?php echo home_url(); ?>/history" title="Profile">Profile</a></li>
					<li class="arrow">&nbsp;</li>
					<li><a href="<?php echo home_url(); ?>/history" title="History">About Us</a></li>
				</ul>
			</div>
		</div>
		<div class="container">
			<div class="wrapcontentpage">

				<div class="col-md-3 col-md-offset-1">
					<div class="nsasubmenu bg_profile">
						<img class="htp1" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunProfil.png" alt="Profile" />
						<!--<h1 class="htp1">Profile</h1>-->
						<ul>
							<?php
							$query_menu = mysql_query("select * from menus where menu_level = '2' and menu_parent_id = '5' and menu_active_status = '1'");
							while($row_menu = mysql_fetch_array($query_menu)){
							$page_content = "?page_content=".$_GET['page_content'];
								if($page_content == $row_menu['menu_url']){
									$active = " class = 'active'";
								}else{
									$active = "";
								}

								if($row_menu['menu_content_type'] == 1){
									$link_profile = $row_menu['menu_url'];
								}else{
									$link_profile = "?page_content=content&menu_id=".$row_menu['menu_id'];
								}

							?>
							<li><a <?= $active ?> href="<?php echo home_url(); ?>/<?= $link_profile ?>" title="History"><?= $row_menu['menu_name'] ?></a></li>
							<?php
							}
							?>

							</ul>
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>

				<div class="col-md-7">
					<?php
						
						$query = mysql_query("select * from profiles where profile_type_id = '11' order by profile_id desc ");
						while($row = mysql_fetch_array($query)){
						
						
						?>
					<h1><?= $row['profile_name'] ?></h1>
					<h2></h2>
					<div class="col-md-5">
                    	<div class="row">
						<p>
							<?= $row['profile_desc'] ?>
						</p>
                        </div>
					</div>
					<div class="col-md-5">
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
				
				
			</div>
		</div><br />
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
			<div class="container">
				<div class="col-md-2">
					<div class="value_img">
						<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/02.character.jpg" alt="" />
					</div>
					<div class="value_text">
						<span>CHARACTER <br />FOCUS</span>
					</div>
				</div>
				<div class="col-md-2">
					<div class="value_img">
						<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/05.nationalism.jpg" alt="" />
					</div>
					<div class="value_text">
						<span>SENSE OF<br />NATIONALISM</span>
					</div>
				</div>
				<div class="col-md-2">
					<div class="value_img">
						<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/04.multicultural.jpg" alt="" />
					</div>
					<div class="value_text">
						<span>MULTICULTURALISM</span>
					</div>
				</div>
				<div class="col-md-2">
					<div class="value_img">
						<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/03.ecological.jpg" alt="" />
					</div>
					<div class="value_text">
						<span>ECOLOGICAL<br />AWARENESS</span>
					</div>
				</div>
				<div class="col-md-2">
					<div class="value_img">
						<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/01.enterpreneur.jpg" alt="" />
					</div>
					<div class="value_text">
						<span>ENTREPRENEURSHIP</span>
					</div>
				</div>
			</div>
		</div>
	</div>
