<?php
/**
Template Name: Page - Home
*/

get_header(); ?>

	<?php


    
						  $page_content = $_GET['page_content'];
						  if($page_content){
							include ('page/'.$page_content.".php");	
						  } else {
						  	require_once("page/home.php");
						  }
						

	?>

<?php get_footer(); ?>