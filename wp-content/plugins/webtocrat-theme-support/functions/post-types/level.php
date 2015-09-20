<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: level.php
	Location	: ../functions/post-types/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Level Post Type Functions

----------------------------------------------------------------------------------------------------

	Table Of Contents
	
	1.0 - Register level category
    2.0 - Register level tag
    3.0 - Register level post type
    4.0 - Edit level columns
    5.0 - Level custom columns
    6.0 - Level sortable columns
    7.0 - Custom action row
    8.0 - Level redirect

----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
    1.0 - Register level category
----------------------------------------------------------------------------------------------------
*/
$args_category = array(
    'label'                         => 'Categories', 
    'singular_label'                => 'Category', 
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => false,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'                       => false,
    'query_var'                     => true
);
// register_taxonomy( 'level-category', 'level', $args_category );


/**
----------------------------------------------------------------------------------------------------
	2.0 - Register level tag
----------------------------------------------------------------------------------------------------
*/
$args_tag = array(
    'label' 						=> 'Tags', 
    'singular_label' 				=> 'Tag', 
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => false,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'                       => false,
    'query_var'                     => true
);
// register_taxonomy( 'level-tag', 'level', $args_tag );


/**
----------------------------------------------------------------------------------------------------
	3.0 - Register level post type
----------------------------------------------------------------------------------------------------
*/
function level_register() {

	$menu_icon = ( floatval( get_bloginfo( 'version' ) ) >= '3.8' ) ? 'dashicons-chart-bar' : NULL;

    $labels = array(
        'name'               => _x('Level',           'post type general name',   'webtocrat' ),
        'singular_name'      => _x('Level',           'post type singular name',  'webtocrat' ),
        'add_new'            => _x('Add New',         'level item',               'webtocrat' ),
        'add_new_item'       => __('Add New Level',                               'webtocrat' ),
        'edit_item'          => __('Edit Level',                                  'webtocrat' ),
        'new_item'           => __('New Level',                                   'webtocrat' ),
        'view_item'          => __('View Level',                                  'webtocrat' ),
        'search_items'       => __('Search Level',                                'webtocrat' ),
        'not_found'          => __('No level have been added yet',                'webtocrat' ),
        'not_found_in_trash' => __('Nothing found in Trash',                      'webtocrat' ),
        'parent_item_colon'  => ''
    );

    $args = array(
        'labels'            => $labels,  
        'public'            => true,  
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => false,
        'rewrite'           => array('slug' => 'level'),
        'supports'          => array('title', 'editor', 'thumbnail'), // title, editor, author, thumbnail, excerpt, trackbacks, custom-fields, comments, revisions, page-attributes, post-formats
        'has_archive'       => true,
        'menu_icon'         => $menu_icon,
        'taxonomies'        => array('level-category'),
        'menu_position'     => 29,
       );  
  
    register_post_type( 'level' , $args );  
}  
add_action( 'init', 'level_register' );


/**
----------------------------------------------------------------------------------------------------
	4.0 - Edit level columns
----------------------------------------------------------------------------------------------------
*/
function level_edit_columns($columns){  
    $columns = array(
        'cb'               => '<input type=\'checkbox\' />',
        'title'            => __('Name',     'webtocrat'),
        // 'level_category'   => __('Category', 'webtocrat'),
        // 'level_tag'        => __('Tag', 'webtocrat'),
        'thumbnail'        => __('Thumbnail', 'webtocrat'),
        // 'custom_field'     => __('Custom Field', 'webtocrat'),
        'date'             => __('Date', 'webtocrat'),
    );  

    return $columns;  
}
add_filter( 'manage_edit-level_columns', 'level_edit_columns' ); 


/**
----------------------------------------------------------------------------------------------------
	5.0 - Level custom columns
----------------------------------------------------------------------------------------------------
*/
function level_custom_columns($column){  
        global $post;  
        switch ($column) {
            // case 'level_category':
            //     $terms_category = get_the_terms( $post->ID, 'level-category' );
            //     if ( $terms_category && ! is_wp_error( $terms_category ) ) {
            //         $level_category_links = array();
            //         foreach ( $terms_category as $term_category ) {
            //             $level_category_links[] = $term_category->name;
            //         }
            //         $level_category = join( ", ", $level_category_links );
            //         echo $level_category;
            //     }
            // break;
            // case 'level_tag':
            //     $terms_tag = get_the_terms( $post->ID, 'level-tag' );
            //     if ( $terms_tag && ! is_wp_error( $terms_tag ) ) {
            //         $level_tag_links = array();
            //         foreach ( $terms_tag as $term_tag ) {
            //             $level_tag_links[] = $term_tag->name;
            //         }
            //         $level_tag = join( ", ", $level_tag_links );
            //         echo $level_tag;
            //     }
            // break;
            // case 'custom_field':
            //     echo get_post_meta( $post->ID, 'custom_field', true );
            // break;
            case 'thumbnail':
                echo the_post_thumbnail( 'thumbnail' );
            break;
        }  
}
add_action( 'manage_level_posts_custom_column', 'level_custom_columns' );


/**
----------------------------------------------------------------------------------------------------
    6.0 - Level sortable columns
----------------------------------------------------------------------------------------------------
*/
function level_sortable_columns( $columns ) {
    $columns['level_category'] = 'level_category';
    $columns['level_tag']      = 'level_tag'; 
    return $columns;
}
// add_filter( 'manage_edit-level_sortable_columns', 'provide_sortable_columns' );


/**
----------------------------------------------------------------------------------------------------
    7.0 - Custom action row
----------------------------------------------------------------------------------------------------
*/
function level_action_row($actions, $post){
    //check for your post type
    if ( $post->post_type == "level" ){
        unset( $actions['view'] );
        unset( $actions['trash'] );
        unset( $actions['edit'] );
        unset( $actions['inline hide-if-no-js'] );        
    }
    return $actions;
}
// add_filter('post_row_actions','level_action_row', 10, 2);


/**
----------------------------------------------------------------------------------------------------
    8.0 - Level redirect
----------------------------------------------------------------------------------------------------
*/
function level_context_redirect() {
    if ( get_query_var( 'post_type' ) == 'level' ) {
        global $wp_query;
        $wp_query->is_home     = false;
        $wp_query->is_single   = false;
        $wp_query->is_singular = false;
        $wp_query->is_404      = true;
    }
}
// add_action( 'template_redirect', 'level_context_redirect' );