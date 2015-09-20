<?php


class Walker_Bootstrap_Comment extends Walker_Comment{

	protected function html5_comment( $comment, $depth, $args ) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
        $has_children=$args['has_children'];
?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $has_children ) ? '' : 'parent' ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body list-group-item">
				<div class="comment-meta media">
					<a href="<?php get_comment_author_link(); ?>" title="<?php get_comment_author(); ?>" class="comment-author vcard pull-left">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					</a>
                    <div class="media-body">
                        <div class="media-heading">
                            <?php
								$url = get_comment_author_url();
								if ( ! empty($url) ) {
									$parse = parse_url($url);
									$autor_domain = '<cite class="fn">,</cite><span class="domain">'.$parse['host'].'</span>';
								} else {
									$autor_domain = '';
								}
                            	printf( '<cite class="fn">%1$s</cite>%2$s<time datetime="%3$s" class="date r">%4$s</time>', get_comment_author_link(), $autor_domain, get_comment_time( 'c' ), get_comment_time( 'F j, Y' ) );
                            ?>
                        </div>
						<div class="comment-content">
							<?php comment_text(); ?>
						</div>
                        <div class="comment-metadata r">
							<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                            <?php edit_comment_link( __( 'Edit','webtocrat' ), '<span class="edit-link"><i class="fa fa-pencil"></i>', '</span>' ); ?>
                        </div>
                    </div>
                </div>
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation">
                        <?php _e( 'Your comment is awaiting moderation.', 'webtocrat' ); ?>
                    </p>
                <?php endif; ?>
			</article>
<?php
	}

}