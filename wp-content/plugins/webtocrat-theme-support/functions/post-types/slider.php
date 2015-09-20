<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: slider.php
	Location	: ../functions/post-types/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Slider Post Type Functions

----------------------------------------------------------------------------------------------------

	Table Of Contents
	
	1.0 - Register slider category
    2.0 - Register slider tag
    3.0 - Register slider post type
    4.0 - Edit slider columns
    5.0 - Slider custom columns
    6.0 - Slider sortable columns
    7.0 - Custom action row
    8.0 - Slider redirect

----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
    1.0 - Register slider category
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
// register_taxonomy( 'slider-category', 'slider', $args_category );


/**
----------------------------------------------------------------------------------------------------
	2.0 - Register slider tag
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
// register_taxonomy( 'slider-tag', 'slider', $args_tag );


/**
----------------------------------------------------------------------------------------------------
	3.0 - Register slider post type
----------------------------------------------------------------------------------------------------
*/
function slider_register() {

	$menu_icon = ( floatval( get_bloginfo( 'version' ) ) >= '3.8' ) ? 'dashicons-align-center' : NULL;

    $labels = array(
        'name'               => _x('Slider',           'post type general name',   'webtocrat' ),
        'singular_name'      => _x('Slider',           'post type singular name',  'webtocrat' ),
        'add_new'            => _x('Add New',         'slider item',               'webtocrat' ),
        'add_new_item'       => __('Add New Slider',                               'webtocrat' ),
        'edit_item'          => __('Edit Slider',                                  'webtocrat' ),
        'new_item'           => __('New Slider',                                   'webtocrat' ),
        'view_item'          => __('View Slider',                                  'webtocrat' ),
        'search_items'       => __('Search Slider',                                'webtocrat' ),
        'not_found'          => __('No slider have been added yet',                'webtocrat' ),
        'not_found_in_trash' => __('Nothing found in Trash',                      'webtocrat' ),
        'parent_item_colon'  => ''
    );

    $args = array(
        'labels'            => $labels,  
        'public'            => true,  
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => false,
        'rewrite'           => array('slug' => 'slider'),
        'supports'          => array('title', 'editor', 'thumbnail'), // title, editor, author, thumbnail, excerpt, trackbacks, custom-fields, comments, revisions, page-attributes, post-formats
        'has_archive'       => true,
        'menu_icon'         => $menu_icon,
        'taxonomies'        => array('slider-category'),
        'menu_position'     => 28,
       );  
  
    register_post_type( 'slider' , $args );  
}  
add_action( 'init', 'slider_register' );


/**
----------------------------------------------------------------------------------------------------
	4.0 - Edit slider columns
----------------------------------------------------------------------------------------------------
*/
function slider_edit_columns($columns){  
    $columns = array(
        'cb'               => '<input type=\'checkbox\' />',
        'title'            => __('Name',     'webtocrat'),
        // 'slider_category'   => __('Category', 'webtocrat'),
        // 'slider_tag'        => __('Tag', 'webtocrat'),
        'thumbnail'        => __('Thumbnail', 'webtocrat'),
        // 'custom_field'     => __('Custom Field', 'webtocrat'),
        'date'             => __('Date', 'webtocrat'),
    );  

    return $columns;  
}
add_filter( 'manage_edit-slider_columns', 'slider_edit_columns' ); 


/**
----------------------------------------------------------------------------------------------------
	5.0 - Slider custom columns
----------------------------------------------------------------------------------------------------
*/
function slider_custom_columns($column){  
        global $post;  
        switch ($column) {
            // case 'slider_category':
            //     $terms_category = get_the_terms( $post->ID, 'slider-category' );
            //     if ( $terms_category && ! is_wp_error( $terms_category ) ) {
            //         $slider_category_links = array();
            //         foreach ( $terms_category as $term_category ) {
            //             $slider_category_links[] = $term_category->name;
            //         }
            //         $slider_category = join( ", ", $slider_category_links );
            //         echo $slider_category;
            //     }
            // break;
            // case 'slider_tag':
            //     $terms_tag = get_the_terms( $post->ID, 'slider-tag' );
            //     if ( $terms_tag && ! is_wp_error( $terms_tag ) ) {
            //         $slider_tag_links = array();
            //         foreach ( $terms_tag as $term_tag ) {
            //             $slider_tag_links[] = $term_tag->name;
            //         }
            //         $slider_tag = join( ", ", $slider_tag_links );
            //         echo $slider_tag;
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
add_action( 'manage_slider_posts_custom_column', 'slider_custom_columns' );


/**
----------------------------------------------------------------------------------------------------
    6.0 - Slider sortable columns
----------------------------------------------------------------------------------------------------
*/
function slider_sortable_columns( $columns ) {
    $columns['slider_category'] = 'slider_category';
    $columns['slider_tag']      = 'slider_tag'; 
    return $columns;
}
// add_filter( 'manage_edit-slider_sortable_columns', 'provide_sortable_columns' );


/**
----------------------------------------------------------------------------------------------------
    7.0 - Custom action row
----------------------------------------------------------------------------------------------------
*/
function slider_action_row($actions, $post){
    //check for your post type
    if ( $post->post_type == "slider" ){
        unset( $actions['view'] );
        unset( $actions['trash'] );
        unset( $actions['edit'] );
        unset( $actions['inline hide-if-no-js'] );        
    }
    return $actions;
}
// add_filter('post_row_actions','slider_action_row', 10, 2);


/**
----------------------------------------------------------------------------------------------------
    8.0 - Slider redirect
----------------------------------------------------------------------------------------------------
*/
function slider_context_redirect() {
    if ( get_query_var( 'post_type' ) == 'slider' ) {
        global $wp_query;
        $wp_query->is_home     = false;
        $wp_query->is_single   = false;
        $wp_query->is_singular = false;
        $wp_query->is_404      = true;
    }
}
// add_action( 'template_redirect', 'slider_context_redirect' );