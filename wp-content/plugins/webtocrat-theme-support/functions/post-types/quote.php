<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: quote.php
	Location	: ../functions/post-types/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Quote Post Type Functions

----------------------------------------------------------------------------------------------------

	Table Of Contents
	
	1.0 - Register quote category
    2.0 - Register quote tag
    3.0 - Register quote post type
    4.0 - Edit quote columns
    5.0 - Quote custom columns
    6.0 - Quote sortable columns
    7.0 - Custom action row
    8.0 - Quote redirect

----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
    1.0 - Register quote category
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
// register_taxonomy( 'quote-category', 'quote', $args_category );


/**
----------------------------------------------------------------------------------------------------
	2.0 - Register quote tag
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
// register_taxonomy( 'quote-tag', 'quote', $args_tag );


/**
----------------------------------------------------------------------------------------------------
	3.0 - Register quote post type
----------------------------------------------------------------------------------------------------
*/
function quote_register() {

	$menu_icon = ( floatval( get_bloginfo( 'version' ) ) >= '3.8' ) ? 'dashicons-format-quote' : NULL;

    $labels = array(
        'name'               => _x('Quote',           'post type general name',   'webtocrat' ),
        'singular_name'      => _x('Quote',           'post type singular name',  'webtocrat' ),
        'add_new'            => _x('Add New',         'quote item',               'webtocrat' ),
        'add_new_item'       => __('Add New Quote',                               'webtocrat' ),
        'edit_item'          => __('Edit Quote',                                  'webtocrat' ),
        'new_item'           => __('New Quote',                                   'webtocrat' ),
        'view_item'          => __('View Quote',                                  'webtocrat' ),
        'search_items'       => __('Search Quote',                                'webtocrat' ),
        'not_found'          => __('No quote have been added yet',                'webtocrat' ),
        'not_found_in_trash' => __('Nothing found in Trash',                      'webtocrat' ),
        'parent_item_colon'  => ''
    );

    $args = array(
        'labels'            => $labels,  
        'public'            => true,  
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => false,
        'rewrite'           => array('slug' => 'quote'),
        'supports'          => array('title', 'editor', 'thumbnail'), // title, editor, author, thumbnail, excerpt, trackbacks, custom-fields, comments, revisions, page-attributes, post-formats
        'has_archive'       => true,
        'menu_icon'         => $menu_icon,
        'taxonomies'        => array('quote-category'),
        'menu_position'     => 30,
       );  
  
    register_post_type( 'quote' , $args );  
}  
add_action( 'init', 'quote_register' );


/**
----------------------------------------------------------------------------------------------------
	4.0 - Edit quote columns
----------------------------------------------------------------------------------------------------
*/
function quote_edit_columns($columns){  
    $columns = array(
        'cb'               => '<input type=\'checkbox\' />',
        'title'            => __('Name',     'webtocrat'),
        // 'quote_category'   => __('Category', 'webtocrat'),
        // 'quote_tag'        => __('Tag', 'webtocrat'),
        'thumbnail'        => __('Thumbnail', 'webtocrat'),
        // 'custom_field'     => __('Custom Field', 'webtocrat'),
        'date'             => __('Date', 'webtocrat'),
    );  

    return $columns;  
}
add_filter( 'manage_edit-quote_columns', 'quote_edit_columns' ); 


/**
----------------------------------------------------------------------------------------------------
	5.0 - Quote custom columns
----------------------------------------------------------------------------------------------------
*/
function quote_custom_columns($column){  
        global $post;  
        switch ($column) {
            // case 'quote_category':
            //     $terms_category = get_the_terms( $post->ID, 'quote-category' );
            //     if ( $terms_category && ! is_wp_error( $terms_category ) ) {
            //         $quote_category_links = array();
            //         foreach ( $terms_category as $term_category ) {
            //             $quote_category_links[] = $term_category->name;
            //         }
            //         $quote_category = join( ", ", $quote_category_links );
            //         echo $quote_category;
            //     }
            // break;
            // case 'quote_tag':
            //     $terms_tag = get_the_terms( $post->ID, 'quote-tag' );
            //     if ( $terms_tag && ! is_wp_error( $terms_tag ) ) {
            //         $quote_tag_links = array();
            //         foreach ( $terms_tag as $term_tag ) {
            //             $quote_tag_links[] = $term_tag->name;
            //         }
            //         $quote_tag = join( ", ", $quote_tag_links );
            //         echo $quote_tag;
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
add_action( 'manage_quote_posts_custom_column', 'quote_custom_columns' );


/**
----------------------------------------------------------------------------------------------------
    6.0 - Quote sortable columns
----------------------------------------------------------------------------------------------------
*/
function quote_sortable_columns( $columns ) {
    $columns['quote_category'] = 'quote_category';
    $columns['quote_tag']      = 'quote_tag'; 
    return $columns;
}
// add_filter( 'manage_edit-quote_sortable_columns', 'provide_sortable_columns' );


/**
----------------------------------------------------------------------------------------------------
    7.0 - Custom action row
----------------------------------------------------------------------------------------------------
*/
function quote_action_row($actions, $post){
    //check for your post type
    if ( $post->post_type == "quote" ){
        unset( $actions['view'] );
        unset( $actions['trash'] );
        unset( $actions['edit'] );
        unset( $actions['inline hide-if-no-js'] );        
    }
    return $actions;
}
// add_filter('post_row_actions','quote_action_row', 10, 2);


/**
----------------------------------------------------------------------------------------------------
    8.0 - Quote redirect
----------------------------------------------------------------------------------------------------
*/
function quote_context_redirect() {
    if ( get_query_var( 'post_type' ) == 'quote' ) {
        global $wp_query;
        $wp_query->is_home     = false;
        $wp_query->is_single   = false;
        $wp_query->is_singular = false;
        $wp_query->is_404      = true;
    }
}
// add_action( 'template_redirect', 'quote_context_redirect' );