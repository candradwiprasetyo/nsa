<div class="wrapTop rich_text">
			<div class="second_menu" style="background:#F7931C !important;">
				<div class="inner">

					

	<ul id="menu-top-menu" class="top-menu">
		<?php
			$query_school_menu = mysql_query("select * from education_grade_menus where eg_id = '".$_GET['eg_id']."' order by egm_id");
			while($row_school_menu = mysql_fetch_array($query_school_menu)){
					
		?>
		<li id="" class="menu-item menu-item-type-post_type menu-item-object-page">
			<a title="Home" href="?page_content=<?= $row_school_menu['eg_link'] ?>&eg_id=<?= $_GET['eg_id']?>&egm_id=<?= $row_school_menu['egm_id']?>"><?= ucwords($row_school_menu['eg_name']); ?></a>
		</li>
		<?php
			}
		?>
	
</ul>


					<div class="clear_fix"></div>
				</div>
			</div>
		</div><!-- end.wrapTop -->


        <?php
            $q_school = mysql_query("select * from education_grade_home where eg_id = '".$_GET['eg_id']."'");
            $r_school = mysql_fetch_array($q_school);
                    
        ?>

	
	<div class="wrapHeader header_school rich_text">
		<div>
			
             <div class="col-md-3 col-md-offset-2"> 
            <div class="welcome_school2">
                            <div class="contentW_school2">
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $r_school['img2'] ?>" alt="Kresnayaha Yahya" />
                            </div>
			</div>
            
             <div class="welcome_school3">
                            <div class="contentW_school3">
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $r_school['img3'] ?>" alt="Kresnayaha Yahya" />
                            </div>
			</div>
            
            <div class="welcome_school4">
                            <div class="contentW_school4">
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $r_school['img4'] ?>" alt="Kresnayaha Yahya" />
                            </div>
			</div>
           
			
						<div class="welcome_school">
                        
                            <div class="contentW_school">
                                <div class="photo_school">
                                   
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $r_school['img1'] ?>" alt="Kresnayaha Yahya" />
                                </div>
                                
                            </div>
						</div>
                        </div>
                   
                   <div class="col-md-3 col-md-offset-1"> 
                       <div class="school_box" style="padding-top:50px;">
                      
                            <div class="school_title">
                                Introduction

                            </div>
                            
                            <div class="school_subtitle"> <?= $r_school['introduction_name'] ?></div>
                            <div class="school_content"><?= $r_school['introduction_content'] ?></div>
                       </div>
                   </div>
                   
              
		</div>
	</div><!-- end.wrapTop -->

	<div class="wrapContent rich_text">

		<div class="blockcontent">
			<div class="latestUpdate">
				<div class="container">
                
                	 <div class="col-md-3 col-md-offset-2"> 
                       <div class="school_box">
                            <div class="school_title">Testimoni</div>
                            
                            <div class="school_content"><?= $r_school['testimoni_content'] ?></div>
						<div class="school_by"> <?= $r_school['testimoni_name'] ?></div>
                       </div>
                   </div>
                	
                    <div class="col-md-5 col-md-offset-1"> 
						
                        <div class="welcome_school_bottom">
                        
                            <div class="contentW_school_bottom">
                                <div class="photo_school_bottom">
                                   
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $r_school['testimoni_img'] ?>" alt="Kresnayaha Yahya" />
                                </div>
                                
                            </div>
						</div>
                        
                    </div>
                    
					<div class="clear_fix"></div>
				</div>
				
			</div>
		</div>

		
		<?php
            $q_eg = mysql_query("select * from education_grades where eg_id = '".$_GET['eg_id']."'");
            $r_eg = mysql_fetch_array($q_eg);

            $footer_img = $r_eg['eg_footer_img'];
        ?>
		<div class="blockcontent">
            <div class="background_content_new" style="background: url('<?php echo home_url(); ?>/wp-content/uploads/images/education_grade/<?= $footer_img?>')">
			
				    <div class="container">
					    <div class="col-md-12 col-md-offset-1"> 
                            <div class="row" >
                                <div class="title_content_new">Program</div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-1"> 
                            <div class="row">
                                <div class="circle_content_new"><?= $r_school['program1'] ?></div>
                            </div>
                        </div>
                        <div class="col-md-2"> 
                            <div class="row">
                                <div class="circle_content_new"><?= $r_school['program2'] ?></div>
                            </div>
                        </div>
                        <div class="col-md-2"> 
                            <div class="row">
                                <div class="circle_content_new"><?= $r_school['program3'] ?></div>
                            </div>
                        </div>
                        <div class="col-md-2"> 
                            <div class="row">
                                <div class="circle_content_new"><?= $r_school['program4'] ?></div>
                            </div>
                        </div>

					</div>
					<div class="clear_fix"></div>
			</div>
			
		</div>
	</div><!-- end.wrapContent -->
   