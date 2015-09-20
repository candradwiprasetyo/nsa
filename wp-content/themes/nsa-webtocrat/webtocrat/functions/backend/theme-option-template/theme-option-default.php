<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_webtocrat";

    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'remove_demo' );

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ) . 'Theme Options',
        // Name that appears at the top of your panel
        'display_version'      => '<em> &#160; Theme Options</em> &#126; <em>v' . $theme->get( 'Version' ) . '</em>',
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => 'NSA Options',
        'page_title'           => 'NSA Theme Options &#126; ' . $theme->get( 'Name' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 40,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => WEBTOCRAT_IMAGE_BACKEND_URI . '/theme-option-logo-small.png',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'webtocrat_theme_options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,
    );

    Redux::setArgs( $opt_name, $args );

/**

----------------------------------------------------------------------------------------------------
    START EDITING - WEBTOCRAT FRAMEWORK
----------------------------------------------------------------------------------------------------

    Table Of Contents
    
    1.0 - General.
    2.0 - Logo.
        2.1 - Login Logo.
        2.2 - Favicon.
        2.3 - Apple Icon.
    3.0 - Social Media.
    4.0 - Meta & Stat Code.    
    5.0 - Custom Code.

*/

$img_url = WEBTOCRAT_IMAGE_URI;


/**
----------------------------------------------------------------------------------------------------
    1.0 - General  Settings.
----------------------------------------------------------------------------------------------------
*/
Redux::setSection( $opt_name, array(
    'icon'      => 'el-icon-wrench',
    'title'     => __('General', 'webtocrat'),
    'heading'   => __('General Settings', 'webtocrat'),
    'fields'    => array(

        /* Primary Color */
        array(
            'id'             => 'primary-color',
            'type'           => 'color',
            'title'          => __('Primary Color', 'webtocrat'),
            'subtitle'       => __('Pick a primary color for the theme.', 'webtocrat'),
            'default'        => '#0074a2',
            'output'         => array( '.primary-color, a, code, .btn-default:hover, .btn-primary:hover, .btn-success:hover, .btn-info:hover, .btn-warning:hover, .btn-danger:hover, form input[type="submit"]:hover, form input[type="button"]:hover, .button-color:hover, .more-link:hover, article .entry-meta-date .post-date, article .entry-meta-date .post-share, article .entry-meta-date .post-share .link:before, article .entry-content .page-links a:hover span, .comments-area .comments-title, .comments-area .comment-nav-prev a i, .comments-area .comment-nav-next a i, .comments-area .comment-respond .comment-reply-title, .widget_recent_entries ul li a .news-date span i, .widget_rss ul li:before, .widget_search form span i, .latest-post h2, .template-contact .main-content .owl-prev i, .template-contact .main-content .owl-next i, .template-membership .main-content article .entry-content table tr td.level, .template-package .main-content article.tab-content .entry-content p strong, .template-package .main-content article.tab-content .entry-content ul li:before, .template-product .main-content article.tab-content .entry-content p strong, .template-product .main-content article.tab-content .entry-content ul li:before, .template-promotion .main-content article.tab-content .entry-content p strong, .template-promotion .main-content article.tab-content .entry-content ul li:before, .template-treatment .main-content article.tab-content .entry-content p strong, .template-treatment .main-content article.tab-content .entry-content ul li:before, .container-404 form span i' ),
            'validate'       => 'color',
            'transparent'    => false,
        ),

        /* Divider */
        array(
            'id'   =>'divider_1',
            'type' => 'divide'
        ),

        /* Loading Spinner */
        array(
            'id'        => 'enable-loading-spinner',
            'type'      => 'switch',
            'title'     => __('Enable Loading Spinner', 'webtocrat'),
            'subtitle'  => __('Switch on to enable loading spinner animation.', 'webtocrat'),
            'default'   => 1,
        ),

        array(
            'id'       => 'select-loading-spinner',
            'type'     => 'select',
            'title'    => __( 'Select Loading Spinner', 'webtocrat' ),
            'subtitle' => __( 'Pick a loading spinner animation for the theme.', 'webtocrat' ),
            'options'  => array(
                            'chasing-dots'    => 'Chasing Dots',
                            'circle'          => 'Circle',
                            'cube-grid'       => 'Cube Grid',
                            'double-bounce'   => 'Double Bounce',
                            'pulse'           => 'Pulse',
                            'rotating-plane'  => 'Rotating Plane',
                            'three-bounce'    => 'Three Bounce',
                            'wandering-cubes' => 'Wandering Cubes',
                            'wave'            => 'Wave',
                            'wordpress'       => 'Wordpress',
                            ),
            'default'  => 'chasing-dots',
        ),

        /* Divider */
        array(
            'id'   =>'divider_2',
            'type' => 'divide'
        ),

        /* Enable Sticky Header */
        array(
            'id'        => 'enable-sticky-header',
            'type'      => 'switch',
            'title'     => __('Enable Sticky Header', 'webtocrat'),
            'subtitle'  => __('Switch on to enable sticky header.', 'webtocrat'),
            'default'   => 1,
        ),

        /* Divider */
        array(
            'id'   =>'divider_3',
            'type' => 'divide'
        ),

        /* Show Scrool to Top Button */
        array(
            'id'        => 'enable-scrool-to-top',
            'type'      => 'switch',
            'title'     => __('Show Scrool to Top Button', 'webtocrat'),
            'subtitle'  => __('Switch on to display scrool to top button.', 'webtocrat'),
            'default'   => 1,
        ),
    ),

) );


/**
----------------------------------------------------------------------------------------------------
    2.0 - Logo  Settings.
----------------------------------------------------------------------------------------------------

    Table Of Contents
    
    2.1 - Login Logo.
    2.2 - Favicon.
    2.3 - Apple Icon.

----------------------------------------------------------------------------------------------------

*/      
Redux::setSection( $opt_name, array(
    'icon'      => 'el-icon-star',
    'title'     => 'Logo',
    'heading'   => __('Logo Settings', 'webtocrat'),
    'fields'    => array(

        /* Logo */
        array(
            'id'        => 'logo',
            'type'      => 'media',
            'url'       => true,
            'title'     => 'Logo',
            'compiler'  => 'true',
            'subtitle'  => __('Select an image file for your logo.', 'webtocrat'),
            'default'   => array('url' => $img_url . '/logo.png'),
        ),

        /* Logo Retina Version */
        array(
            'id'        => 'logo-retina',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('Logo Retina Version @2x', 'webtocrat'),
            'compiler'  => 'true',
            'subtitle'  => __('Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.', 'webtocrat'),
            'default'   => array('url' => $img_url . '/logo@2x.png'),
        ),

    ),
) );


/**
----------------------------------------------------------------------------------------------------
    2.1 - Login Logo.
----------------------------------------------------------------------------------------------------
*/
Redux::setSection( $opt_name, array(
    'icon'       => 'el-icon-user',
    'subsection' => true,
    'title'      => __('Login Logo', 'webtocrat'),
    'heading'    => __('Login Logo Settings', 'webtocrat'),
    'fields'     => array(

        /* Login Logo */
        array(
            'id'        => 'login-logo',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('Login Logo', 'webtocrat'),
            'compiler'  => 'true',
            'subtitle'  => __('Select an image file for your login logo.', 'webtocrat'),
            'default'   => array('url' => $img_url . '/login-logo.png'),
        ),

        /* Login Logo Retina Version */
        array(
            'id'        => 'login-logo-retina',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('Login Logo Retina Version @2x', 'webtocrat'),
            'compiler'  => 'true',
            'subtitle'  => __('Select an image file for the retina version of the login logo. It should be exactly 2x the size of main login logo.', 'webtocrat'),
            'default'   => array('url' => $img_url . '/login-logo@2x.png'),
        ),

    ),
) );


/**
----------------------------------------------------------------------------------------------------
    2.2 - Favicon.
----------------------------------------------------------------------------------------------------
*/
Redux::setSection( $opt_name, array(
    'icon'       => 'el-icon-smiley-alt',
    'subsection' => true,
    'title'      => 'Favicon',
    'heading'    => __('Favicon Settings', 'webtocrat'),
    'fields'     => array(

        /* Favicon */
        array(
            'id'        => 'favicon',
            'type'      => 'media',
            'url'       => true,
            'title'     => 'Favicon',
            'compiler'  => 'true',
            'subtitle'  => __('Favicon for your website (16px x 16px).', 'webtocrat'),
            'default'   => array('url' => $img_url . '/favicon.ico'),
        ),

        /* Favicon Retina Version */
        array(
            'id'        => 'favicon-retina',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('Favicon Retina Version @2x', 'webtocrat'),
            'compiler'  => 'true',
            'subtitle'  => __('Select an image file for the retina version of the favicon. It should be exactly 2x the size of main favicon icon.', 'webtocrat'),
            'default'   => array('url' => $img_url . '/favicon@2x.ico'),
        ),

    ),
) );


/**
----------------------------------------------------------------------------------------------------
    2.3 - Apple Icon.
----------------------------------------------------------------------------------------------------
*/
Redux::setSection( $opt_name, array(
    'icon'       => 'el-icon-check-empty',
    'subsection' => true,
    'title'      => __('Apple Icon', 'webtocrat'),
    'heading'    => __('Apple iPhone & iPad Icon Settings', 'webtocrat'),
    'fields'     => array(

        /* Apple iPhone Icon */
        array(
            'id'        => 'apple-iphone-icon',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('iPhone Icon', 'webtocrat'),
            'compiler'  => 'true',
            'subtitle'  => __('Favicon for Apple iPhone (57px x 57px).', 'webtocrat'),
            'default'   => array('url' => $img_url . '/apple-touch-icon-57x57.png'),
        ),

        /* Apple iPhone Retina Icon */
        array(
            'id'        => 'apple-iphone-retina-icon',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('iPhone Icon Retina Version @2x', 'webtocrat'),
            'compiler'  => 'true',
            'subtitle'  => __('Favicon for Apple iPhone retina version (114px x 114px).', 'webtocrat'),
            'default'   => array('url' => $img_url . '/apple-touch-icon-114x114.png'),
        ),

        /* Apple iPad Icon Upload */
        array(
            'id'        => 'apple-ipad-icon',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('iPad Icon', 'webtocrat'),
            'compiler'  => 'true',
            'subtitle'  => __('Favicon for Apple iPad (72px x 72px).', 'webtocrat'),
            'default'   => array('url' => $img_url . '/apple-touch-icon-72x72.png'),
        ),

        /* Apple iPad Retina Icon */
        array(
            'id'        => 'apple-ipad-retina-icon',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('iPad Icon Retina Version @2x', 'webtocrat'),
            'compiler'  => 'true',
            'subtitle'  => __('Favicon for Apple iPad retina retina (144px x 144px).', 'webtocrat'),
            'default'   => array('url' => $img_url . '/apple-touch-icon-144x144.png'),
        ),

    ),
) );


/**
----------------------------------------------------------------------------------------------------
    3.0 - Social Media.
----------------------------------------------------------------------------------------------------
*/
Redux::setSection( $opt_name, array(
    'icon'      => 'el-icon-facebook',
    'title'     => 'Social Media',
    'heading'   => __('Social Media Settings', 'webtocrat'),
    'fields'    => array(

        /* Facebook */
        array(
            'id'       => 'socmed-facebook',
            'type'     => 'text',
            'title'    => 'Facebook',
            'subtitle' => __( 'Place your Facebook page/profile link here.', 'webtocrat' ),
        ),

        /* Twitter */
        array(
            'id'       => 'socmed-twitter',
            'type'     => 'text',
            'title'    => 'Twitter',
            'subtitle' => __( 'Place your Twitter profile link here.', 'webtocrat' ),
        ),

        /* Google Plus */
        array(
            'id'       => 'socmed-google-plus',
            'type'     => 'text',
            'title'    => 'Google Plus',
            'subtitle' => __( 'Place your Google Plus profile link here.', 'webtocrat' ),
        ),

        /* Instagram */
        array(
            'id'       => 'socmed-instagram',
            'type'     => 'text',
            'title'    => 'Instagram',
            'subtitle' => __( 'Place your Instagram profile link here.', 'webtocrat' ),
        ),

        /* Pinterest */
        array(
            'id'       => 'socmed-pinterest',
            'type'     => 'text',
            'title'    => 'Pinterest',
            'subtitle' => __( 'Place your Pinterest profile link here.', 'webtocrat' ),
        ),

        /* Linkedin */
        array(
            'id'       => 'socmed-linkedin',
            'type'     => 'text',
            'title'    => 'Linkedin',
            'subtitle' => __( 'Place your Linkedin profile link here.', 'webtocrat' ),
        ),

        /* Dribble */
        array(
            'id'       => 'socmed-dribble',
            'type'     => 'text',
            'title'    => 'Dribble',
            'subtitle' => __( 'Place your Dribble profile link here.', 'webtocrat' ),
        ),

        /* Youtube */
        array(
            'id'       => 'socmed-youtube',
            'type'     => 'text',
            'title'    => 'Youtube',
            'subtitle' => __( 'Place your Youtube profile link here.', 'webtocrat' ),
        ),

    ),
) );


/**
----------------------------------------------------------------------------------------------------
    4.0 - Meta & Stat Code.
----------------------------------------------------------------------------------------------------
*/
Redux::setSection( $opt_name, array(
    'icon'      => 'el-icon-key',
    'title'     => __('Meta & Stat Code', 'webtocrat'),
    'heading'   => __('Meta & Stat Code Settings', 'webtocrat'),
    'fields'    => array(

        /* Google Meta */
        array(
            'id'       => 'google-meta',
            'type'     => 'textarea',
            'title'    => __( 'Google Meta Verification', 'webtocrat' ),
            'subtitle' => __( 'Paste your Google Meta Verification code here.', 'webtocrat' ),
        ),

        /* Bing Meta */
        array(
            'id'       => 'bing-meta',
            'type'     => 'textarea',
            'title'    => __( 'Bing Meta Verification', 'webtocrat' ),
            'subtitle' => __( 'Paste your Bing Meta Verification code here.', 'webtocrat' ),
        ),

        /* Alexa Meta */
        array(
            'id'       => 'alexa-meta',
            'type'     => 'textarea',
            'title'    => __( 'Alexa Meta Verification', 'webtocrat' ),
            'subtitle' => __( 'Paste your Alexa Meta Verification code here.', 'webtocrat' ),
        ),
        
        array(
            'id'   => 'opt-divide',
            'type' => 'divide'
        ),

        /* Tracking Code */
        array(
            'id'       => 'tracking-code',
            'type'     => 'textarea',
            'title'    => __( 'Tracking Code', 'webtocrat' ),
            'subtitle' => __( 'Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'webtocrat' ),
        ),

    ),
) );


/**
----------------------------------------------------------------------------------------------------
    5.0 - Custom Code.
----------------------------------------------------------------------------------------------------
*/
Redux::setSection( $opt_name, array(
    'icon'      => 'el-icon-css',
    'title'     => __('Custom Code', 'webtocrat'),
    'heading'   => __('Custom Code Settings', 'webtocrat'),
    'fields'    => array(

        /* Custom CSS Code */
        array(
            'id'       => 'custom-css',
            'type'     => 'ace_editor',
            'title'    => __( 'Custom CSS Code', 'webtocrat' ),
            'subtitle' => __( 'Paste your CSS code here.', 'webtocrat' ),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'default'  => "",
        ),

        /* Custom JS Code */
        array(
            'id'       => 'custom-js',
            'type'     => 'ace_editor',
            'title'    => __( 'Custom JS Script Code', 'webtocrat' ),
            'subtitle' => __( 'Paste your javascript code here.', 'webtocrat' ),
            'mode'     => 'js',
            'theme'    => 'monokai',
            'default'  => "",
        ),

    ),
) );

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    function compiler_action( $options, $css, $changed_values ) {
        // echo '<h1>The compiler hook has run!</h1>';
        // echo "<pre>";
        // print_r( $changed_values ); // Values that have changed since the last save
        // echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            // return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            // print_r( $field );
            // echo '<br/>';
            // print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    function dynamic_section( $sections ) {
        //$sections = array();
        // $sections[] = array(
        //     'title'  => __( 'Section via hook', 'redux-framework-demo' ),
        //     'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
        //     'icon'   => 'el el-paper-clip',
        //     // Leave this as a blank section, no options just some intro text set above.
        //     'fields' => array()
        // );

        // return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        //$args['dev_mode'] = true;

        // return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        // return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
    function remove_demo() {

        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }

    function remove_submenu() {
        remove_submenu_page( 'webtocrat_theme_options', 'webtocrat_theme_options&tab=dev_mode_default' );
    }
    add_action( 'admin_menu', 'remove_submenu', 999 );