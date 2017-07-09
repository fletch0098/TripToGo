<?php
/**
 * A custom multi select control for the authors section.
 *
 * @package Hestia
 * @since Hestia 1.1.10
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * A custom multi select control for the authors section.
 *
 * @since Hestia 1.0
 */
class Hestia_Authors_Multiple_Select extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'multiple-select';

	/**
	 * Repeater name
	 *
	 * @var string
	 */
	public $repeater;

	/**
	 * Default content
	 *
	 * @var array
	 */
	public $default_content;

	/**
	 * Output the control markup.
	 */
	public function render_content() {

		$hestia_repeater_content = get_theme_mod( $this->repeater, $this->default_content );

		if ( ! empty( $hestia_repeater_content ) ) : ?>
			<label>

				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
				<select <?php $this->link(); ?> multiple="multiple" style="width: 100%; height: 100%;" class="repeater-multiselect-team">

					<?php
					$hestia_repeater_content_decoded = json_decode( $hestia_repeater_content );

					foreach ( $hestia_repeater_content_decoded as $hestia_repeater_item ) {
						if ( ! empty( $hestia_repeater_item ) ) {
							echo '<option value="' . esc_attr( $hestia_repeater_item->id ) . '">' . esc_html( $hestia_repeater_item->title ) . '</option>';
						}
					}
					?>

				</select>
			</label>

		<?php endif;

	}
}
