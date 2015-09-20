<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: wp-post-meta.php
	Location	: ../webtocrat/functions/frontend/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Display meta information for a specific post
	
----------------------------------------------------------------------------------------------------

*/

if ( ! function_exists( 'webtocrat_post_meta' ) ) {

	function webtocrat_post_meta() {
		echo '<ul class="list-inline">';

		if ( get_post_type() == 'post' ) {
			// If the post is sticky, mark it.
			if ( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'webtocrat' ) . ' <i class="fa fa-circle"></i></li>';
			}

			// Get the date.
			echo '<li class="meta-date">' . get_the_date('d M Y') . '</li>';
			// echo '<li class="meta-date"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_date('d M Y') . '</a></li>';

			// Get the post author.
			printf(
				'<li class="meta-author"><i class="fa fa-circle"></i>%1$s</li>',
				get_the_author()
			);

			// Comments link.
			if ( comments_open() ) :
				echo '<li class="hidden-xs">';
				echo '<span class="meta-reply"><i class="fa fa-circle"></i>';
				comments_number( '0 Comment', '1 Comment', '% Comments' );
				echo '</span>';
				echo '</li>';
			else :
				echo '<li class="hidden-xs">';
				echo '<span class="meta-reply"><i class="fa fa-circle"></i><i class="fa fa-lock"></i>';
				echo __( 'Comment', 'webtocrat' );
				echo '</span>';
				echo '</li>';
			endif;

			// The categories.
			$i = 1;
			$category_list = '';
			foreach( (get_the_category()) as $category ) {

				if ($i > 3) {
					break;
				} else {
					$category_list .= $category->cat_name . ', ';
				}

				$i++;
			}

			echo '<li class="meta-categories hidden-xs"><i class="fa fa-circle"></i>' . __('Category', 'webtocrat') . ': &#160; ' . ucwords( substr( $category_list, 0, -2) ) . '</li>';

			// Edit link.
			if ( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( '<i class="fa fa-pencil"></i>' . __( 'Edit', 'webtocrat' ), '<span class="meta-edit"><i class="fa fa-circle"></i>', '</span>' );
				echo '</li>';
			}
		}

		echo '</ul>';
	}

}