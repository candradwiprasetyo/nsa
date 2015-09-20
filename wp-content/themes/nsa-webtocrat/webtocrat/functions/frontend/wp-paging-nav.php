<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: wp-paging-nav.php
	Location	: ../webtocrat/functions/frontend/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Display navigation to the next/previous set of posts
	
----------------------------------------------------------------------------------------------------

*/

if ( ! function_exists( 'webtocrat_paging_nav' ) ) {

	function webtocrat_paging_nav( $add_class = null ) {

		global $wp_query, $paged;

		$pages = '';
		$range = 2;

		if ( ! empty( $add_class ) ) {
			$class = $add_class;
		} else {
			$class = '';
		}

		$showitems = ( $range * 2 ) + 1;

		if( empty($paged) ) $paged = 1;

		if( $pages == '' ){

			$pages = $wp_query->max_num_pages;

			if( ! $pages ) $pages = 1;

		}

		if( 1 != $pages ) { ?>

			<nav class="pagination wow fadeInUp <?php echo $class; ?>">
				<ul class="list-unstyled">
			<?php
				if( $paged > 1 ) { ?>
					<li class="prev l">
						<a href="<?php echo get_pagenum_link( $paged - 1 ); ?>" title="<?php _e( 'Previous Page', 'webtocrat' ); ?>">
							<i class="icon-angle-left"></i>
							<?php _e( 'Previous Page', 'webtocrat' ); ?>
						</a>
					</li>
				<?php } else { ?>
					<li class="prev l">
						<span>
							<i class="icon-angle-left"></i>
							<?php _e( 'Previous Page', 'webtocrat' ); ?>
						</span>
					</li>
			<?php }

			for ( $i=1; $i <= $pages; $i++ ) {

				if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
					
					if ( $paged == $i ) { ?>
						<li class="active l">
							<span><?php echo $i; ?></span>
						</li>
					<?php } else { ?>
						<li class="l">
							<a href="<?php echo get_pagenum_link($i); ?>" title="<?php _e( 'Page', 'webtocrat' ); ?> <?php echo get_pagenum_link($i); ?>">
								<?php echo $i; ?>
							</a>
						</li>
					<?php }

				}
			}

			if( $paged < $pages ) { ?>
				
				<li class="next l">
					<a href="<?php echo get_pagenum_link( $paged + 1 ); ?>" title="<?php _e( 'Next Page', 'webtocrat' ); ?>">
						<i class="icon-angle-right"></i>
						<?php _e( 'Next Page', 'webtocrat' ); ?>
					</a>
				</li>
			
			<?php } else { ?>
				<li class="next l">
					<span>
						<i class="icon-angle-right"></i>
						<?php _e( 'Next Page', 'webtocrat' ); ?>
					</span>
				</li>
			<?php } ?>

				</ul>
			</nav>

		<?php }
	}
} else { ?>

	<nav class='pagination col-sm-12'>
		<ul class="list-unstyled">
			<?php 
				if ( get_previous_posts_link() ) : ?>
				<li class="next">
					<?php previous_posts_link( __( 'Newer Posts &rarr;', 'webtocrat' ) ); ?>
				</li>
				<?php endif;
			 ?>
			<?php 
				if ( get_next_posts_link() ) : ?>
				<li class="previous">
					<?php next_posts_link( __( '&larr; Older Posts', 'webtocrat' ) ); ?>
				</li>
				<?php endif;
			 ?>
		</ul>
	</nav>
<?php }