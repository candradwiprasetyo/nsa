		<?php
            $q_eg = mysql_query("select * from education_grades where eg_id = '".$_GET['eg_id']."'");
            $r_eg = mysql_fetch_array($q_eg);

            $header_img = $r_eg['eg_header_img'];
        ?>
	<div class="wrapHeader rich_text">
		<div class="headerpage">
			<img src="<?php echo home_url(); ?>/wp-content/uploads/images/education_grade/<?= $header_img ?>" alt="" />
		</div>
	</div><!-- end.wrapTop -->
		
	<div class="wrapContent rich_text">
		
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
		
		<?php
						
						$query = mysql_query("select * from education_grade_curriculum where eg_id = '".$_GET['eg_id']."' ");
						$row = mysql_fetch_array($query);
						
						
						?>

			<div class="wrapcontentpage">
            <div class="container">
				<div class="col-md-3 col-md-offset-1">
                
					<div class="nsasubmenu bg_profile bg_profile_new">
						<h1 class="htp_new">Curriculum</h1>
						
					</div>
					
				</div>
				<div class="col-md-6">
					<div class="wrap_inner_content">

						

						<div class="box_career borderbot">
							
							<h2>Curriculum</h2>
							<p><?= $row['content'] ?></p>
						
						</div>
						
					</div>
				</div>
				<div class="clear_fix"></div>
			</div>
		</div>
		<div class="ornamentP"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/ornamentP.png" alt="" /></div>
	</div><!-- end.wrapContent -->
