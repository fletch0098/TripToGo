<?php
/**
 * Customizer info singleton class file for Pro Version.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Hestia_Customizer_Info_Singleton_Pro {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager WordPress customizer object.
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		$info_path = trailingslashit( get_template_directory() ) . 'inc/customizer-info/class/class-hestia-customizer-info.php';
		if ( file_exists( $info_path ) ) {
			require_once( $info_path );
		}

		if ( class_exists( 'Hestia_Customizer_Info' ) ) {
			// Register custom section types.
			$manager->register_section_type( 'Hestia_Customizer_Info' );

			// Register sections.
			if ( ! class_exists( 'Jetpack' ) ) {
				$manager->add_section( new Hestia_Customizer_Info( $manager, 'hestia_info_jetpack', array(
					'section_text' =>
						/* translators: %1$s is Jetpack Plugin */
						sprintf( esc_html__( 'To have access to a portfolio section please install and configure %1$s.', 'hestia-pro' ),
							esc_html__( 'Jetpack plugin', 'hestia-pro' )
						),
					'slug'         => 'jetpack',
					'panel' => 'hestia_frontpage_sections',
					'priority' => 450,
					'capability' => 'install_plugins',
					'hide_notice'  => (bool) get_option( 'dismissed-hestia_info_jetpack', false ),
					'button_screenreader' => '',
				) ) );
			}
		}
	}

	/**
	 * Loads theme customizer JS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'hestia_customizer-info-js-pro', trailingslashit( get_template_directory_uri() ) . 'inc/customizer-info/js/customizer-info-controls-pro.js', array( 'customize-controls' ), HESTIA_VERSION );

	}
}

Hestia_Customizer_Info_Singleton_Pro::get_instance();
