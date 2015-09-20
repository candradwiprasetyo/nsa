
		
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
					<li><a href="<?php echo home_url(); ?>/contact-us" title="Contact Us">Contact Us</a></li>
				</ul>
			</div>
		</div>
		<div class="inner">
			<div class="wrapcontentpage">
				<div class="leftside">
					<div class="nsasubmenu bg_career">
						<img class="htp3" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunContact.png" alt="" />
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>
				<div class="rightside">
					<div class="wrap_inner_content">
						<div class="wrapContact">
							<div class="contact">
								<?php
								
								$query = mysql_query("select * from manual_pages where page_id = '2' ");
								$row = mysql_fetch_array($query);
								
								
								?>
								
								<?= $row['page_desc'] ?>

							</div>
						</div>
					</div>
				</div>
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="maps">
			<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=id&amp;geocode=&amp;q=Surabaya,+Jawa+Timur,+Indonesia&amp;aq=0&amp;oq=surabaya&amp;sll=37.0625,-95.677068&amp;sspn=39.86519,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Surabaya,+Jawa+Timur,+Indonesia&amp;t=m&amp;z=12&amp;ll=-7.289166,112.734398&amp;output=embed"></iframe>
		</div>
		<div class="inner">
			<div class="inquiry">
				<h1>Inquiry Form</h1>
				<h2></h2>
				<?php echo do_shortcode('[contact-form-7 id="81" title="Inquiry Form"]'); ?>
				<div class="clear_fix"></div>
			</div>
		</div>
	</div><!-- end.wrapContent -->

