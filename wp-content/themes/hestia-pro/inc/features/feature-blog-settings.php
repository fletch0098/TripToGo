<?php
/**
 * Customizer functionality for the Blog settings panel.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

// Load Authors multiple select control.
$multiple_select_path = trailingslashit( get_template_directory() ) . 'inc/customizer-multiple-select/class-hestia-authors-multiple-select.php';
if ( file_exists( $multiple_select_path ) ) {
	require_once( $multiple_select_path );
}

// Load Blog subscribe
$subscribe_info_path = trailingslashit( get_template_directory() ) . 'inc/customizer-subscribe-info/class-hestia-subscribe-info.php';
if ( file_exists( $subscribe_info_path ) ) {
	require_once( $subscribe_info_path );
}

/**
 * Hook controls for Blog Settings section to Customizer.
 *
 * @since Hestia 1.0
 */
function hestia_blog_settings_customize_register( $wp_customize ) {

	// Alternative Blog Layout.
	$wp_customize->add_setting( 'hestia_alternative_blog_layout', array(
		'default' => false,
		'sanitize_callback' => 'hestia_sanitize_checkbox',
	));

	$wp_customize->add_control( 'hestia_alternative_blog_layout',array(
		'label' => esc_html__( 'Enable Alternative Blog Layout?','hestia-pro' ),
		'description' => esc_html__( 'If enabled, the blog page will use the alternative layout.', 'hestia-pro' ),
		'section' => 'hestia_general',
		'priority' => 3,
		'type' => 'checkbox',
	));

	// Add authors on blog page panel.
	$wp_customize->add_section( 'hestia_blog_authors', array(
		'title' => esc_html__( 'Authors Section', 'hestia-pro' ),
		'panel' => 'hestia_blog_settings',
		'priority' => 20,
	));

	if ( class_exists( 'Hestia_Authors_Multiple_Select' ) ) {
		// Authors on blog multiselect.
		$wp_customize->add_setting( 'hestia_authors_on_blog', array(
			'sanitize_callback' => 'hestia_sanitize_multiselect',
			'default' => '0',
		));

		$wp_customize->add_control(	new Hestia_Authors_Multiple_Select( $wp_customize,	'hestia_authors_on_blog',
			array(
				'description'   => wp_kses( __( 'Select the team members to appear at the bottom of the blog archive pages. Hold down <b>control / cmd</b> key to select multiple members.', 'hestia-pro' ), array(
					'b' => array(),
				) ),
				'label'         => esc_html__( 'Team members to appear on blog page', 'hestia-pro' ),
				'section'       => 'hestia_blog_authors',
				'type'          => 'multiple-select',
				'repeater'      => 'hestia_team_content',
				'priority'      => 1,
				'default_content' => json_encode( array(
						array(
							'image_url' => get_template_directory_uri() . '/assets/img/1.jpg',
							'title' => esc_html__( 'Anakin Skywalker', 'hestia-pro' ),
							'subtitle' => esc_html__( 'Former Jedi', 'hestia-pro' ),
							'text' => esc_html__( 'Once a heroic Jedi Knight, Darth Vader was seduced by the dark side of the Force, became a Sith Lord, and led the Empire\'s eradication of the Jedi Order.', 'hestia-pro' ),
							'id' => 'customizer_repeater_56d7ea7f40c56',
							'social_repeater' => json_encode( array(
								array(
									'id' => 'customizer-repeater-social-repeater-57fb908674e06',
									'link' => 'facebook.com',
									'icon' => 'fa-facebook',
								),
								array(
									'id' => 'customizer-repeater-social-repeater-57fb9148530fc',
									'link' => 'twitter.com',
									'icon' => 'fa-twitter',
								),
								array(
									'id' => 'customizer-repeater-social-repeater-57fb9150e1e89',
									'link' => 'linkedin.com',
									'icon' => 'fa-linkedin',
								),
							) ),
						),
						array(
							'image_url' => get_template_directory_uri() . '/assets/img/2.jpg',
							'title' => esc_html__( 'Obi-Wan Kenobi', 'hestia-pro' ),
							'subtitle' => esc_html__( 'Jedi Trainer', 'hestia-pro' ),
							'text' => esc_html__( 'A legendary Jedi Master, Obi-Wan Kenobi was a noble man and gifted in the ways of the Force. He trained Anakin and Luke Skywalker as a mentor.', 'hestia-pro' ),
							'id' => 'customizer_repeater_56d7ea7f40c66',
							'social_repeater' => json_encode( array(
								array(
									'id' => 'customizer-repeater-social-repeater-57fb9155a1072',
									'link' => 'facebook.com',
									'icon' => 'fa-facebook',
								),
								array(
									'id' => 'customizer-repeater-social-repeater-57fb9160ab683',
									'link' => 'twitter.com',
									'icon' => 'fa-twitter',
								),
								array(
									'id' => 'customizer-repeater-social-repeater-57fb916ddffc9',
									'link' => 'linkedin.com',
									'icon' => 'fa-linkedin',
								),
							) ),
						),
						array(
							'image_url' => get_template_directory_uri() . '/assets/img/3.jpg',
							'title' => esc_html__( 'Luke Skywalker', 'hestia-pro' ),
							'subtitle' => esc_html__( 'Jedi', 'hestia-pro' ),
							'text' => esc_html__( 'Luke Skywalker was a Tatooine farmboy who rose from humble beginnings to become one of the greatest Jedi the galaxy has ever known.', 'hestia-pro' ),
							'id' => 'customizer_repeater_56d7ea7f40c76',
							'social_repeater' => json_encode( array(
								array(
									'id' => 'customizer-repeater-social-repeater-57fb917e4c69e',
									'link' => 'facebook.com',
									'icon' => 'fa-facebook',
								),
								array(
									'id' => 'customizer-repeater-social-repeater-57fb91830825c',
									'link' => 'twitter.com',
									'icon' => 'fa-twitter',
								),
								array(
									'id' => 'customizer-repeater-social-repeater-57fb918d65f2e',
									'link' => 'linkedin.com',
									'icon' => 'fa-linkedin',
								),
							) ),
						),
						array(
							'image_url' => get_template_directory_uri() . '/assets/img/4.jpg',
							'title' => esc_html__( 'Leia Organa', 'hestia-pro' ),
							'subtitle' => esc_html__( 'Rebel Leader', 'hestia-pro' ),
							'text' => esc_html__( 'Princess Leia Organa was one of the Rebel Alliance\'s greatest leaders, fearless on the battlefield and dedicated to ending the tyranny of the Empire.', 'hestia-pro' ),
							'id' => 'customizer_repeater_56d7ea7f40c86',
							'social_repeater' => json_encode( array(
								array(
									'id' => 'customizer-repeater-social-repeater-57fb925cedcb2',
									'link' => 'facebook.com',
									'icon' => 'fa-facebook',
								),
								array(
									'id' => 'customizer-repeater-social-repeater-57fb92615f030',
									'link' => 'twitter.com',
									'icon' => 'fa-twitter',
								),
								array(
									'id' => 'customizer-repeater-social-repeater-57fb9266c223a',
									'link' => 'linkedin.com',
									'icon' => 'fa-linkedin',
								),
							) ),
						),
					)
				),
			)
		) );
	}// End if().

	// Background image for authors section on blog.
	$wp_customize->add_setting( 'hestia_authors_on_blog_background', array(
		'default' => get_template_directory_uri() . '/assets/img/header.jpg',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hestia_authors_on_blog_background', array(
		'label' => esc_html__( 'Background Image', 'hestia-pro' ),
		'section' => 'hestia_blog_authors',
		'priority' => 2,
	)));

	// Add subscribe on blog page panel.
	$wp_customize->add_section( 'hestia_blog_subscribe', array(
		'title' => esc_html__( 'Subscribe Section', 'hestia-pro' ),
		'panel' => 'hestia_blog_settings',
		'priority' => 30,
	));

	$wp_customize->add_setting( 'hestia_blog_subscribe_title', array(
		'default' => esc_html__( 'Subscribe to our Newsletter', 'hestia-pro' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	));

	$wp_customize->add_control( 'hestia_blog_subscribe_title', array(
		'label' => esc_html__( 'Section Title', 'hestia-pro' ),
		'section' => 'hestia_blog_subscribe',
		'priority' => 10,
	));

	$wp_customize->add_setting( 'hestia_blog_subscribe_subtitle', array(
		'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'hestia-pro' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	));

	$wp_customize->add_control( 'hestia_blog_subscribe_subtitle', array(
		'label' => esc_html__( 'Section Subtitle', 'hestia-pro' ),
		'section' => 'hestia_blog_subscribe',
		'priority' => 15,
	));

	if ( class_exists( 'Hestia_Subscribe_Info' ) ) {
		$wp_customize->add_setting( 'hestia_blog_subscribe_info', array(
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( new Hestia_Subscribe_Info( $wp_customize, 'hestia_blog_subscribe_info', array(
			'label'      => esc_html__( 'Instructions', 'hestia-pro' ),
			'section'    => 'hestia_blog_subscribe',
			'capability' => 'install_plugins',
			'priority'   => 20,
		) ) );
	}
}

add_action( 'customize_register', 'hestia_blog_settings_customize_register' );
