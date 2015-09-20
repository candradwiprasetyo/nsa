<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: loader.php
	Location	: ../functions/redux/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Load custom field on Redux
	
----------------------------------------------------------------------------------------------------

*/


if( class_exists('ReduxFramework') && !function_exists('webtocrat_plugin_custom_extension_loader')) {

    function webtocrat_plugin_custom_extension_loader($ReduxFramework) {

        $path = dirname( __FILE__ ) . '/extensions/';
        $folders = scandir( $path, 1 );        
        foreach($folders as $folder) {
            if ($folder === '.' or $folder === '..' or !is_dir($path . $folder) ) {
                continue;   
            }

            $extension_class = 'ReduxFramework_Extension_' . $folder;

            if( !class_exists( $extension_class ) ) {
                // In case you wanted override your override, hah.
                $class_file = $path . $folder . '/extension_' . $folder . '.php';

                $opt_name_custom = array( 'redux_webtocrat' );

                foreach ($opt_name_custom as $value) {
                    $class_file = apply_filters( 'redux/extension/' . $value . '/'.$folder, $class_file );
                    if ( file_exists( $class_file ) ) {
                        require_once( $class_file );
                        $extension = new $extension_class( $ReduxFramework );
                    }
                }
            }
            
        }
    }

    foreach ( array( 'redux_webtocrat' ) as $v) {
        add_action("redux/extensions/" . $v . "/before", 'webtocrat_plugin_custom_extension_loader', 0);
    }
}