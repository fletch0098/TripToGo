<?php
/**
 * Customizer range value control main file.
 *
 * @package Hestia
 * @since 1.1.31
 */

/**
 * Require customizer range value control class.
 */
require_once( HESTIA_PHP_INCLUDE . 'customizer-range-value/class/class-hestia-customizer-range-value-control.php' );

/**
 * Adds inline style for sidebar width
 *
 * @since 1.1.31
 */
function hestia_sidebar_width_inline_style() {
	$custom_css              = '';

	$default_blog_layout = hestia_sidebar_on_single_post_get_default();
	$hestia_blog_sidebar_layout = get_theme_mod( 'hestia_blog_sidebar_layout', $default_blog_layout );
	$custom_css .= hestia_sidebar_style( $hestia_blog_sidebar_layout, 'blog' );
	$hestia_page_sidebar_layout = get_theme_mod( 'hestia_page_sidebar_layout', 'full-width' );
	$custom_css .= hestia_sidebar_style( $hestia_page_sidebar_layout, 'page' );

	wp_add_inline_style( 'hestia_style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'hestia_sidebar_width_inline_style' );

/**
 * Add inline style for sidebar width.
 *
 * @param string $layout Page layout.
 * @param string $type Control type.
 * @return string
 */
function hestia_sidebar_style( $layout, $type ) {
	$hestia_sidebar_width = get_theme_mod( 'hestia_sidebar_width',25 );
	$custom_css = '';
	if ( $layout !== 'full-width' ) {

		if ( ! empty( $hestia_sidebar_width ) ) {
			$hestia_content_width = 100 - $hestia_sidebar_width;

			if ( $hestia_sidebar_width <= 3 || $hestia_sidebar_width >= 80 ) {
				$hestia_content_width = 100;
				$hestia_sidebar_width = 100;
			}
			$content_width = $hestia_content_width - 8.33333333;
			switch ( $type ) {
				case 'blog':
					if ( is_active_sidebar( 'sidebar-1' ) ) {
						$custom_css .= '
	                    @media (min-width: 992px){
	                        .blog-sidebar{
	                            width: ' . $hestia_sidebar_width . '%;
	                            display: inline-block;
	                        }
	                
	                        .single-post-wrap,
	                        .blog-posts-wrap, 
	                        .archive-post-wrap {
	                            width: ' . $content_width . '%;
	                        }
	                    } ';
					}
					break;
				case 'page':
					if ( is_active_sidebar( 'sidebar-woocommerce' ) ) {
						$custom_css .= '
		                    @media (min-width: 992px){
		                        .shop-sidebar.card.card-raised.col-md-3 {
		                            width: ' . $hestia_sidebar_width . '%;
		                        }
		                        .content-sidebar-left,
		                        .content-sidebar-right,
		                        .page-content-wrap{
		                
		                            width: ' . $hestia_content_width . '%;
		                        }
		                    }';
					}
			}
		}// End if().
	}// End if().
	return $custom_css;
}
