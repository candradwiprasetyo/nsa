<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: recent-comments-widget.php
	Location	: ../webtocrat/functions/backend/widgets/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Add Webtocrat Recent Comments widget.
	
----------------------------------------------------------------------------------------------------

	Table Of Contents
	
	1.0 - Define class widget.
	2.0 - Register widget

----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
	1.0 - Define class widget.
----------------------------------------------------------------------------------------------------
*/
class Webtocrat_Recent_Comments_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_recent_comments', 'description' => __( 'Your site&#8217;s most recent comments.', 'webtocrat' ) );
		parent::__construct('recent-comments', __('Recent Comments', 'webtocrat' ), $widget_ops);
		$this->alt_option_name = 'widget_recent_comments';

		add_action( 'comment_post', array($this, 'flush_widget_cache') );
		add_action( 'edit_comment', array($this, 'flush_widget_cache') );
		add_action( 'transition_comment_status', array($this, 'flush_widget_cache') );
		add_action( 'widgets_init', array($this, 'remove_default_wp_widget' ) );
	}

	public function flush_widget_cache() {
		wp_cache_delete('widget_recent_comments', 'widget');
	}

	public function widget( $args, $instance ) {
		global $comments, $comment;

		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get('widget_recent_comments', 'widget');
		}
		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		$output = '';

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments', 'webtocrat' );

		/** This filter is documented in wp-includes/default-widgets.php */
		// $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;

		/**
		 * Filter the arguments for the Recent Comments widget.
		 *
		 * @since 3.4.0
		 *
		 * @see get_comments()
		 *
		 * @param array $comment_args An array of arguments used to retrieve the recent comments.
		 */
		$comments = get_comments( apply_filters( 'widget_comments_args', array(
			'number'      => $number,
			'status'      => 'approve',
			'post_status' => 'publish'
		) ) );

		$output .= $args['before_widget'];
		if ( $title ) {
			$output .= $args['before_title'] . $title . $args['after_title'];
		}

		$output .= '<ul id="recentcomments" class="list-unstyled">';
		if ( $comments ) {
			// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
			$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

			foreach ( (array) $comments as $comment) {

				$output .=  '<li>';
				$output .=  '<div class="media">';
				$output .=  '<a class="pull-left" href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '" title="' . get_the_title( $comment->comment_post_ID ) . '">';
				$output .=  get_avatar($comment->comment_author_email, 50);
				$output .=  '</a>';
				$output .=  '<div class="media-body">';
				$output .=  '<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '" title="' . get_the_title( $comment->comment_post_ID ) . '">';
				$output .=  '"' . trim(mb_substr(strip_tags($comment->comment_content), 0, 90)).' ...' . '"';
				$output .=  '</a>';
				$output .=  '</div>';
				$output .=  '</div>';
				$output .=  '</li>';

			}
		}
		$output .= '</ul>';
		$output .= $args['after_widget'];

		echo $output;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = $output;
			wp_cache_set( 'widget_recent_comments', $cache, 'widget' );
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['number'] = absint( $new_instance['number'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_comments']) )
			delete_option('widget_recent_comments');

		return $instance;
	}

	public function form( $instance ) {
		$title  = isset( $instance['title'] ) ? $instance['title'] : '';
		$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'webtocrat' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of comments to show:', 'webtocrat' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}

	/* Remove default wp widget */
	public function remove_default_wp_widget() {
		unregister_widget('WP_Widget_Recent_Comments');
	}
}


/**
----------------------------------------------------------------------------------------------------
	2.0 - Register widget
----------------------------------------------------------------------------------------------------
*/
register_widget( 'Webtocrat_Recent_Comments_Widget' );