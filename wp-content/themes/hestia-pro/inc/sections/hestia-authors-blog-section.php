<?php
/**
 * Authors section for the blog page.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

if ( ! function_exists( 'hestia_authors_blog_section' ) ) :
	/**
	 * Team section content.
	 *
	 * @since Hestia 1.0
	 */
	function hestia_authors_blog_section() {
		$hestia_authors_on_blog = get_theme_mod( 'hestia_authors_on_blog', '0' );
		$hestia_team_content = get_theme_mod( 'hestia_team_content', json_encode( array(
			array(
				'image_url' => get_template_directory_uri() . '/assets/img/1.jpg',
				'title' => esc_html__( 'Desmond Purpleson', 'hestia-pro' ),
				'subtitle' => esc_html__( 'CEO', 'hestia-pro' ),
				'text' => esc_html__( 'Locavore pinterest chambray affogato art party, forage coloring book typewriter. Bitters cold selfies, retro celiac sartorial mustache.', 'hestia-pro' ),
				'id' => 'customizer_repeater_56d7ea7f40c56',
				'social_repeater' => json_encode( array(
					array(
						'id' => 'customizer-repeater-social-repeater-57fb908674e06',
						'link' => 'facebook.com',
						'icon' => 'fa-facebook',
					),
					array(
						'id' => 'customizer-repeater-social-repeater-57fb9148530ft',
						'link' => 'plus.google.com',
						'icon' => 'fa-google-plus',
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
				'title' => esc_html__( 'Parsley Pepperspray', 'hestia-pro' ),
				'subtitle' => esc_html__( 'Marketing Specialist', 'hestia-pro' ),
				'text' => esc_html__( 'Craft beer salvia celiac mlkshk. Pinterest celiac tumblr, portland salvia skateboard cliche thundercats. Tattooed chia austin hell.', 'hestia-pro' ),
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
						'id' => 'customizer-repeater-social-repeater-57fb9160ab484',
						'link' => 'pinterest.com',
						'icon' => 'fa-pinterest',
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
				'title' => esc_html__( 'Desmond Eagle', 'hestia-pro' ),
				'subtitle' => esc_html__( 'Graphic Designer', 'hestia-pro' ),
				'text' => esc_html__( 'Pok pok direct trade godard street art, poutine fam typewriter food truck narwhal kombucha wolf cardigan butcher whatever pickled you.', 'hestia-pro' ),
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
					array(
						'id' => 'customizer-repeater-social-repeater-57fb918d65f2x',
						'link' => 'dribbble.com',
						'icon' => 'fa-dribbble',
					),
				) ),
			),
			array(
				'image_url' => get_template_directory_uri() . '/assets/img/4.jpg',
				'title' => esc_html__( 'Ruby Von Rails', 'hestia-pro' ),
				'subtitle' => esc_html__( 'Lead Developer', 'hestia-pro' ),
				'text' => esc_html__( 'Small batch vexillologist 90\'s blue bottle stumptown bespoke. Pok pok tilde fixie chartreuse, VHS gluten-free selfies wolf hot.', 'hestia-pro' ),
				'id' => 'customizer_repeater_56d7ea7f40c86',
				'social_repeater' => json_encode( array(
					array(
						'id' => 'customizer-repeater-social-repeater-57fb925cedcg5',
						'link' => 'github.com',
						'icon' => 'fa-github-square',
					),
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
		) ) );

		if ( ! empty( $hestia_team_content ) && ($hestia_authors_on_blog[0] !== '0' ) ) {

			$hestia_team_content = json_decode( $hestia_team_content );

			$allowed_html = array(
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'b'      => array(),
				'i'      => array(
					'class' => array(),
				),
			);
			?>

			<section class="authors-on-blog section-image" id="authors-on-blog" style="background-image: url('<?php echo get_theme_mod( 'hestia_authors_on_blog_background', get_template_directory_uri() . '/assets/img/header.jpg' ); ?>');">
				<div class="container">
					<div class="row">

						<?php

						foreach ( $hestia_team_content as $team_item ) {
							foreach ( $hestia_authors_on_blog as $hestia_author_on_blog ) {
								if ( $team_item->id == $hestia_author_on_blog ) {
									$image = ! empty( $team_item->image_url ) ? apply_filters( 'hestia_translate_single_string', $team_item->image_url, 'Team section', 'Image' ) : '';
									$title = ! empty( $team_item->title ) ? apply_filters( 'hestia_translate_single_string', $team_item->title, 'Team section', 'Title' ) : '';
									$subtitle = ! empty( $team_item->subtitle ) ? apply_filters( 'hestia_translate_single_string', $team_item->subtitle, 'Team section', 'Subtitle' ) : '';
									$text = ! empty( $team_item->text ) ? apply_filters( 'hestia_translate_single_string', $team_item->text, 'Team section', 'Text' ) : '';
									$link = ! empty( $team_item->link ) ? apply_filters( 'hestia_translate_single_string', $team_item->link, 'Team section', 'Link' ) : '';
									?>

									<div class="col-md-6">
										<div class="card card-profile card-plain">
											<div class="col-md-5">
												<div class="card-image">
													<?php if ( ! empty( $image ) ) : ?>
														<?php if ( ! empty( $link ) ) : ?>
															<a href="<?php echo esc_url( $link ); ?>">
														<?php endif; ?>
														<img class="img" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
														<?php if ( ! empty( $link ) ) : ?>
															</a>
														<?php endif; ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="col-md-7">
												<div class="content">
													<?php if ( ! empty( $title ) ) : ?>
														<h4 class="card-title"><?php echo wp_kses( html_entity_decode( $title ), $allowed_html ); ?></h4>
													<?php endif; ?>
													<?php if ( ! empty( $subtitle ) ) : ?>
														<h6 class="category text-muted"><?php echo wp_kses( html_entity_decode( $subtitle ), $allowed_html ); ?></h6>
													<?php endif; ?>
													<?php if ( ! empty( $text ) ) : ?>
														<p class="card-description"><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
													<?php endif;

if ( ! empty( $team_item->social_repeater ) ) :
	$icons = html_entity_decode( $team_item->social_repeater );
	$icons_decoded = json_decode( $icons, true );
	if ( ! empty( $icons_decoded ) ) :
		?>
		<div class="footer">
			<?php foreach ( $icons_decoded as $value ) :
				$icon = ! empty( $value['icon'] ) ? apply_filters( 'hestia_translate_single_string', $value['icon'], 'Team section' ) : '';
				$link = ! empty( $value['link'] ) ? apply_filters( 'hestia_translate_single_string', $value['link'], 'Team section' ) : '';
				?>
																	<?php if ( ! empty( $icon ) ) : ?>
																		<a href="<?php echo esc_url( $link ); ?>" class="btn btn-just-icon btn-simple btn-white">
																			<i class="fa <?php echo esc_attr( $icon ); ?>"></i>
																		</a>
																	<?php endif; ?>
																<?php endforeach; ?>
															</div>
															<?php
														endif;
													endif;
													?>
												</div>
											</div>
										</div>
									</div>

									<?php

								}// End if().
							}// End foreach().
						}// End foreach().

						?>

			</section>

		<?php }// End if().

	}

	add_action( 'hestia_after_archive_content', 'hestia_authors_blog_section', 10 );

endif;

