<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: gallery.php
	Location	: ../functions/post-types/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Gallery Post Type Functions

----------------------------------------------------------------------------------------------------

	Table Of Contents
	
    1.0 - Register gallery category
    2.0 - Register gallery tag
    3.0 - Register gallery post type
    4.0 - Edit gallery columns
    5.0 - Gallery custom columns
    6.0 - Gallery sortable columns
    7.0 - Custom action row
    8.0 - Gallery redirect

----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
    1.0 - Register gallery category
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
// register_taxonomy( 'gallery-category', 'gallery', $args_category );


/**
----------------------------------------------------------------------------------------------------
	2.0 - Register gallery tag
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
// register_taxonomy( 'gallery-tag', 'gallery', $args_tag );


/**
----------------------------------------------------------------------------------------------------
	3.0 - Register gallery post type
----------------------------------------------------------------------------------------------------
*/
function gallery_register() {

	$menu_icon = ( floatval( get_bloginfo( 'version' ) ) >= '3.8' ) ? 'dashicons-lightbulb' : NULL;

    $labels = array(
        'name'               => _x('Gallery',           'post type general name',   'webtocrat' ),
        'singular_name'      => _x('Gallery',           'post type singular name',  'webtocrat' ),
        'add_new'            => _x('Add New',         'gallery item',               'webtocrat' ),
        'add_new_item'       => __('Add New Gallery',                               'webtocrat' ),
        'edit_item'          => __('Edit Gallery',                                  'webtocrat' ),
        'new_item'           => __('New Gallery',                                   'webtocrat' ),
        'view_item'          => __('View Gallery',                                  'webtocrat' ),
        'search_items'       => __('Search Gallery',                                'webtocrat' ),
        'not_found'          => __('No gallery have been added yet',                'webtocrat' ),
        'not_found_in_trash' => __('Nothing found in Trash',                      'webtocrat' ),
        'parent_item_colon'  => ''
    );

    $args = array(
        'labels'            => $labels,  
        'public'            => true,  
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => false,
        'rewrite'           => array('slug' => 'gallery'),
        'supports'          => array('title', 'editor', 'thumbnail'), // title, editor, author, thumbnail, excerpt, trackbacks, custom-fields, comments, revisions, page-attributes, post-formats
        'has_archive'       => true,
        'menu_icon'         => $menu_icon,
        'taxonomies'        => array('gallery-category'),
        'menu_position'     => 31,
       );  
  
    register_post_type( 'gallery' , $args );  
}  
add_action( 'init', 'gallery_register' );


/**
----------------------------------------------------------------------------------------------------
	4.0 - Edit gallery columns
----------------------------------------------------------------------------------------------------
*/
function gallery_edit_columns($columns){  
    $columns = array(
        'cb'               => '<input type=\'checkbox\' />',
        'title'            => __('Name',     'webtocrat'),
        // 'gallery_category'   => __('Category', 'webtocrat'),
        // 'gallery_tag'        => __('Tag', 'webtocrat'),
        'thumbnail'        => __('Thumbnail', 'webtocrat'),
        // 'custom_field'     => __('Custom Field', 'webtocrat'),
        'date'             => __('Date', 'webtocrat'),
    );  

    return $columns;  
}
add_filter( 'manage_edit-gallery_columns', 'gallery_edit_columns' ); 


/**
----------------------------------------------------------------------------------------------------
	5.0 - Gallery custom columns
----------------------------------------------------------------------------------------------------
*/
function gallery_custom_columns($column){  
        global $post;  
        switch ($column) {
            // case 'gallery_category':
            //     $terms_category = get_the_terms( $post->ID, 'gallery-category' );
            //     if ( $terms_category && ! is_wp_error( $terms_category ) ) {
            //         $gallery_category_links = array();
            //         foreach ( $terms_category as $term_category ) {
            //             $gallery_category_links[] = $term_category->name;
            //         }
            //         $gallery_category = join( ", ", $gallery_category_links );
            //         echo $gallery_category;
            //     }
            // break;
            // case 'gallery_tag':
            //     $terms_tag = get_the_terms( $post->ID, 'gallery-tag' );
            //     if ( $terms_tag && ! is_wp_error( $terms_tag ) ) {
            //         $gallery_tag_links = array();
            //         foreach ( $terms_tag as $term_tag ) {
            //             $gallery_tag_links[] = $term_tag->name;
            //         }
            //         $gallery_tag = join( ", ", $gallery_tag_links );
            //         echo $gallery_tag;
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
add_action( 'manage_gallery_posts_custom_column', 'gallery_custom_columns' );


/**
----------------------------------------------------------------------------------------------------
    6.0 - Gallery sortable columns
----------------------------------------------------------------------------------------------------
*/
function gallery_sortable_columns( $columns ) {
    $columns['gallery_category'] = 'gallery_category';
    $columns['gallery_tag']      = 'gallery_tag'; 
    return $columns;
}
// add_filter( 'manage_edit-gallery_sortable_columns', 'provide_sortable_columns' );


/**
----------------------------------------------------------------------------------------------------
    7.0 - Custom action row
----------------------------------------------------------------------------------------------------
*/
function gallery_action_row($actions, $post){
    //check for your post type
    if ( $post->post_type == "gallery" ){
        unset( $actions['view'] );
        unset( $actions['trash'] );
        unset( $actions['edit'] );
        unset( $actions['inline hide-if-no-js'] );        
    }
    return $actions;
}
// add_filter('post_row_actions','gallery_action_row', 10, 2);


/**
----------------------------------------------------------------------------------------------------
    8.0 - Gallery redirect
----------------------------------------------------------------------------------------------------
*/
function gallery_context_redirect() {
    if ( get_query_var( 'post_type' ) == 'gallery' ) {
        global $wp_query;
        $wp_query->is_home     = false;
        $wp_query->is_single   = false;
        $wp_query->is_singular = false;
        $wp_query->is_404      = true;
    }
}
// add_action( 'template_redirect', 'gallery_context_redirect' );