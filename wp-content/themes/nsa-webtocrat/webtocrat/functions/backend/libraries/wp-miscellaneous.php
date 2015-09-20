<?php

/**

_---------------------------------------------------------------------------------------------------

	Filename	: wp-miscellaneous.php
	Location	: ../webtocrat/functions/backend/lib/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: WP Custom Function
	
----------------------------------------------------------------------------------------------------

	Table Of Contents
	
	1.0 - Define theme information.
	2.0 - Call templates.
	3.0 - Enqueue backend style/scripts.
	4.0 - Custom login logo.
	5.0 - Custom excerpt.
	6.0 - Reset tag size.
	7.0 - Remove CSS & JS version.
    8.0 - Custom title filter.
    9.0 - Remove unnecessary code from wp head.
   10.0 - Remove Plugins widget.
   11.0 - Check Theme Support Plugins.
   12.0 - Search Permalinks.
   13.0 - Mail Content Type.
   14.0 - Block Users From wp-admin.

----------------------------------------------------------------------------------------------------

*/


/**
----------------------------------------------------------------------------------------------------
	1.0 - Define theme information.
----------------------------------------------------------------------------------------------------
*/
if( is_child_theme() ) {
	$temp_obj 	= wp_get_theme();
	$theme_obj 	= wp_get_theme( $temp_obj->get('Template') );
} else {
	$theme_obj	= wp_get_theme();    
}

$theme_version	= $theme_obj->get('Version');
$theme_name		= $theme_obj->get('Name');
$theme_uri		= $theme_obj->get('ThemeURI');
$author_uri		= $theme_obj->get('AuthorURI');

define( 'THEMENAME',		$theme_name		);
/* Theme version, uri, and the author uri are not completely necessary, but may be helpful in adding functionality */
define( 'THEMEVERSION',		$theme_version	);
define( 'THEMEURI', 		$theme_uri		);
define( 'THEMEAUTHORURI',	$author_uri		);


/**
----------------------------------------------------------------------------------------------------
	2.0 - Call templates.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_call_template' ) ) {

	function webtocrat_call_template( $element, $temp_slug, $filename ) {

		if (!empty($element)) {
			$element_name = '/' . $element . '/';
		} else {
			$element_name = '';
		}

		if (!empty($temp_slug)) {
			$temp_slug_name = $temp_slug;
		} else {
			$temp_slug_name = $filename;
		}

		get_template_part( 'webtocrat/templates/' . WEBTOCRAT_TEMPLATE_NAME . $element_name . $temp_slug_name, $filename );

	}
}


/**
----------------------------------------------------------------------------------------------------
	3.0 - Enqueue backend style/scripts.
----------------------------------------------------------------------------------------------------
*/
if( ! function_exists( 'webtocrat_backend_enqueue_styles' ) ) {

	function webtocrat_backend_enqueue_styles() {
		wp_enqueue_style( 'webtocrat-backend', WEBTOCRAT_CSS_URI . '/backend.min.css', array(), time(), 'all' );
	}

	add_action( 'admin_enqueue_scripts', 'webtocrat_backend_enqueue_styles' );
}


/**
----------------------------------------------------------------------------------------------------
	4.0 - Custom login logo.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_custom_login_logo' ) ) {

	function webtocrat_custom_login_logo() {

		global $redux_webtocrat;

		if ( ! empty($redux_webtocrat['login-logo']['url'])) {
			$login_logo	= $redux_webtocrat['login-logo']['url'];
		} else {
			$login_logo	= '';
		}

		if ( ! empty($redux_webtocrat['login-logo-retina']['url'])) {
			$login_logo_retina 	= $redux_webtocrat['login-logo-retina']['url'];
		} else {
			$login_logo_retina	= '';
		}

		if ( ! empty( $login_logo ) || ! empty( $login_logo_retina ) ) {

			$login_logo_size			= getimagesize( $login_logo );
			$login_logo_retina_size 	= getimagesize( $login_logo_retina );

			?><style type="text/css">
				body {
					background: <?php echo $redux_webtocrat['primary-color']; ?>;
				}
				.login #backtoblog a,
				.login #nav a {
				    color: #fff;
				}
				.login h1 a {
					background-image:url(<?php echo $login_logo; ?>) !important;
					width: <?php echo $login_logo_size[0]; ?>px !important;
					height: <?php echo $login_logo_size[1]; ?>px !important;
					background-size: <?php echo $login_logo_size[0]; ?>px <?php echo $login_logo_size[1]; ?>px;
				}

				@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
				only screen and (-moz-min-device-pixel-ratio: 1.5),
				only screen and (-o-min-device-pixel-ratio: 3/2),
				only screen and (min-device-pixel-ratio: 1.5) {
					.login h1 a {
						background-image:url(<?php echo $login_logo_retina; ?>) !important;
						width: <?php echo $login_logo_retina_size[0]; ?>px !important;
						height: <?php echo $login_logo_retina_size[1]; ?>px !important;
						background-size: <?php echo $login_logo_retina_size[0]; ?> <?php echo $login_logo_retina_size[1]; ?>;
					}
				}
			</style><?php

		}

	}

	add_action( 'login_enqueue_scripts', 'webtocrat_custom_login_logo');
}


/**
----------------------------------------------------------------------------------------------------
	5.0 - Custom excerpt.
----------------------------------------------------------------------------------------------------
*/
function the_excerpt_max( $charlength, $description = null, $strip_tags = false ) {

	if ( ! empty($description) ) {
		$excerpt = ( $strip_tags ) ? strip_tags( $description ) : $description;
	} else {
		$excerpt = ( $strip_tags ) ? strip_tags( get_the_excerpt() ) : get_the_excerpt();
	}
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {

		if ( empty($description) || $strip_tags ) echo '<p>';

		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';

		echo '</p>';

	} else {

		if ( empty($description) || $strip_tags ) echo '<p>';

		echo $excerpt;

		echo '</p>';
	}
}


/**
----------------------------------------------------------------------------------------------------
	6.0 - Reset tag size.
----------------------------------------------------------------------------------------------------
*/
if( ! function_exists( 'webtocrat_reset_tag_size' ) ) {

	function webtocrat_reset_tag_size($args) {

		$args['largest']	= 14; //largest tag
		$args['smallest']	= 14; //smallest tag
		$args['unit']		= 'px'; //tag font unit
		return $args;
	}

	function webtocrat_add_reset_tag_size() {
		add_filter( 'widget_tag_cloud_args', 'webtocrat_reset_tag_size' );
		
		if( class_exists('Woocommerce') ) {
			add_filter( 'woocommerce_product_tag_cloud_widget_args', 'webtocrat_reset_tag_size' );
		}
	}

	add_action( 'init', 'webtocrat_add_reset_tag_size', 2, 1);

}


/**
----------------------------------------------------------------------------------------------------
	7.0 - Remove CSS & JS version.
----------------------------------------------------------------------------------------------------
*/

/**
	JS
*/
if( ! function_exists( 'remove_js_ver' ) ) {

	function remove_js_ver() {
		global $wp_scripts;
		if ( !is_a( $wp_scripts, 'WP_Scripts' ) )
			return;
		foreach ( $wp_scripts->registered as $handle => $script )
			$wp_scripts->registered[$handle]->ver = null;
	}
	add_action( 'wp_print_scripts', 		'remove_js_ver', 100 );
	add_action( 'wp_print_footer_scripts',	'remove_js_ver', 100 );

}

/**
	CSS
*/
if( ! function_exists( 'remove_css_ver' ) ) {

	function remove_css_ver() {
		global $wp_styles;
		if ( !is_a( $wp_styles, 'WP_Styles' ) )
			return;
		foreach ( $wp_styles->registered as $handle => $style )
			$wp_styles->registered[$handle]->ver = null;
	}
	add_action( 'admin_print_styles',		'remove_css_ver', 100 );
	add_action( 'wp_print_styles',			'remove_css_ver', 100 );

}


/**
----------------------------------------------------------------------------------------------------
	8.0 - Custom title filter.
----------------------------------------------------------------------------------------------------
*/
if( ! function_exists( 'webtocrat_custom_title' ) ) {

	function webtocrat_custom_title( $format ) {

		global $paged, $page;

		if ( is_feed() ) return $title;

		$title = '';
		$sep   = '&#126;';

		// Add the site name.
		if ( !is_attachment() ) {
			if ( is_single() ) {
				$title .= get_the_title();
			} elseif ( is_page() ) {
				if ( is_front_page() ) {
					$title .= get_bloginfo( 'name' );
				} else {
					$title .= get_the_title();
				}
			} elseif ( is_404() ) {
				$title .= __('Not Found', 'webtocrat');
			}  elseif ( is_search() ) {
				$title .= __( 'Search Results for ', 'webtocrat' ) . ucwords(get_search_query());
			} elseif ( is_archive() ) {
				if ( is_day() ) {
					$title .= __( 'Daily Archives for ', 'webtocrat' ) . get_the_date();
				} elseif ( is_month() ) {
					$title .= __( 'Monthly Archives for ', 'webtocrat' ) . get_the_date('F Y');
				} elseif ( is_year() ) {
					$title .= __( 'Yearly Archives for ', 'webtocrat' ) . get_the_date('Y');
				} elseif ( is_category() ) {
					$title .= __( 'Category Archives for ', 'webtocrat' ) . single_cat_title( '', false );
				} elseif ( is_tag() ) {
					$title .= __( 'Tag Archives for ', 'webtocrat' ) . ucwords(single_tag_title( '', false ));
				} else {
					$title .= __( 'Archives', 'webtocrat' );;
				}
			} else {
				$title .= get_bloginfo( 'name' );
			}
		}

		if ( is_attachment() ) {
			$title .= ucwords(get_the_title());
		}

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );

		// $title = "$title $sep $site_description";

		if ( is_home() || is_front_page() || is_page() ) {
			$title = "$title $sep $site_description";
		}

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = sprintf( __( 'Page %s', 'webtocrat' ), max( $paged, $page ) ) . ' ' . $sep . ' ' . $site_description;
		}

		if ( is_single() ) {
			$title = "$title $sep $site_description";
		}

		if ( is_404()  ){
			$title = "$title $sep $site_description";
		}

		return $title;

	}

	add_filter( 'wp_title', 'webtocrat_custom_title', 10, 2 );
}


/**
----------------------------------------------------------------------------------------------------
	9.0 - Remove unnecessary code from wp head.
----------------------------------------------------------------------------------------------------
*/
remove_action('wp_head', 'wp_generator');


/**
----------------------------------------------------------------------------------------------------
   10.0 - Remove Plugins widget.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'remove_plugins_widget' ) ) {
	function remove_plugins_widget() {
		unregister_widget('LayerSlider_Widget');
	}
	add_action( 'widgets_init', 'remove_plugins_widget' );
}


/**
----------------------------------------------------------------------------------------------------
   11.0 - Check Theme Support Plugins.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'check_theme_support_plugins' ) ) {

	function check_theme_support_plugins() {
		global $check_theme_support;

		$check_theme_support = false;

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( is_plugin_active( 'webtocrat-theme-support/webtocrat-theme-support.php' ) ) {
			$check_theme_support = true;
		}
		
		return $check_theme_support;
	}
}


/**
----------------------------------------------------------------------------------------------------
   12.0 - Search Permalinks.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_search_permalinks' ) ) {

	/* SEARCH PERMALINKS */
	function webtocrat_search_permalinks() {
	  if ( is_search() && strpos($_SERVER['REQUEST_URI'], '/wp-admin/') === false && strpos($_SERVER['REQUEST_URI'], '/search/') === false ) {
	    wp_redirect( home_url() . '/search/' . str_replace(' ', '-', str_replace('%20', '-', strtolower(get_query_var('s')))).'/');
	    exit();
	  }
	}

	add_action('template_redirect', 'webtocrat_search_permalinks');
}


/**
----------------------------------------------------------------------------------------------------
   13.0 - Mail Content Type.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_mail_content_type' ) ) {

	function webtocrat_mail_content_type(){
	    return "text/html";
	}

	add_filter( 'wp_mail_content_type','webtocrat_mail_content_type' );
}


/**
----------------------------------------------------------------------------------------------------
   14.0 - Block Users From wp-admin.
----------------------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'webtocrat_blockusers_init' ) ) {

	function webtocrat_blockusers_init() {
	    $file = basename($_SERVER['PHP_SELF']);
	    if (is_user_logged_in() && is_admin() && !current_user_can('edit_posts') && $file != 'admin-ajax.php'){
	        wp_redirect( home_url() );
	        exit();
	    }
	}
	add_action('init', 'webtocrat_blockusers_init');
}