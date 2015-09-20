<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: customizing.php
	Location	: ../functions/redux/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Add a custom admin function
	
----------------------------------------------------------------------------------------------------

	Table Of Contents
	
	1.0 - Remove Demo Mode Link
	2.0 - Adding Another Icon Web Font to the Panel

----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
	1.0 - Remove Demo Mode Link
----------------------------------------------------------------------------------------------------
*/
function webtocrat_removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'webtocrat_removeDemoModeLink');


/**
----------------------------------------------------------------------------------------------------
	2.0 - Adding Another Icon Web Font to the Panel
----------------------------------------------------------------------------------------------------
*/
function webtocrat_newIconFont() {
    // Uncomment this to remove elusive icon from the panel completely
    //wp_deregister_style( 'redux-elusive-icon' );
    //wp_deregister_style( 'redux-elusive-icon-ie7' );
 
	/* font awesome */
    $font_url = get_stylesheet_directory_uri() . '/webtocrat/fonts';
    if ( isset($font_url) && !empty($font_url) ) {
        wp_register_style(
            'redux-font-awesome',
            $font_url . '/font-awesome/css/font-awesome.min.css',
            array(),
            time(),
            'all'
        ); 
        wp_enqueue_style( 'redux-font-awesome' );
    }
}
add_action( 'admin_init', 'webtocrat_newIconFont' );