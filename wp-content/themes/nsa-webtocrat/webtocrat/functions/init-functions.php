<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: init-functions.php
	Location	: ../webtocrat/functions/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Load all functions and definitions
	
----------------------------------------------------------------------------------------------------

*/


if( ! function_exists( 'webtocrat_load_backend' ) ) {

    function webtocrat_load_backend() {

        $path = dirname( __FILE__ );

        $folders = scandir( $path );

        foreach($folders as $folder) {

			if ($folder === '.' or $folder === '..' or $folder === 'init-functions.php' ) {
                continue;   
            }

        	$inside_folders = scandir( $path .'/'. $folder );

			foreach($inside_folders as $file) {

				if ($file != "." && $file != "..") {

					if ( is_dir($path .'/'. $folder .'/'. $file) ) {

						$inside_inside_folders = scandir( $path .'/'. $folder .'/'. $file, 1 );

						if ( $file == 'theme-option-template' ) {
							/* get Theme Option */
							require_once( $path .'/'. $folder .'/'. $file .'/theme-option-'. WEBTOCRAT_TEMPLATE_NAME . '.php' );

						} else {

							foreach($inside_inside_folders as $inside_file) {

								if ( $inside_file != "." && $inside_file != ".." && $inside_file != 'wp-setup.php' && $inside_file != 'theme-option-template' ) {

									if ( is_file($path .'/'. $folder .'/'. $file .'/'. $inside_file)) {

										//print_r($inside_file . '<br />');

										require_once( $path .'/'. $folder .'/'. $file .'/'. $inside_file );

									}

								}/* end if ( $inside_file != ... */

							}/* end foreach($inside_inside_folders ... */

						}/* end if ( $file == ... */

					}/* end if ( is_dir($path ... */

					if ( is_file($path .'/'. $folder .'/'. $file) ) {

						//print_r( $folder .'/'. $file . '<br />');

						require_once( $path .'/'. $folder .'/'. $file );

					}/* end if ( is_file($path ... */

				}/* end if ($file != ... */

			}/* end foreach($inside_folders ... */

        }/* end foreach($folders  ... */

    }/* end function webtocrat_load ... */

	add_action( 'after_setup_theme', 'webtocrat_load_backend' );
}