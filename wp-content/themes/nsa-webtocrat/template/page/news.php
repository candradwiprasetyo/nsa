
		
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
					<li><a href="<?php echo home_url(); ?>/news-events" title="News & Events">News & Events</a></li>
				</ul>
			</div>
		</div>
		<div class="container">
			<div class="wrapcontentpage">
				<div class="col-md-3 col-md-offset-1">
					<div class="nsasubmenu bg_news">
						<img class="htp3" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunNewsEvents.png" alt="" />
						<!--<h1 class="htp1">Profile</h1>
						<ul>
							<li><a class="active" href="news-events" title="">News</a></li>
						</ul>-->
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>
				<div class="col-md-7">
					<h1>News & Events</h1>
					<h2></h2>

					<?php
					if(isset($_GET['sub_page_id'])){ 
							$query_detail = mysql_query("select * from news where news_id = '".$_GET['sub_page_id']."'");
							$row_detail = mysql_fetch_array($query_detail);
						?>

						<div class="col-md-10">
						<div class="bot_big">
							<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row_detail['news_img']?>" alt="" />
						</div>
						<h2><?= $row_detail['news_name'] ?></h2>
						<h6><?= $row_detail['news_date'] ?></h6>
						<p>
							<?= $row_detail['news_desc'] ?>
						</p>
						<a class="more" href="javascript:history.back()" title="">Back</a>
                        <div class="clear_fix"></div>
						<br>
						</div>

						<?php
					
					}else{
						
						$query = mysql_query("select * from news order by news_id desc ");
						while($row = mysql_fetch_array($query)){
						
						
						?>
					<div class="wrap_inner_content borderbot">
						<div class="col-md-3">
							<div class="bot">
								<a href="<?php echo home_url(); ?>/?page_content=news&sub_page_id=<?= $row['news_id']?>" title="Lorem Ipsum">
									<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row['news_img'] ?>" alt="" />
								</a>
							</div>
						</div>
						<div class="col-md-7">
							<a href="<?php echo home_url(); ?>/?page_content=news&sub_page_id=<?= $row['news_id']?>" title="Lorem Ipsum"><h2><?= $row['news_name'] ?></h2></a>
							<p>
								<?php
							$desc = explode(" ", $row['news_desc']);
							for($i=0;$i<=30;$i++){
							  echo $desc[$i]." ";
							}

							 ?>
							</p>
							<a class="more" href="<?php echo home_url(); ?>/?page_content=news&sub_page_id=<?= $row['news_id']?>" title="Read More">Read More</a>
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
