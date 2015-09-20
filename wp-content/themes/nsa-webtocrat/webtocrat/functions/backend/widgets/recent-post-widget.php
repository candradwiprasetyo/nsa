<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: recent-post-widget.php
	Location	: ../webtocrat/functions/backend/widgets/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Add Webtocrat Recent Post widget.
	
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
class Webtocrat_Recent_Post_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "Your site&#8217;s most recent Posts.", 'webtocrat' ) );
		parent::__construct('recent-posts', __('Recent Posts', 'webtocrat' ), $widget_ops);
		$this->alt_option_name = 'widget_recent_entries';

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
		add_action( 'widgets_init', array($this, 'remove_default_wp_widget' ) );
	}

	public function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'widget_recent_posts', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'webtocrat' );

		/** This filter is documented in wp-includes/default-widgets.php */
		// $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<ul class="list-unstyled">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>" title="<?php get_the_title() ? the_title() : the_ID(); ?>">
					<div class="news-date">
						<span class="l">
							<i class="date"><?php echo get_the_date('d'); ?></i>
							<i class="month"><?php echo get_the_date('M'); ?></i>
						</span>
					</div>
					<?php get_the_title() ? the_title() : the_ID(); ?>
				</a>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $args['after_widget']; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'widget_recent_posts', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = $new_instance['title'];
		$instance['number']    = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');

		return $instance;
	}

	public function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? $instance['title'] : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $instance = wp_parse_args( (array) $instance, $defaults );
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'webtocrat' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'webtocrat' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}

	/* Remove default wp widget */
	public function remove_default_wp_widget() {
		unregister_widget('WP_Widget_Recent_Posts');
	}

}


/**
----------------------------------------------------------------------------------------------------
	2.0 - Register widget
----------------------------------------------------------------------------------------------------
*/
register_widget( 'Webtocrat_Recent_Post_Widget' );