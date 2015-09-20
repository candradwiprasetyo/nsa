
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
					<li><a href="<?php echo home_url(); ?>/management" title="Management">Academic & Management Support</a></li>
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
						<?php
							$query_menu = mysql_query("select * from menus where menu_level = '2' and menu_parent_id = '5'  and menu_active_status = '1'");
							while($row_menu = mysql_fetch_array($query_menu)){
							$page_content = "?page_content=".$_GET['page_content'];
								if($page_content == $row_menu['menu_url']){
									$active = " class = 'active'";
								}else{
									$active = "";
								}
							?>
							<li><a <?= $active ?> href="<?php echo home_url(); ?>/<?= $row_menu['menu_url']?>" title="History"><?= $row_menu['menu_name'] ?></a></li>
							<?php
							}
							?>
						</ul>
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>

				<div class="rightside">
					<h1>Academic & Management Support</h1>
					<h2></h2>
					
						<?php
						
						$query = mysql_query("select * from profiles where profile_type_id = '14' order by profile_id asc ");
						while($row = mysql_fetch_array($query)){
							
						?>
					<div class="wrap_inner_content borderbot">
						<div class="rs_left">
							<div class="bot">
								<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row['profile_img'] ?>" alt="" />
							</div>
						</div>
						<div class="rs_right">
							<h2><?= $row['profile_name'] ?></h2>
							<p>
								<?php
							$desc = explode(" ", $row['profile_desc']);
							for($i=0;$i<=50;$i++){
							  echo $desc[$i]." ";
							}

							 ?>
							</p>
						</div>
						<div class="clear_fix"></div>
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
