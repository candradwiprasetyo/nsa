
	<div class="wrapHeader rich_text">
		<div class="headerpage">
			<img src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/header1.jpg" alt="" />
		</div>
	</div><!-- end.wrapTop -->
		
	<div class="wrapContent rich_text">

		<div class="wrapbreadcrumb">
			<div class="inner">
				<ul class="breadcrumb">
					<li><a class="homeb" href="<?php echo home_url(); ?>/" title="">&nbsp;</a></li>
					<li class="arrow">&nbsp;</li>
					<li><a href="<?php echo home_url(); ?>/admission" title="Admission">Admission</a></li>
				</ul>
			</div>
		</div>

		<div class="inner">
			<div class="wrapcontentpage">

				<div class="leftside">
					<div class="nsasubmenu bg_admission">
						<img class="htp3" src="<?php echo home_url(); ?>/wp-content/uploads/2015/07/sunAdmission.png" alt="" />
					</div>
					<div class="nsaleft"><img src="<?php echo WEBTOCRAT_IMAGE_URI; ?>/bannergreen.png" alt="" /></div>
				</div>

				<div class="rightside">
					<h1>Admission</h1>
					<h2></h2>
					<div class="wrap_inner_content">
						<div class="Ad_big">
							<div class="textAd">
								<?php
                                $q_adm1 = mysql_query("select * from admissions where admission_id = '1' limit 1");
								$r_adm1 = mysql_fetch_array($q_adm1);
								?>
                                <h1><?= $r_adm1['admission_name'] ?></h1>
								
								<p> <?php
                                $desc = explode(" ", $r_adm1['admission_desc']);
								$jumlah = count($desc);
								$limit = ($jumlah < 50) ? $limit = $jumlah : $limit = 50;
								
								for($d=0; $d<=$limit-1; $d++){
									if($desc[$d]){
										echo $desc[$d]." ";	
									}
								}
								?></p>
								<a class="more" href="<?php echo home_url(); ?>/?page_content=admission_detail&id=<?= $r_adm1['admission_id']?>" title="">Read More</a>
							</div>
							<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $r_adm1['admission_img'] ?>" alt="" />
						</div>
					</div>
				</div>

				<div class="clear_fix"></div>

				<div class="wrap_Adsmall">
                	<?php
                    $q_adm2 = mysql_query("select * from admissions where admission_id <> '1' order by admission_id limit 3");
					while($r_adm2 = mysql_fetch_array($q_adm2)){
					?>
					<div class="Adsmall">
						<h1><?= $r_adm2['admission_name'] ?></h1>
						<a class="more" href="<?php echo home_url(); ?>/?page_content=admission_detail&id=<?= $r_adm2['admission_id']?>" title="">Read More</a>
						<img src="<?php echo home_url(); ?>/wp-content/uploads/images/<?= $r_adm2['admission_img'] ?>" alt="" />
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
