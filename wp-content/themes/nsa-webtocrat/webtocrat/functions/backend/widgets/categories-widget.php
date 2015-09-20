<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: categories-widgets.php
	Location	: ../webtocrat/functions/backend/widgets/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: Add Webtocrat Categories widget
	
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
class Webtocrat_Categories_Custom_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'widget_categories', 'description' => __( "A list or dropdown of categories.", 'webtocrat' ) );
		parent::__construct('categories', __('Categories', 'webtocrat' ), $widget_ops);

		add_filter('wp_list_categories', array($this, 'cat_count_span'			 ) );
		add_action( 'widgets_init',      array($this, 'remove_default_wp_widget' ) );
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = empty( $instance['title'] ) ? __( 'Categories', 'webtocrat' ) : $instance['title'];

		$c = ! empty( $instance['count'] ) ? '1' : '0';
		$h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
		$d = ! empty( $instance['dropdown'] ) ? '1' : '0';

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$cat_args = array('orderby' => 'name', 'show_count' => $c, 'hierarchical' => $h);

		if ( $d ) {
			webtocrat_enqueue_style('webtocrat-select2');
			webtocrat_enqueue_script('webtocrat-select2-js');

			$cat_args['show_option_none'] = __('Select Category', 'webtocrat' );
			$cat_args['class']            = 'webtocrat-select2';

			/**
			 * Filter the arguments for the Categories widget drop-down.
			 *
			 * @since 2.8.0
			 *
			 * @see wp_dropdown_categories()
			 *
			 * @param array $cat_args An array of Categories widget drop-down arguments.
			 */
			wp_dropdown_categories( apply_filters( 'widget_categories_dropdown_args', $cat_args ) );

		} else {
?>
		<ul>
<?php
		$cat_args['title_li'] = '';

		/**
		 * Filter the arguments for the Categories widget.
		 *
		 * @since 2.8.0
		 *
		 * @param array $cat_args An array of Categories widget options.
		 */
		wp_list_categories( apply_filters( 'widget_categories_args', $cat_args ) );
?>
		</ul>
<?php
		}

		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['count'] = !empty($new_instance['count']) ? 1 : 0;
		$instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
		$instance['dropdown'] = !empty($new_instance['dropdown']) ? 1 : 0;

		return $instance;
	}

	public function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title'];
		$count = isset($instance['count']) ? (bool) $instance['count'] :false;
		$hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
		$dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'webtocrat' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>"<?php checked( $dropdown ); ?> />
		<label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e( 'Display as dropdown', 'webtocrat' ); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
		<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts', 'webtocrat' ); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
		<label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show hierarchy', 'webtocrat' ); ?></label></p>
<?php
	}

	/* Add span elemen category count */
	public function cat_script_function() { ?>
		<script type='text/javascript'>function onCatChange(){dropdown.options[dropdown.selectedIndex].value>0&&(location.href="<?php echo home_url(); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value)}var dropdown=document.getElementById("cat");dropdown.onchange=onCatChange;</script>
	<?php }

	/* Add span elemen category count */
	public function cat_count_span($links) {
		$links = str_replace('</a> (', '</a> <span class="count">', $links);
		$links = str_replace(')', '</span>', $links);
		$links = str_replace(array('(',')'), '', $links);
		$links = str_replace('</span></span>', '</span>', $links);
		return $links;
	}

	/* Remove default wp widget */
	public function remove_default_wp_widget() {
		unregister_widget('WP_Widget_Categories');
	}

}


/**
----------------------------------------------------------------------------------------------------
	2.0 - Register widget
----------------------------------------------------------------------------------------------------
*/
register_widget( 'Webtocrat_Categories_Custom_Widget' );