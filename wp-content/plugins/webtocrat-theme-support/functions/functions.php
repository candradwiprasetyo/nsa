<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: functions.php
	Location	: ../functions/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Load all functions and definitions
	
----------------------------------------------------------------------------------------------------

*/


if( ! function_exists( 'webtocrat_load_plugin_function' ) ) {

    function webtocrat_load_plugin_function() {

        $path = dirname( __FILE__ );

        $folders = scandir( $path );

        foreach($folders as $folder) {

			if ($folder === '.' or $folder === '..' or $folder === 'functions.php' ) {
                continue;   
            }

        	if ( is_dir( $path .'/'. $folder ) ) {

        		$inside_folders = scandir( $path .'/'. $folder );

	        	foreach($inside_folders as $file) {

					if ($file != "." && $file != "..") {

						if ( is_file($path .'/'. $folder .'/'. $file) ) {

							//print_r( $path .'/'. $folder .'/'. $file . '<br />' );

							require_once( $path .'/'. $folder .'/'. $file );

						}

					}

	        	}

	        }

			if ( is_file( $path .'/'. $folder ) && $folder != 'functions.php' ) {

				// print_r( $path .'/'. $folder . '<br />' );

				require_once( $path .'/'. $folder );

			}

        }

    }

	add_action( 'plugins_loaded', 'webtocrat_load_plugin_function', 8 );
}