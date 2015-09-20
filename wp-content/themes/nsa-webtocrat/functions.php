<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: functions.php
	Location	: ../
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Theme functions and definitions
	
----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
	1.0 - Define Template name.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_define_template_name' ) ) {

	function webtocrat_define_template_name() {

		define( 'WEBTOCRAT_TEMPLATE_NAME', 'default' );

	}

	add_action( 'after_setup_theme', 'webtocrat_define_template_name' );
}


/**
----------------------------------------------------------------------------------------------------
	2.0 - Set content width.
----------------------------------------------------------------------------------------------------
*/
if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}

/**
----------------------------------------------------------------------------------------------------
	3.0 - Framework Path & variable path.
----------------------------------------------------------------------------------------------------
*/
define( 'WEBTOCRAT_FRAMEWORK_DIR', get_template_directory() 		. '/webtocrat' ); /* for calling function */
define( 'WEBTOCRAT_FRAMEWORK_URI', get_stylesheet_directory_uri()	. '/webtocrat' ); /* for calling css, img & js or similar file */

$variable_path = array('backend', 'frontend');


/**
----------------------------------------------------------------------------------------------------
	4.0 - CSS Path.
----------------------------------------------------------------------------------------------------
*/
define( 'WEBTOCRAT_CSS_DIR', WEBTOCRAT_FRAMEWORK_DIR . '/css' );
define( 'WEBTOCRAT_CSS_URI', WEBTOCRAT_FRAMEWORK_URI . '/css' );


/**
----------------------------------------------------------------------------------------------------
	5.0 - Fonts Path.
----------------------------------------------------------------------------------------------------
*/
define( 'WEBTOCRAT_FONTS_DIR', WEBTOCRAT_FRAMEWORK_DIR . '/fonts' );
define( 'WEBTOCRAT_FONTS_URI', WEBTOCRAT_FRAMEWORK_URI . '/fonts' );


/**
----------------------------------------------------------------------------------------------------
	6.0 - Function Path.
----------------------------------------------------------------------------------------------------
*/
define( 'WEBTOCRAT_FUNCTION_DIR', WEBTOCRAT_FRAMEWORK_DIR . '/functions' );
define( 'WEBTOCRAT_FUNCTION_URI', WEBTOCRAT_FRAMEWORK_URI . '/functions' );

foreach ($variable_path as $path) {
	define( 'WEBTOCRAT_FUNCTION_' . strtoupper($path) . '_DIR', WEBTOCRAT_FUNCTION_DIR . '/' . $path );
	define( 'WEBTOCRAT_FUNCTION_' . strtoupper($path) . '_URI', WEBTOCRAT_FUNCTION_URI . '/' . $path );
}


/**
----------------------------------------------------------------------------------------------------
	7.0 - Image Path.
----------------------------------------------------------------------------------------------------
*/
define( 'WEBTOCRAT_IMAGE_DIR', WEBTOCRAT_FRAMEWORK_DIR . '/img' );
define( 'WEBTOCRAT_IMAGE_URI', WEBTOCRAT_FRAMEWORK_URI . '/img' );

foreach ($variable_path as $path) {
	define( 'WEBTOCRAT_IMAGE_' . strtoupper($path) . '_DIR', WEBTOCRAT_IMAGE_DIR . '/' . $path );
	define( 'WEBTOCRAT_IMAGE_' . strtoupper($path) . '_URI', WEBTOCRAT_IMAGE_URI . '/' . $path );
}


/**
----------------------------------------------------------------------------------------------------
	8.0 - JS Path.
----------------------------------------------------------------------------------------------------
*/
define( 'WEBTOCRAT_JS_DIR', WEBTOCRAT_FRAMEWORK_DIR . '/js' );
define( 'WEBTOCRAT_JS_URI', WEBTOCRAT_FRAMEWORK_URI . '/js' );

foreach ($variable_path as $path) {
	define( 'WEBTOCRAT_JS_' . strtoupper($path) . '_DIR', WEBTOCRAT_JS_DIR . '/' . $path );
	define( 'WEBTOCRAT_JS_' . strtoupper($path) . '_URI', WEBTOCRAT_JS_URI . '/' . $path );
}


/**
----------------------------------------------------------------------------------------------------
	9.0 - Plugin Path.
----------------------------------------------------------------------------------------------------
*/
define( 'WEBTOCRAT_PLUGIN_DIR', WEBTOCRAT_FRAMEWORK_DIR . '/plugins' );
define( 'WEBTOCRAT_PLUGIN_URI', WEBTOCRAT_FRAMEWORK_URI . '/plugins' );


/**
----------------------------------------------------------------------------------------------------
	10.0 - Templates Path.
----------------------------------------------------------------------------------------------------
*/
define( 'WEBTOCRAT_TEMPLATES_DIR', WEBTOCRAT_FRAMEWORK_DIR . '/templates' );
define( 'WEBTOCRAT_TEMPLATES_URI', WEBTOCRAT_FRAMEWORK_URI . '/templates' );


/**
----------------------------------------------------------------------------------------------------
	11.0 - Theme Root Path.
----------------------------------------------------------------------------------------------------
*/
define( 'THEMEROOT',	get_stylesheet_directory_uri() );


/**
----------------------------------------------------------------------------------------------------
   12.0 - Load Functions.
----------------------------------------------------------------------------------------------------
*/
require_once( WEBTOCRAT_FUNCTION_BACKEND_DIR	. '/wp-setup.php' 		);
require_once( WEBTOCRAT_FUNCTION_DIR			. '/init-functions.php'	);

add_filter( 'wp_nav_menu_items','add_date', 10, 2 );
function add_date( $items, $args ) {
    if ( 'top-menu' == $args->theme_location ) {
		$form = '<div class="search">'.
				'<form action="'.site_url().'" method="get" role="search">'.
				'<input type="text" placeholder="search.." id="s" name="s" class="t">'.
				'<input type="submit" name="submit" value="search" class="s">'.
				'</form>'.
				'</div>';
        $items .= '<li>' . $form . '</li>';
    }
    return $items;
}