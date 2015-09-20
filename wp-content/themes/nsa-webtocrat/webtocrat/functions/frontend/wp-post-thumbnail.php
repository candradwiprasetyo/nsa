<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: wp-post-thumbnail.php
	Location	: ../webtocrat/functions/frontend/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Define post thumbnail size
	
----------------------------------------------------------------------------------------------------

*/


if( ! function_exists( 'webtocrat_post_thumbnail' ) ) {

	function webtocrat_post_thumbnail( $format, $single = false ) {

		global $post;

		if ( empty( $format ) ) $format = 'default'; // default , gallery, fullscreen, masonry

		$width  = '750';
		$height = '300';
		$title  = get_the_title( $post->ID );
		$link   = get_the_permalink( $post->ID );

		/* Attachment */
		$args  = array(
		  'order'          => 'ASC',
		  'post_type'      => 'attachment',
		  'post_parent'    => $post->ID,
		  'post_mime_type' => 'image',
		  'post_status'    => null,
		  'numberposts'    => -1,
		);
		$attachment = get_children($args);

		if ( $format == 'gallery' ) {

			// Enqueue Owl Carousel plugin
			webtocrat_enqueue_style('webtocrat-owl-carousel');
			webtocrat_enqueue_script('webtocrat-owl-carousel-js');
			// Enqueue IOS7 font
			webtocrat_enqueue_style('webtocrat-font-ios7');

			$i = 1;
			$post_thumbnail = '';

            foreach( $attachment as $images ){
            	if( $i > 5 ) break;

            	// Get Image Info
				$image = wp_get_attachment_image_src( $images->ID, 'full' );
				$src   = $image[0];

				// Get Image Size
				if ( ! empty( $src ) ) {
					$size  = getimagesize( $src );

					// Resize if image width less than 750px
					if ($size[0] >= 750 ) {
						$upscale = false;
					} else {
						$upscale = true;
					}

				} else {
					$upscale = false;
				}

				// Resize image on the fly with Aqua Resize plugin
				$post_thumb	= aq_resize( $src, $width, $height, true, true, $upscale );

				// If image not found
				if( empty( $post_thumb ) ) $post_thumb = 'http://placehold.it/' . $width . 'x' .$height;

				$post_thumbnail .= '<div class="item">'.
								   '<a href="'.$link.'" title="'.$title.'">'.
								   '<img src="'.$post_thumb.'" alt="'.$title.'" width="'.$width.'" height="'.$height.'" >'.
								   '</a>'.
								   '</div>';

              	$i++;
            }

			// If post format is gallery
			$webtocrat_post_thumbnail = $post_thumbnail;
		} else {
			// Default

			// Get Image URL
			$src      = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

			// Get Image Size
			if ( ! empty( $src ) ) {
				$size  = getimagesize( $src );

				// Resize if image width less than 750px
				if ($size[0] >= 750 ) {
					$upscale = false;
				} else {
					$upscale = true;
				}

			} else {
				$upscale = false;
			}

			// Resize if image width less than 750px
			if (! empty( $size ) && $size[0] >= 750 ) {
				$upscale = false;
			} else {
				$upscale = true;
			}

			// Resize image on the fly with Aqua Resize plugin
			$post_thumb	= aq_resize( $src, $width, $height, true, true, $upscale );

			$post_thumbnail  = '';

			// If image not found
			if( empty( $post_thumb ) ) {
				$post_thumbnail  = '';
			} else {
				if ( $single ) {
					$link = $src;
					$rel  = ' rel="prettyPhoto"';
				} else {
					$link = $link;
					$rel  = '';
				}
				$post_thumbnail .= '<figure class="entry-thumbnail">'.
								   '<a'. $rel .' href="'.$link.'" title="'.$title.'">'.
							       '<img src="'.$post_thumb.'" alt="'.$title.'" width="'.$width.'" height="'.$height.'" ><i class="fa fa-image"></i>'.
							       '</a>'.
							       '</figure>';
			}

			$webtocrat_post_thumbnail = $post_thumbnail;
		}		

		return $webtocrat_post_thumbnail;
	}
}