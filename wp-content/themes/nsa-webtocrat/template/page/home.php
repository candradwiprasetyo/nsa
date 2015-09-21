<div class="md-modal md-effect-1" id="modal-1">
			<div class="md-content">
				<h3>Newsletter</h3>
				<div class="content_overlay">
					

						<table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Name</th>
                                                <th>PDF</th>
                                              
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no_newsletter = 1;
                                           $query_newsletter = mysql_query("select *
															from newsletters a 
																order by newsletter_id
																");
                                            while($row_newsletter = mysql_fetch_array($query_newsletter)){
                                            ?>
                                            <tr>
                                            <td><?= $no_newsletter?></td>
                                                <td><?= $row_newsletter['newsletter_name'] ?></td>
                                                <td><a href="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row_newsletter['newsletter_img']?>" target="_blank" class="read_newsletter">Read</a></td>
                                                
                                               
                                            
                                            </tr>
                                            <?php
											$no_newsletter++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                         
                                    </table>


					
				</div>
				<br>
				<button class="md-close">CLOSE</button>
				<br>
			</div>
		</div>


	
	<div class="wrapHeader header_home rich_text">
		<div class="inner">


			<div class="select_level sl_2">
				<a href="?page_content=eg&eg_id=1" title="">
					<img class="imgmlhover" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/hoverlinksch1.jpg" alt="" />
					TODDLER / KINDERGARTEN
				</a>
			</div>


			<div class="select_level sl_3">
				<a href="?page_content=eg&eg_id=2" title="">
					<img class="imgmlhover" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/hoverlinksch2.jpg" alt="" />
					ELEMENTARY SCHOOL
				</a>
			</div>


			<div class="select_level sl_4">
				<a href="?page_content=eg&eg_id=3" title="">
					<img class="imgmlhover" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/hoverlinksch3.jpg" alt="" />
					JUNIOR HIGH SCHOOL
				</a>
			</div>


			<div class="select_level sl_5">
				<a href="?page_content=eg&eg_id=4" title="">
					<img class="imgmlhover" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/hoverlinksch4.jpg" alt="" />
					SENIOR HIGH SCHOOL
				</a>
			</div>


			<div class="bannerSlide">
				<div class="wrapin_banner">
							<?php
							
							$query_slider = mysql_query("select * from home_sliders order by slider_id");
							while($row_slider = mysql_fetch_array($query_slider)){
							?>
					<div class="in_banner">
						<div class="quote">
							<h4><?= $row_slider['slider_desc'] ?></h4>
						</div>
						<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row_slider['slider_img'] ?>" alt="" />
					</div>
					<?php
					}
					?>

				</div>
				<div id="nav_lt"></div>
			</div>
			<div class="select"><h1>Select <br />Level</h1></div>
			<div class="bannerred">&nbsp;</div>
			<div class="banneryellow"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/banneryellow.png" alt="" /></div>
			<div class="clear_fix"></div>
			<div class="textbanner"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/textbanner.png" alt="" /></div>
			<div class="star"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/star.png" alt="" /></div>
		</div>
	</div><!-- end.wrapTop -->

	<div class="wrapContent rich_text">

		<div class="blockcontent">
			<div class="latestUpdate">
				<div class="container">
                	<div class="col-md-4 col-md-offset-1"> 
						<div class="newshome">
						<div class="row" style="margin:10px 20px;">
                        
						<h1>Latest</h1>
						<h2>Update</h2>
						<?php
						
						$query = mysql_query("select * from news order by news_id desc limit 1 ");
						while($row = mysql_fetch_array($query)){
						
						
						?>
						<div class="image">
							<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row['news_img']?>" alt="" />
						</div>
						<div class="text">
							<h1><?= $row['news_name']?></h1>
							<br>
							<p>
								<?php
							$desc = explode(" ", $row['news_desc']);
							for($i=0;$i<=30;$i++){
							  echo $desc[$i]." ";
							}

							 ?>
							</p>
                            <div class="content_right">
                            <a class="more" href="<?php echo home_url(); ?>/?page_content=news&sub_page_id=<?= $row['news_id']?>" title="Studi Ekskursi">Read More</a>
                            </div>
						</div>
						
						<?php
						}
						?>
                        </div>
						</div>
                    </div>
                    
                    <div class="col-md-5"> 
						<div class="welcome">
                        
                            <div class="contentW">
                                <div class="photo">
                                    <?php
                                    $query_owner = mysql_query("select * from home_welcome_pages order by welcome_page_id desc limit 1 ");
                                    $row_owner = mysql_fetch_array($query_owner);
                                    ?>
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row_owner['welcome_page_img']?>" alt="Kresnayaha Yahya" />
                                </div>
                                <div class="quoteW">
                                    <p> <?= $row_owner['welcome_page_desc']?>
                                        <br /><br /> - <?= $row_owner['welcome_page_name']?> -</p>
                                </div>
                            </div>
						</div>
                    </div>
                    
					<div class="clear_fix"></div>
				</div>
				<div class="buble1"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/buble1.png" alt="" /></div>
				<div class="buble2"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/buble2.png" alt="" /></div>
			</div>
		</div>

		<div class="blockcontent">
			<div class="latestGallery">
				<div class="inner">
					<h1>Latest</h1>
					<h2>Gallery</h2>
					<div class="wrapGH">
						<?php

						$query_gallery = mysql_query("select * from home_galleries order by gallery_id ");
						while($row_gallery = mysql_fetch_array($query_gallery)){
							?>
                       
						<div class="galleryHome">
							<div class="galleryHomeIn">
								<a class="more moreGal" href="" title="View Lorem Ipsum Gallery">View</a>
								<div class="homeG overlaM">
									<h4><?= $row_gallery['gallery_desc'] ?></h4>
								</div>
								<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row_gallery['gallery_img'] ?>" alt="Lorem Ipsum" />
							</div>
						</div>
						


						<?php
						}
						?>


					</div>
					<div class="clear_fix"></div>
				</div>
			</div>
		</div>

		<div class="blockcontent">
			<div class="container">
				
                
                <div class="col-md-4 col-md-offset-1">
					<div class="newsletter">
						<h1>Join Our Newsletter</h1>
						
						
							<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/iconewsletter.png" alt="" />
							
						
						
						
						
							<form action="//jasaweb.us8.list-manage.com/subscribe/post?u=fd3c67d123284ea512d699f42&amp;id=7c4b89866e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	                         <div id="mc_embed_signup_scroll">
								<input class="text" type="email" placeholder="enter your email address.." name="EMAIL"  id="mce-EMAIL" required  style="width:100%;"/>
	                             <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
	                             
								
	                             <div style="position: absolute; left: -5000px;"><input type="text" name="b_fd3c67d123284ea512d699f42_7c4b89866e" tabindex="-1" value=""></div>
								 <div class="clear">

									<a href="#" class="md-trigger button_read_newsletter" data-modal="modal-1">Read Now</a>
								 	<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
	                             </div>
							</form>

						
					</div>
                    </div>
                
                    
					
                   <div class="col-md-6"> 
						<div class="col-xs-3"> 
                       
						<div class="linkaccess_new linkaccess_new1">
							<a href="#" title="">
								<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/icoa1.png" alt="" /><br />
								Inquiry Form
							</a>
						</div>
                       
                        </div>
                        <div class="col-xs-3"> 
						<div class="linkaccess_new linkaccess_new2">
							<a href="#" title="">
								<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/icoa2.png" alt="" /><br />
								E-Learning <br /> &nbsp;
							</a>
						</div>
                        </div>
                        <div class="col-xs-3"> 
						<div class="linkaccess_new linkaccess_new3" >
							<a href="#" title="">
								<img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/icoa3.png" alt="" /><br />
								Chat with NSA
							</a>
						</div>
                        </div>
					
                    </div>
					<div class="clear_fix"></div>
				</div>
			
		</div>
		
		<div class="blockcontent">
			<div class="allpartner">
				<div class="container">
					<div class="col-md-6 col-md-offset-1"> 
                        <div class="partnership">
                            <h1>Partnership :</h1>
                            <?php
    
                            $query_partnership = mysql_query("select * from home_partnerships order by partnership_id ");
                            while($row_partnership = mysql_fetch_array($query_partnership)){
                                ?>
                            <div class="col-xs-3">
                            	<div class="form-group">
                                <img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $row_partnership['partnership_img']?>" alt="" style="width:100%;" />
                                </div>
                            </div>
                            
                            <?php
                            }
                            ?>
                        </div>
					</div>
                    
                    <div class="col-md-3" style="padding:0px;"> 
                        <div class="addressSocmed">
                        <div class="col-md-12"> 
                        <div class="form-group"> 
                          <?php
    
                            $query_page_info = mysql_query("select * from home_page_infos limit 1");
                            $row_page_info = mysql_fetch_array($query_page_info);
                                ?>
                            <h1><?= $row_page_info['page_info_name'] ?></h1>
                            <h5><?= $row_page_info['page_info_address'] ?></h5>
                            <ul>
                                <li><h4>Follow Us :</h4></li>
                                <li><a href="<?= $row_page_info['page_info_facebook'] ?>" title=""><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/fb.png" alt="" /></a></li>
                                <li><a href="<?= $row_page_info['page_info_twitter'] ?>" title=""><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/tw.png" alt="" /></a></li>
                                <li><a href="<?= $row_page_info['page_info_youtube'] ?>" title=""><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/yt.png" alt="" /></a></li>
                            </ul>
                         </div>
                         </div>
                        </div>
                        <br />
					</div>
					<div class="clear_fix"></div>
				</div>
			</div>
		</div>
	</div><!-- end.wrapContent -->
   