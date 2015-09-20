<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: wp-setup.php
	Location	: ../webtocrat/functions/backend/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: WP Custom Function
	
----------------------------------------------------------------------------------------------------

	Table Of Contents
	
	1.0 - Setup theme support.
	2.0 - Register Menu.
	3.0 - Register Sidebar.
	4.0 - Make the theme available for translation.

----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
	1.0 - Setup theme support.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_theme_setup' ) ) {

	function webtocrat_theme_setup() {

		// Add support for post formats.
		add_theme_support( 'post-formats',
			array(
				// 'aside',
				'audio',
				// 'chat'
				'gallery',
				'image',
				// 'link',
				'quote',
				// 'status',
				'video',
			)
		);		

		// Add support for automatic feed links.
		add_theme_support( 'automatic-feed-links' );

		// Add support for post thumbnails.
		add_theme_support( 'post-thumbnails' );
		// add_image_size( 'doctor-thumb', 100, 100, true ); //(cropped)
		
		// Add support for woocommerce.
		// add_theme_support( 'woocommerce' );

		// Add support for custom background.
		add_theme_support( 'custom-background' );
    	remove_theme_support( 'custom-background' ) ;

		// Add support for custom header.
		add_theme_support( 'custom-header' );
    	remove_theme_support( 'custom-header' ) ;

		// Add support for Title Tag - added since wordpress 4.1
    	add_theme_support( 'title-tag' );

	}

	add_action( 'after_setup_theme', 'webtocrat_theme_setup' );
}

// Backwards Compatibility - Title Tag - added since wordpress 4.1
if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function theme_slug_render_title() {
 		?><title><?php wp_title( '|', true, 'right' ); ?></title><?php 
	}

	add_action( 'wp_head', 'theme_slug_render_title' );
}


/**
----------------------------------------------------------------------------------------------------
	2.0 - Register Menu.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_register_menus' ) ) {

	function webtocrat_register_menus() {
	  register_nav_menus(
		array(
			'top-menu'       => __( 'Top Menu','webtocrat' ),
			'main-menu'      => __( 'Main Menu','webtocrat' )
		)
	  );
	}
	
	add_action( 'init', 'webtocrat_register_menus' );
}


/**
----------------------------------------------------------------------------------------------------
	3.0 - Register Sidebar.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_widgets_init' ) ) {

	function webtocrat_widgets_init() {

		register_sidebar(array(
				'id'            => 'main_sidebar',
				'name'          => 'Main Sidebar',
				'description'   => __( 'Used on every page.','webtocrat' ),
				'before_widget' => '<div id="%1$s" class="%2$s wow fadeInUp">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));

		register_sidebar(array(
				'id'            => 'footer1',
				'name'          => 'Footer #1 Column',
				'description'   => __( 'Used on every Footer.','webtocrat' ),
				'before_widget' => '<div id="%1$s" class="%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));

		register_sidebar(array(
				'id'            => 'footer2',
				'name'          => 'Footer #2 Column',
				'description'   => __( 'Used on every Footer.','webtocrat' ),
				'before_widget' => '<div id="%1$s" class="%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));

		register_sidebar(array(
				'id'            => 'footer3',
				'name'          => 'Footer #3 Column',
				'description'   => __( 'Used on every Footer.','webtocrat' ),
				'before_widget' => '<div id="%1$s" class="%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));

		register_sidebar(array(
				'id'            => 'footer4',
				'name'          => 'Footer #4 Column',
				'description'   => __( 'Used on every Footer.','webtocrat' ),
				'before_widget' => '<div id="%1$s" class="%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));

	}

	add_action( 'widgets_init', 'webtocrat_widgets_init' );
}


/**
----------------------------------------------------------------------------------------------------
	4.0 - Make the theme available for translation.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_translate_theme' ) ) {

	function webtocrat_translate_theme() {
	    // Load Theme textdomain
	    load_theme_textdomain('webtocrat', WEBTOCRAT_FRAMEWORK_DIR . '/languages');

	    // Include Theme text translation file
	    $locale = get_locale();
	    $locale_file = WEBTOCRAT_FRAMEWORK_DIR . "/languages/$locale.php";
	    if ( is_readable( $locale_file ) ) {
	        require_once( $locale_file );
	    }
	}
	add_action( 'after_setup_theme', 'webtocrat_translate_theme' );
}