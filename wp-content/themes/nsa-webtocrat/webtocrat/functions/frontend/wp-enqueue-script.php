<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: wp-enqueue-script.php
	Location	: ../webtocrat/functions/frontend/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Enqueue scripts/styles to your site
	
----------------------------------------------------------------------------------------------------

	Table Of Contents
	
	1.0 - Register Scripts.
	2.0 - Enqueue Function.
	
----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
	1.0 - Register Scripts.
----------------------------------------------------------------------------------------------------
*/
if( ! function_exists( 'webtocrat_scripts' ) ) {

	function webtocrat_scripts() {

		/**
		ENQUEUE CSS
		*/
	
		wp_enqueue_style( 'webtocrat-main-style',		THEMEROOT			.	'/style.css',			array(), null, 'all' );
		wp_enqueue_style( 'webtocrat-style',			WEBTOCRAT_CSS_URI	.	'/style.css',			array(), null, 'all' );
		wp_enqueue_style( 'webtocrat-jquery.bxslider',	WEBTOCRAT_CSS_URI	.	'/jquery.bxslider.css',	array(), null, 'all' );
		wp_enqueue_style( 'webtocrat-prettyPhoto',		WEBTOCRAT_CSS_URI	.	'/prettyPhoto.css',		array(), null, 'all' );
		wp_enqueue_style( 'webtocrat-media-query',		WEBTOCRAT_CSS_URI	.	'/media-query.css',		array(), null, 'all' );


		/**
		
		ENQUEUE JS

		*/
		wp_enqueue_script( 'jquery' );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_register_script( 'webtocrat-modernizr',	WEBTOCRAT_JS_URI .	'/modernizr.custom.js', array(), null, true );
		wp_register_script( 'webtocrat-yppi', 		WEBTOCRAT_JS_URI .	'/yppi.js', array(), null, true );
		wp_register_script( 'webtocrat-cycle',		WEBTOCRAT_JS_URI .	'/jquery.cycle.all.2.74.js', array(), null, true );
		wp_register_script( 'webtocrat-bxslider',	WEBTOCRAT_JS_URI .	'/jquery.bxslider.js', array(), null, true );
		wp_register_script( 'webtocrat-easing',		WEBTOCRAT_JS_URI .	'/jquery.easing.1.3.js', array(), null, true );
		wp_register_script( 'webtocrat-prettyPhoto', WEBTOCRAT_JS_URI . '/jquery.prettyPhoto.js', array(), null, true );

		wp_enqueue_script( 'webtocrat-modernizr' );
		wp_enqueue_script( 'webtocrat-cycle' );
		wp_enqueue_script( 'webtocrat-bxslider' );
		wp_enqueue_script( 'webtocrat-easing' );
		wp_enqueue_script( 'webtocrat-prettyPhoto' );
		wp_enqueue_script( 'webtocrat-yppi' );

	}

	add_action( 'wp_enqueue_scripts', 'webtocrat_scripts', 9999 );
}


/**
----------------------------------------------------------------------------------------------------
	2.0 - Enqueue Function.
----------------------------------------------------------------------------------------------------
*/
if( ! function_exists( 'webtocrat_enqueue_style' ) ) {

	function webtocrat_enqueue_style( $handle ) {

		if ( wp_script_is( $handle, 'enqueued' ) ) {
			return; 
		} else {
			wp_enqueue_style( $handle );
		}

	}

}

if( ! function_exists( 'webtocrat_enqueue_script' ) ) {

	function webtocrat_enqueue_script( $handle ) {

		if ( wp_script_is( $handle, 'enqueued' ) ) {
			return; 
		} else {
			wp_enqueue_script( $handle );
		}

	}

}