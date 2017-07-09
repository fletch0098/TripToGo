<?php
/**
 * The range value customize control extends the WP_Customize_Control class.
 *
 * @package Hestia
 * @since Hestia 1.1.30
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2016, Soderlind
 * @link       https://github.com/soderlind/class-customizer-range-value-control/blob/master/README.md
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class Customizer_Range_Value_Control
 *
 * @since 1.1.31
 * @access public
 */
class Hestia_Customizer_Range_Value_Control extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'range-value';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 1.1.31
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_script( 'customizer-range-value-control', get_template_directory_uri() . '/inc/customizer-range-value/js/customizer-range-value-control.js', array( 'jquery' ), HESTIA_VERSION, true );
		wp_enqueue_style( 'customizer-range-value-control', get_template_directory_uri() . '/inc/customizer-range-value/css/customizer-range-value-control.css', array(), HESTIA_VERSION );
	}

	/**
	 * Render the control's content.
	 *
	 * @since 1.1.31
	 * @access public
	 * @author soderlind
	 */
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
				<input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs();
				$this->link(); ?>>
				<input type="number" min="0" max="100" step="1" class="range-slider-value" value="<?php echo esc_attr( $this->value() ); ?>">
				<span class="range-reset-slider"><span class="dashicons dashicons-image-rotate"></span></span>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
}
