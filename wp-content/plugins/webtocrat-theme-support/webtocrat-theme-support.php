<?php

/**

----------------------------------------------------------------------------------------------------

  Plugin Name: Webtocrat Theme Support
  Plugin URL: http://webtocrat.com/
  Description: Includes all functionality support for Webtocrat Framework.
  Version: 1.0.0
  Author    : BAS - Webtocrat Motion
  Author URI: http://webtocrat.com/
  
----------------------------------------------------------------------------------------------------

  Table Of Contents
  
  1.0 - Define Constants.
  2.0 - Require Files.
  3.0 - Admin Enqueue Scripts.

----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
  1.0 - Define Constants.
----------------------------------------------------------------------------------------------------
*/
define( 'WEBTOCRAT_PLUGINS_DIR', plugin_dir_path( __FILE__ ) );/* for calling function */
define( 'WEBTOCRAT_PLUGINS_URI', plugin_dir_url(  __FILE__ ) );/* for calling css, img & js or similar file */

/**
    Functions
 */
define( 'WEBTOCRAT_FUNCTIONS_DIR',  WEBTOCRAT_PLUGINS_DIR . 'functions' );
define( 'WEBTOCRAT_FUNCTIONS_URI',  WEBTOCRAT_PLUGINS_URI . 'functions' );

/**
    Images 
 */
define( 'WEBTOCRAT_PLUGINS_IMAGES', WEBTOCRAT_PLUGINS_URI . 'img'       );

/**
    CSS 
 */
define( 'WEBTOCRAT_PLUGINS_CSS',    WEBTOCRAT_PLUGINS_URI . 'css'       );

/**
    Scripts 
 */
define( 'WEBTOCRAT_PLUGINS_JS',     WEBTOCRAT_PLUGINS_URI . 'js'       );


/**
----------------------------------------------------------------------------------------------------
  2.0 - Require Files.
----------------------------------------------------------------------------------------------------
*/
require_once( 'functions/functions.php' );


/**
----------------------------------------------------------------------------------------------------
  3.0 - Admin Enqueue Scripts.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_admin_enqueue_scripts' ) ) {

    function webtocrat_admin_enqueue_scripts() {

        wp_enqueue_style(  'webtocrat-plugin-admin-styles', WEBTOCRAT_PLUGINS_CSS . '/style-admin.min.css', array(), null, 'all' );
        wp_enqueue_script( 'webtocrat-plugin-scripts',      WEBTOCRAT_PLUGINS_JS  . '/min/scripts.min.js',  array(), null, true  );

    }

    add_action( 'admin_enqueue_scripts', 'webtocrat_admin_enqueue_scripts', 100 );
}