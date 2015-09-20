
		
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
					<li><a href="<?php echo home_url(); ?>/achievement" title="Achievement">Achievement</a></li>
					<li class="arrow">&nbsp;</li>
					<li><a href="<?php echo home_url(); ?>/achievement" title="2015">2015</a></li>
				</ul>
			</div>
		</div>
		<div class="container">
			<div class="wrapcontentpage">

				<div class="col-md-3 col-md-offset-1">
					<div class="nsasubmenu bg_achieve">
						<br>
						<img class="htp3" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunAchieve.png" alt="" />
						<!--<h1 class="htp1">Profile</h1>
						<ul>
							<li><a class="active" href="<?php echo home_url(); ?>/achievement/" title="Achievement 2015">2015</a></li>
						</ul>-->
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>

				<div class="col-md-7">
					<h1>Achievement</h1>
					<h2></h2>
					<?php
					
					if(isset($_GET['sub_page_id'])){ 
							$query_detail = mysql_query("select * from achievements where achievement_id = '".$_GET['sub_page_id']."'");
							$row_detail = mysql_fetch_array($query_detail);
						?>

						<div class="col-md-10">
						<div class="bot_big">
							<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row_detail['achievement_img']?>" alt="" />
						</div>
						<h2><?= $row_detail['achievement_name'] ?></h2>
						<h6><?= $row_detail['achievement_date'] ?></h6>
						<p>
							<?= $row_detail['achievement_desc'] ?>
						</p>
                        
						<a class="more" href="<?php echo home_url(); ?>/?page_content=achievement" title="">Back</a>
						<div class="clear_fix"></div>
                        <br>
						</div>

						<?php
					
					}else{
						
						$query = mysql_query("select * from achievements order by achievement_id desc ");
						while($row = mysql_fetch_array($query)){
						
						
						?>
					<div class="wrap_inner_content borderbot">
						<div class="col-md-3">
							<div class="bot">
								<a href="<?php echo home_url(); ?>/?page_content=achievement&sub_page_id=<?= $row['achievement_id']?>" title="Lorem Ipsum">
									<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row['achievement_img'] ?>" alt="" />
								</a>
							</div>
						</div>
						<div class="col-md-7">
							<a href="<?php echo home_url(); ?>/?page_content=achievement&sub_page_id=<?= $row['achievement_id']?>" title="Lorem Ipsum"><h2><?= $row['achievement_name'] ?></h2></a>
							<p>
								<?php
							$desc = explode(" ", $row['achievement_desc']);
							for($i=0;$i<=30;$i++){
							  echo $desc[$i]." ";
							}

							 ?>
							</p>
							<a class="more" href="<?php echo home_url(); ?>/?page_content=achievement&sub_page_id=<?= $row['achievement_id']?>" title="Read More">Read More</a>
						</div>
						<div class="clear_fix"></div>
					</div>

					<?php
					}
				}
					?>

				</div>
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->
