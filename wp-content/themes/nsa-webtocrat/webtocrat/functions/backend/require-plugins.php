<?php

/**

----------------------------------------------------------------------------------------------------

    Filename    : require-plugins.php
    Location    : ../webtocrat/functions/backend/
    Author      : BAS - Webtocrat Motion
    Version     : 1.0.0
    Description : Array of plugin arrays. Required keys are name and slug. If the source is NOT from the .org repo, then source is also required.

----------------------------------------------------------------------------------------------------

*/


$require_plugins = array(

    array(
        'name'                  => 'Webtocrat Theme Support', // The plugin name
        'slug'                  => 'webtocrat-theme-support', // The plugin slug (typically the folder name)
        'source'                => WEBTOCRAT_PLUGIN_URI . '/webtocrat-theme-support-v1.0.0.zip', // The plugin source
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
        'version'               => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'          => '', // If set, overrides default API URL and points to an external URL
    ),

    array(
        'name'                  => 'Redux Framework',
        'slug'                  => 'redux-framework',
        'source'                => WEBTOCRAT_PLUGIN_URI . '/redux-framework-v3.5.5.zip',
        'required'              => true,
        'version'               => '3.5.5',
        'force_activation'      => true,
        'force_deactivation'    => false,
        'external_url'          => '',
    ),
    
    array(
        'name'                  => 'qTranslate X',
        'slug'                  => 'qtranslate-x',
        'source'                => WEBTOCRAT_PLUGIN_DIR . '/qtranslate-x-v3.4.zip',
        'required'              => true,
        'version'               => '3.4',
        'force_activation'      => false,
        'force_deactivation'    => false,
        'external_url'          => '',
    ),
 
);