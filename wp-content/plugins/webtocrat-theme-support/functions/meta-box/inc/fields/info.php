<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Info_Field' ) )
{
	class RWMB_Info_Field extends RWMB_Field
	{
		/**
		 * Enqueue scripts and styles
		 *
		 * @return void
		 */
		static function admin_enqueue_scripts()
		{
			wp_enqueue_style( 'rwmb-info', RWMB_CSS_URL . 'info.css', array(), RWMB_VER );
		}

		/**
		 * Show begin HTML markup for fields
		 *
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function begin_html( $meta, $field )
		{
			return sprintf(
				'<span class="option-desc">%s</span>',
				$field['text']
			);
		}

		/**
		 * Show end HTML markup for fields
		 *
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function end_html( $meta, $field )
		{
			return '';
		}
	}
}
