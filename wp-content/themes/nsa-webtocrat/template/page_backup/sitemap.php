
		
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
					<li><a href="<?php echo home_url(); ?>/sitemap" title="Sitemap">Sitemap</a></li>
				</ul>
			</div>
		</div>
		<div class="inner">
			<div class="wrapcontentpage">
				<div class="leftside">
					<div class="nsasubmenu bg_career">
						<img class="htp3" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunSitemap.png" alt="" />
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>
				<div class="rightside">
					<div class="wrap_inner_content">
							<?php
							
							$no = 1;
							$query_sitemap = mysql_query("select * from menus where menu_active_status = '1' and menu_type = '2' and menu_level = '1'");
							while($row_sitemap = mysql_fetch_array($query_sitemap)){
								$query_count_sitemap_child = mysql_query("select count(menu_id) as jumlah_child from menus where menu_parent_id = '".$row_sitemap['menu_id']."'");
								$row_count_sitemap_child = mysql_fetch_array($query_count_sitemap_child);

								if($row_count_sitemap_child['jumlah_child'] > 0 ){
									$sitemap_link = "#";
								}else{
									if($row_sitemap['menu_content_type'] == 1){
										$sitemap_link = $main_url.$row_sitemap['menu_url'];
									}else{
										$sitemap_link = $main_url."?page_content=content&menu_id=".$row_sitemap['menu_id'];
									}
								}
							?>
							<?php
							if($no % 3 == 1){
							?>	
							<div class="wrapSitemap">
						
							<?php
							}
							?>
							<div class="sitemap">
								<a href="<?= $sitemap_link?>" title="Achievement"><h2><?= $row_sitemap['menu_name']?></h2></a>
								<?php
								
								if($row_count_sitemap_child['jumlah_child'] > 0){
								?>
								<ul>
									<?php
									$query_sitemap_child = mysql_query("select * from menus where menu_parent_id = '".$row_sitemap['menu_id']."' and menu_level = '2'");
									while($row_sitemap_child = mysql_fetch_array($query_sitemap_child)){
										if($row_sitemap_child['menu_content_type'] == 1){
											$sitemap_child_link = $main_url.$row_sitemap_child['menu_url'];
										}else{
											$sitemap_child_link = $main_url."?page_content=content&menu_id=".$row_sitemap_child['menu_id'];
										}
									?>
									<li><a href="<?= $sitemap_child_link?>" title="History"><?= $row_sitemap_child['menu_name']?></a></li>
									<?php
									}
									?>
								</ul>
								<?php
								}
								?>
							
						</div>
						<?php
						if($no % 3 == 0){
						?>
						<div class="clear_fix"></div>
						</div>
							<?php
								}
								$no++;
							}

							$total = $no-1;
							if($total % 3 != 0){ ?>
							<div class="clear_fix"></div></div>
							<?php
							}

							?>
							
					
					</div>
				</div>
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->
