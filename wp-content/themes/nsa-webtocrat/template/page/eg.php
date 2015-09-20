<div class="wrapTop rich_text">
			<div class="second_menu" style="background:#F7931C !important;">
				<div class="inner">

					

	<ul id="menu-top-menu" class="top-menu">
		<?php
			$query_school_menu = mysql_query("select * from education_grade_menus where eg_id = '".$_GET['eg_id']."' order by egm_id");
			while($row_school_menu = mysql_fetch_array($query_school_menu)){
					
		?>
		<li id="" class="menu-item menu-item-type-post_type menu-item-object-page">
			<a title="Home" href="?page_content=<?= $row_school_menu['eg_link'] ?>&eg_id=<?= $_GET['eg_id']?>"><?= ucwords($row_school_menu['eg_name']); ?></a>
		</li>
		<?php
			}
		?>
	
</ul>


					<div class="clear_fix"></div>
				</div>
			</div>
		</div><!-- end.wrapTop -->




	
	<div class="wrapHeader header_school rich_text">
		<div>
			
             <div class="col-md-3 col-md-offset-2"> 
            <div class="welcome_school2">
                            <div class="contentW_school2">
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/school1.jpg" alt="Kresnayaha Yahya" />
                            </div>
			</div>
            
             <div class="welcome_school3">
                            <div class="contentW_school3">
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/school1.jpg" alt="Kresnayaha Yahya" />
                            </div>
			</div>
            
            <div class="welcome_school4">
                            <div class="contentW_school4">
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/school4.png" alt="Kresnayaha Yahya" />
                            </div>
			</div>
           
			
						<div class="welcome_school">
                        
                            <div class="contentW_school">
                                <div class="photo_school">
                                    <?php
                                    $query_owner = mysql_query("select * from home_welcome_pages order by welcome_page_id desc limit 1 ");
                                    $row_owner = mysql_fetch_array($query_owner);
                                    ?>
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/school1.jpg" alt="Kresnayaha Yahya" />
                                </div>
                                
                            </div>
						</div>
                        </div>
                   
                   <div class="col-md-3 col-md-offset-1"> 
                       <div class="school_box" style="padding-top:50px;">
                      
                            <div class="school_title">
                                Introduction

                            </div>
                            
                            <div class="school_subtitle"> "Model Pembelajaran Tematik"</div>
                            <div class="school_content">Berbasis Multiple Intelligence yang
mengedepankan pada pengembangan
bakat, minat, dan kemampuan anak di segala
bidang, sehingga tercipta suasana belajar
yang interaktif, dan berfokus pada minat
belajar anak.</div>
                       </div>
                   </div>
                   
              
		</div>
	</div><!-- end.wrapTop -->

	<div class="wrapContent rich_text">

		<div class="blockcontent">
			<div class="latestUpdate">
				<div class="container">
                
                	 <div class="col-md-3 col-md-offset-2"> 
                       <div class="school_box2">
                            <div class="school_title">Testimoni</div>
                            
                            <div class="school_content">" I come from a small city in East Java called
Magetan. I am so glad my parents decided to 
send me to YPPI. I am taught by teachers
from many countries and learning to speak
three language and made lots of new
friends "</div>
						<div class="school_by"> Nation Star Academy (Preschool)</div>
                       </div>
                   </div>
                	
                    <div class="col-md-5 col-md-offset-1"> 
						
                        <div class="welcome_school_bottom">
                        
                            <div class="contentW_school_bottom">
                                <div class="photo_school_bottom">
                                    <?php
                                    $query_owner = mysql_query("select * from home_welcome_pages order by welcome_page_id desc limit 1 ");
                                    $row_owner = mysql_fetch_array($query_owner);
                                    ?>
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/school1.jpg" alt="Kresnayaha Yahya" />
                                </div>
                                
                            </div>
						</div>
                        
                    </div>
                    
					<div class="clear_fix"></div>
				</div>
				
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
   