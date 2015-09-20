<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: webtocrat.php
	Location	: ../webtocrat/functions/backend/
	Edited		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Add metabox on post, page and custom post
	
----------------------------------------------------------------------------------------------------

	Table Of Contents
	
	1.0 - Post.
	2.0 - Page.
   XX.0 - Register meta boxes.

----------------------------------------------------------------------------------------------------

*/

global $meta_boxes;

$meta_boxes	= array();
$url		=  WEBTOCRAT_IMAGE_BACKEND_URI . '/';
$num		= range('0','9');


/**
----------------------------------------------------------------------------------------------------
	1.0 - Post.
----------------------------------------------------------------------------------------------------
*/
$meta_boxes[] = array(
	'id'		=> 'quote_author',
	'title'		=> 'Webtocrat Quote Author',
	'pages'		=> array( 'post' ),
	'priority'	=> 'high',
	'fields'	=> array(
		array(
			'id'   => 'webtocrat_authorquote',
			'type' => 'text',
			'name' => __('Author name', 'webtocrat'),
		),
		array(
			'id'   => 'webtocrat_authorlink',
			'type' => 'textarea',
			'name' => __('Author link', 'webtocrat'),
		),
	),
);

$meta_boxes[] = array(
	'id'		=> 'embed_code',
	'title'		=> 'Webtocrat Embed Code',
	'pages'		=> array( 'post' ),
	'priority'	=> 'high',
	'fields'	=> array(
		array(
			'id'   => 'webtocrat_post_embed_code',
			'type' => 'textarea',
			'name' => __('Audio/Video embed code', 'webtocrat'),
		),
	),
);


/**
----------------------------------------------------------------------------------------------------
	2.0 - Page.
----------------------------------------------------------------------------------------------------
*/
$meta_boxes[] = array(
	'id' 		=> 'page_settings',
	'title' 	=> 'Webtocrat Page Settings',
	'pages' 	=> array( 'page' ),
	'context'	=> 'normal',
	'fields'	=> array(

		array(
			'id'   => 'webtocrat_page_embed_code',
			'type' => 'textarea',
			'name' => __('Audio/Video embed code', 'webtocrat'),
		),

	)
);
/**
	Template - Home.
*/
$meta_boxes[] = array(
	'id' 		=> 'home_template_setting',
	'title' 	=> 'Webtocrat Home Page Settings',
	'pages' 	=> array( 'page' ),
	'context'	=> 'normal',
	'fields'	=> array(

		array(
			'id'   => 'webtocrat_page_embed_code',
			'type' => 'text',
			'name' => __('Level 1', 'webtocrat'),
			'desc' => __( 'Title', 'webtocrat' )
		),

		array(
			'id'   => 'webtocrat_page_embed_code',
			'type' => 'text',
			'name' => __(' &#160; ', 'webtocrat'),
			'desc' => __( 'LInk', 'webtocrat' )
		),

	)
);



/**
----------------------------------------------------------------------------------------------------
	XX.0 - Register meta boxes.
----------------------------------------------------------------------------------------------------
*/
function rw_register_meta_boxes() {
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			if ( isset( $meta_box['only_on'] ) && ! rw_maybe_include( $meta_box['only_on'] ) ) {
				continue;
			}
			new RW_Meta_Box( $meta_box );
		}
	}
}
add_action( 'admin_init', 'rw_register_meta_boxes' );

function rw_maybe_include( $conditions ) {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );
	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}
		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
			break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
			break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
			break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) ) {
					return true;
				}
			break;
		}
	}

	// If no condition matched
	return false;
}

add_action( 'admin_print_scripts', 'webtocrat_post_format_metaboxes', 1000 );
function webtocrat_post_format_metaboxes() {
	global $v;

	if ( get_post_type() == 'post' ) :

	?>
	<script>
		function webtocratdisplayMetaboxes() {
		var formats = { 'post-format-quote': 'quote_author', 'post-format-video': 'embed_code' , 'post-format-audio': 'embed_code' };
		var ids = '#quote_author, #embed_code';
			// Hide all post format metaboxes
			jQuery(ids).hide();
			//jQuery('#quote_author').hide();
			// Get current post format
			var selectedElt = jQuery("input[name='post_format']:checked").attr('id');

			// If exists, fade in current post format metabox
			if ( formats[selectedElt] )
				jQuery('#' + formats[selectedElt]).fadeIn();
		}

		jQuery(function() {
			// Show/hide metaboxes on page load
			webtocratdisplayMetaboxes();

			// Show/hide metaboxes on change event
			jQuery("input[name='post_format']").change(function() {
				webtocratdisplayMetaboxes();
			});
		});
	</script>
	<?php

	elseif ( get_post_type() == 'page' ) :

	?>
	<script>
		function home_page_metabox() {
			var formats = { 'template/template-page-home.php': 'home_template_setting' };
			var ids = '#home_template_setting';
				// Hide all post format metaboxes
				jQuery(ids).hide();
				//jQuery('#quote_author').hide();
				// Get current post format
				var selectedElt = jQuery("select[name='page_template']").val();

				// If exists, fade in current post format metabox
				if ( formats[selectedElt] )
					jQuery('#' + formats[selectedElt]).fadeIn();
					// jQuery('#post-body-content').hide();
		}
		jQuery(function() {
			// Show/hide metaboxes on page load
			home_page_metabox();

			// Show/hide metaboxes on change event
			jQuery("select[name='page_template']").change(function() {
				home_page_metabox();
			});
		});
	</script>
	<?php

	endif;
}