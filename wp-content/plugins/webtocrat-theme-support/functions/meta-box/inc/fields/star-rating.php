<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Star_Rating_Field' ) )
{
	class RWMB_Star_Rating_Field extends RWMB_Field
	{
		/**
		 * Enqueue scripts and styles
		 *
		 * @return void
		 */
		static function admin_enqueue_scripts()
		{
			wp_enqueue_script( 'rwmb-star-rating', RWMB_JS_URL . 'star-rating.js', array( 'jquery' ), RWMB_VER, true );
		}

		/**
		 * Get field HTML
		 *
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $meta, $field )
		{
			$meta = (array) $meta;
			$html = array();

			$tpl = '<label class="rating%s"><input type="radio" class="rwmb-star-rating" name="%s" value="%s"%s><span class="icon dashicons-star-empty"></label>';
				
			if ( empty($field['options']) ) {
				$field['options'] = array('1' => __( '1 Star',  'webtocrat' ),'2' => __( '2 Stars', 'webtocrat' ),'3' => __( '3 Stars', 'webtocrat' ),'4' => __( '4 Stars', 'webtocrat' ),'5' => __( '5 Stars', 'webtocrat' ));
			}

			$i = 1;
			foreach ( $field['options'] as $value => $label )
			{
				$html[] = sprintf(
					$tpl,
					$i,
					$field['field_name'],
					$value,
					checked( in_array( $value, $meta ), true, false )
				);

				$i++;
			}
			return implode( ' ', $html );
		}

		/**
		 * Get meta value
		 * If field is cloneable, value is saved as a single entry in DB
		 * Otherwise value is saved as multiple entries (for backward compatibility)
		 *
		 * @see "save" method for better understanding
		 *
		 * TODO: A good way to ALWAYS save values in single entry in DB, while maintaining backward compatibility
		 *
		 * @param $post_id
		 * @param $saved
		 * @param $field
		 *
		 * @return array
		 */
		static function meta( $post_id, $saved, $field )
		{
			$meta = get_post_meta( $post_id, $field['id'], $field['clone'] );
			$meta = ( ! $saved && '' === $meta || array() === $meta ) ? $field['std'] : $meta;
			$meta = array_map( 'esc_attr', (array) $meta );

			return $meta;
		}

		/**
		 * Save meta value
		 * If field is cloneable, value is saved as a single entry in DB
		 * Otherwise value is saved as multiple entries (for backward compatibility)
		 *
		 * TODO: A good way to ALWAYS save values in single entry in DB, while maintaining backward compatibility
		 *
		 * @param $new
		 * @param $old
		 * @param $post_id
		 * @param $field
		 */
		static function save( $new, $old, $post_id, $field )
		{
			if ( ! $field['clone'] )
			{
				parent::save( $new, $old, $post_id, $field );

				return;
			}

			if ( empty( $new ) )
				delete_post_meta( $post_id, $field['id'] );
			else
				update_post_meta( $post_id, $field['id'], $new );
		}

		/**
		 * Normalize parameters for field
		 *
		 * @param array $field
		 *
		 * @return array
		 */
		static function normalize_field( $field )
		{
			$field['multiple']   = true;
			$field['field_name'] = $field['id'];
			if ( ! $field['clone'] )
				$field['field_name'] .= '[]';

			return $field;
		}
	}
}