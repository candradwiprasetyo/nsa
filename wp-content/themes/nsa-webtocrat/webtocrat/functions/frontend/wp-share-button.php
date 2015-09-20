<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: wp-share-button.php
	Location	: ../webtocrat/functions/frontend/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Share button
	
----------------------------------------------------------------------------------------------------

*/


if( ! function_exists( 'webtocrat_share_button' ) ) {

	function webtocrat_share_button( $tooltip = false ) {

    	$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);

    	if ( $tooltip ) {
    		$class_tooltip = 'hl-tooltip';
    	} else {
    		$class_tooltip = '';
    	}

		?><ul class="list-unstyled r">
			<li class="twitter-share l">
				<a class="l <?php echo $class_tooltip; ?>" href="#" title="<?php _e('Share on', 'webtocrat'); ?> Twitter" data-title="<?php echo get_the_title(); ?>" data-url="<?php echo get_permalink(); ?>" rel="nofollow" data-original-title="Facebook" data-placement="top">
					<i class="fa fa-twitter"></i>
				</a>
			</li>
			<li class="facebook-share l">
				<a class="l <?php echo $class_tooltip; ?>" href="#" title="<?php _e('Share on', 'webtocrat'); ?> Facebook" data-url="<?php echo get_permalink(); ?>" rel="nofollow" data-original-title="Facebook" data-placement="top">
					<i class="fa fa-facebook"></i>
				</a>
			</li>
			
			<li class="google-share l">
				<a class="l <?php echo $class_tooltip; ?>" href="#" title="<?php _e('Share on', 'webtocrat'); ?> Google Plus" data-url="<?php echo get_permalink(); ?>" rel="nofollow" data-original-title="Facebook" data-placement="top">
					<i class="fa fa-google-plus"></i>
				</a>
			</li>
			<li class="pinterest-share l">
				<a class="l <?php echo $class_tooltip; ?>" href="#" title="<?php _e('Share on', 'webtocrat'); ?> Pinterest" data-title="<?php echo get_the_title(); ?>" data-url="<?php echo get_permalink(); ?>" data-image="<?php echo $image_src_array[0]; ?>" rel="nofollow" data-original-title="Facebook" data-placement="top">
					<i class="fa fa-pinterest"></i>
				</a>
			</li>
			<li class="linkedin-share l">
				<a class="l <?php echo $class_tooltip; ?>" href="#" title="<?php _e('Share on', 'webtocrat'); ?> LinkedIn" data-title="<?php echo get_the_title(); ?>" data-url="<?php echo get_permalink(); ?>" data-desc="<?php the_excerpt_max(222); ?>" rel="nofollow" data-original-title="Facebook" data-placement="top">
					<i class="fa fa-linkedin"></i>
				</a>
			</li>
		</ul><?php

	}

}