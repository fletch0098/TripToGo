<?php
/**
 * Customizer functionality for the Footer credits.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

/**
 * Hook controls for General section to Customizer.
 *
 * @since Hestia 1.0
 * @modified 1.1.34
 */
function hestia_general_footer_customize_register( $wp_customize ) {

	$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;

	$wp_customize->add_section( 'hestia_footer_content', array(
		'title' => esc_html__( 'Footer Options', 'hestia-pro' ),
		'priority' => 50,
	));

	$wp_customize->add_setting( 'hestia_general_credits', array(
		'default' =>
			/* translators: %1$s is Theme name wrapped in <a> tag, %2$s is WordPress link */
			sprintf( esc_html__( '%1$s | Powered by %2$s', 'hestia-pro' ),
				/* translators: %s is Theme name */
				sprintf( '<a href="https://themeisle.com/themes/hestia/" target="_blank" rel="nofollow">%s</a>',
					esc_html__( 'Hestia', 'hestia-pro' )
				),
				/* translators: %s is WordPress */
				sprintf( '<a href="http://wordpress.org/" rel="nofollow">%s</a>', esc_html__( 'WordPress', 'hestia-pro' ) )
			),
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => $selective_refresh ? 'postMessage' : 'refresh',
	));

	$wp_customize->add_control( 'hestia_general_credits', array(
		'label' => esc_html__( 'Footer Credits', 'hestia-pro' ),
		'section' => 'hestia_footer_content',
		'priority' => 25,
		'type' => 'textarea',
	));

	$wp_customize->add_setting( 'hestia_copyright_alignment', array(
		'default' => 'right',
		'sanitize_callback' => 'hestia_sanitize_alignment_options',
		'transport'         => $selective_refresh ? 'postMessage' : 'refresh',
	));

	$wp_customize->add_control( new Hestia_Customize_Control_Radio_Image( $wp_customize, 'hestia_copyright_alignment', array(
		'priority'  => 30,
		'section'  => 'hestia_footer_content',
		'choices'  => array(
			'left'  => esc_html__( 'Left','hestia-pro' ),
			'center'  => esc_html__( 'Center','hestia-pro' ),
			'right' => esc_html__( 'Right','hestia-pro' ),

		),
		'choices'   => array(
			'left' => array(
				'url' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer-radio-image/img/align-left.png',
				'label' => esc_html__( 'Left Sidebar', 'hestia-pro' ),
			),
			'center' => array(
				'url' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer-radio-image/img/align-center.png',
				'label' => esc_html__( 'Full Width','hestia-pro' ),
			),
			'right' => array(
				'url' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer-radio-image/img/align-right.png',
				'label' => esc_html__( 'Right Sidebar', 'hestia-pro' ),
			),
		),
	) ) );

}

add_action( 'customize_register', 'hestia_general_footer_customize_register' );


/**
 * Add selective refresh for footer controls.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @since 1.1.34
 * @access public
 */
function hestia_register_footer_partials( $wp_customize ) {
	$wp_customize->selective_refresh->add_partial( 'hestia_general_credits', array(
		'selector'            => 'footer .hestia-bottom-footer-content .copyright',
		'settings'            => 'hestia_general_credits',
		'render_callback'     => 'hestia_general_credits_callback',
	) );

	$wp_customize->selective_refresh->add_partial( 'hestia_copyright_alignment', array(
		'selector'            => 'footer .hestia-bottom-footer-content',
		'settings'            => 'hestia_copyright_alignment',
		'render_callback'     => 'hestia_copyright_alignment_callback',
	) );

}
add_action( 'customize_register', 'hestia_register_footer_partials' );

/**
 * Sanitize alignment control.
 *
 * @since 1.1.34
 * @param string $value Control output.
 * @return string
 */
function hestia_sanitize_alignment_options( $value ) {
	$value = sanitize_text_field( $value );
	$valid_values = array(
		'left',
		'center',
		'right',
	);

	if ( ! in_array( $value, $valid_values ) ) {
		wp_die( 'Invalid value, go back and try again.' );
	}

	return $value;
}

/**
 * Callback function for Copyright control.
 *
 * @return string
 * @since 1.1.34
 */
function hestia_general_credits_callback() {
	return get_theme_mod( 'hestia_general_credits' );
}

/**
 * Callback function for copyright alignment.
 *
 * @since 1.1.34
 */
function hestia_copyright_alignment_callback() {
	hesta_bottom_footer_content( true );
}
