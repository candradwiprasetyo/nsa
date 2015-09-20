<?php
include 'template/conf.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"  />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<?php
	global $redux_webtocrat;
	echo ( !empty($redux_webtocrat['google-meta']) ) ? $redux_webtocrat['google-meta'] . "\n" : '';
	echo ( !empty($redux_webtocrat['bing-meta']) )   ? $redux_webtocrat['bing-meta']   . "\n" : '';
	echo ( !empty($redux_webtocrat['alexa-meta']) )  ? $redux_webtocrat['alexa-meta']  . "\n" : '';

	$favicon = ( !empty($redux_webtocrat['favicon']['url'])) ? $redux_webtocrat['favicon']['url'] : WEBTOCRAT_IMAGE_URI . '/favicon.ico';
	$logo    = (!empty($redux_webtocrat['logo']['url'])) ? $redux_webtocrat['logo']['url'] 		  : WEBTOCRAT_IMAGE_URI . '/logo.png';
	?>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $favicon; ?>">
	<?php wp_head(); ?>
  <link href="wp-content/themes/nsa-webtocrat/webtocrat/css/bootstrap.min.css" rel="stylesheet">
</head>
<body <?php body_class(); ?>>

	<div class="wrapall">
		
		<div class="wrapTop rich_text">
			<div class="second_menu">
				<div class="inner">

					<div class="logo">
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
							<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>"/>
						</a>
					</div>

					<?php
					/*
						// Top Menu
						wp_nav_menu( array(
							'theme_location'    => 'top-menu',
							'depth'             => 1,
							'container'         => false,
							'menu_class'        => 'top-menu',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker()
						) );

						// Main Menu
						wp_nav_menu( array(
							'theme_location'    => 'main-menu',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'main_menu navigasi',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker()
						) );
						*/

					?>
	<ul id="menu-top-menu" class="top-menu">
		<?php
			$query_top_menu = mysql_query("select * from menus where menu_type = '1' and menu_active_status = '1' limit 5");
			while($row_top_menu = mysql_fetch_array($query_top_menu)){
					if($row_top_menu['menu_content_type'] == 1){
						$top_link = $main_url.$row_top_menu['menu_url'];
					}else{
						$top_link = $main_url."?page_content=content&menu_id=".$row_top_menu['menu_id'];
					}
		?>
		<li id="" class="menu-item menu-item-type-post_type menu-item-object-page">
			<a title="Home" href="<?= $top_link ?>"><?= ucwords($row_top_menu['menu_name']); ?></a>
		</li>
		<?php
			}
		?>
	<li><div class="search"><form action="http://localhost/download_nsa" method="get" role="search"><input type="text" placeholder="search.." id="s" name="s" class="t"><input type="submit" name="submit" value="search" class="s"></form></div></li>
</ul>

<!--

<ul id="menu-main-menu" class="main_menu navigasi">
	<li id="" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  sub dropdown"><a title="Profile" href="#" data-toggle="dropdown" class="dropdown-toggle">Profile <i class="fa fa-angle-down r"></i></a>
	<ul role="menu" class=" submenu dropdown-menu">
		<li id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85"><a title="History 2" href="http://localhost/download_nsa/?page_id=52">History 2</a></li>
		<li id="menu-item-87" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-87"><a title="Values" href="http://localhost/download_nsa/?page_id=54">Values</a></li>
		<li id="menu-item-86" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-86"><a title="Vision &amp; Mission" href="http://localhost/download_nsa/?page_id=53">Vision &#038; Mission</a></li>
		<li id="menu-item-88" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-88"><a title="Board of Trustees" href="http://localhost/download_nsa/?page_id=55">Board of Trustees</a></li>
		<li id="menu-item-90" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-90"><a title="Management" href="http://localhost/download_nsa/?page_id=60">Management</a></li>
		<li id="menu-item-89" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-89"><a title="GM &amp; Division" href="http://localhost/download_nsa/?page_id=61">GM &#038; Division</a></li>
	</ul>
</li>
<li id="menu-item-91" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-91"><a title="Achievement" href="http://localhost/download_nsa/?page_id=62">Achievement</a></li>
<li id="menu-item-92" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-92"><a title="Academic" href="http://localhost/download_nsa/?page_id=63">Academic</a></li>
<li id="menu-item-97" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-97"><a title="News &amp; Events" href="http://localhost/download_nsa/?page_id=95">News &#038; Events</a></li>
<li id="menu-item-93" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-93"><a title="Admission" href="http://localhost/download_nsa/?page_id=71">Admission</a></li>
<li id="menu-item-94" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-94"><a title="Parents Corner" href="http://localhost/download_nsa/?page_id=72">Parents Corner</a></li>
</ul>

-->


<ul id="menu-main-menu" class="main_menu navigasi">
	<?php
	$query_count_main_menu = mysql_query("select count(menu_id) as jumlah from menus where menu_type = '2' and menu_active_status = '1' and menu_level = '1'");
	$row_count_main_menu = mysql_fetch_array($query_count_main_menu);
	if($row_count_main_menu['jumlah'] > 6){
		$limit = " limit 5";
	}else{
		$limit = "";
	}
	$query_main_menu = mysql_query("select * from menus where menu_type = '2' and menu_active_status = '1' and menu_level = 1 order by menu_id $limit");
	while($row_main_menu = mysql_fetch_array($query_main_menu)){
	
	$query_child = mysql_query("select count(menu_id) as jumlah_child from menus where menu_parent_id = '".$row_main_menu['menu_id']."' and menu_active_status = '1' and menu_level = '2'");
	$row_child = mysql_fetch_array($query_child);

	?>
	<?php
	if($row_main_menu['menu_content_type'] == 1){
		if($row_child['jumlah_child'] > 0){
			$link = "#";
			$add_class = " menu-item-has-children  sub dropdown ";
		}else{
			$link = $row_main_menu['menu_url'];
			$add_class = "";
		}
	}else{
		if($row_child['jumlah_child'] > 0){
			$link = "#";
			$add_class = " menu-item-has-children  sub dropdown ";
		}else{
			$link = "?page_content=content&menu_id=".$row_main_menu['menu_id'];
			$add_class = "";
		}
	}
	?>
	<li id="" class="menu-item menu-item-type-post_type menu-item-object-page <?= $add_class?>"><a title="<?= $row_main_menu['menu_name']?>" href="<?= $link?>"><?= ucwords($row_main_menu['menu_name']) ?></a>

	<?php
	if($row_child['jumlah_child'] > 0){ ?>
		<ul role="menu" class=" submenu dropdown-menu">
			<?php
			$query_main_child = mysql_query("select * from menus where menu_parent_id = '".$row_main_menu['menu_id']."' and menu_active_status = '1' and menu_level = '2'");
				while($row_main_child = mysql_fetch_array($query_main_child)){
					if($row_main_child['menu_content_type'] == 1){
						$child_link = $row_main_child['menu_url'];
					}else{
						$child_link = "?page_content=content&menu_id=".$row_main_child['menu_id'];
					}
			?>
			<li id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85"><a title="<?= $row_main_child['menu_name']?>" href="<?= $child_link?>"><?= ucwords($row_main_child['menu_name']) ?></a></li>
			<?php
				}
			?>
		</ul>
	<?php
	}
	?>
		</li>


<?php
}
?>


<?php
		if($row_count_main_menu['jumlah'] > 6){
		?>
		<li id="menu-item-84" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-84 sub dropdown"><a title="More" href="#">More</a>
			<ul role="menu" class=" submenu dropdown-menu">
			<?php
			$query_main_menu_more = mysql_query("select * from menus where menu_type = '2' and menu_active_status = '1' and menu_level = 1 order by menu_id limit 5, 1000");
			while($row_main_menu_more = mysql_fetch_array($query_main_menu_more)){
				if($row_main_menu_more['menu_content_type'] == 1){
					$more_link = $row_main_menu_more['menu_url'];
				}else{
					$more_link = "?page_content=content&menu_id=".$row_main_menu_more['menu_id'];
				}
			?>
			<li id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85"><a title="<?= $row_main_menu_more['menu_name']?>" href="<?= $more_link?>"><?= ucwords($row_main_menu_more['menu_name']) ?></a></li>
			
			<?php 
			}
			?>
			</ul>
		</li>
		<?php
		}
		?>

</ul>



					<div class="clear_fix"></div>
				</div>
			</div>
		</div><!-- end.wrapTop -->