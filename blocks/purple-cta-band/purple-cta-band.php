<?php
/**
 * Purple CTA Band Block Template.
 *
 * @package WPMix
 */
// Get block id.
$class_name = 'purple-cta-band text-center';

$content = get_field( 'content' );
$links   = get_field( 'links' );

if ( $content || $links ) :
	?>
<div id="<?php echo esc_attr( $block['id'] ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
	<?php if ( $content ) : ?>
	<div class="cta__content"><?php echo wp_kses_post( $content ); ?></div>
	<?php endif; ?>

	<?php if ( $links ) : ?>
		<ul class="cta__links">
			<?php
			foreach ( $links as $link_fields ) :
				if ( ! isset( $link_fields['link'] ) || ! is_array( $link_fields['link'] ) ) {
					continue;
				}
				?>
				<li>
					<?php echo \WPMix\Helper::acf_get_link_html( $link_fields['link'], array( 'class' => 'btn-with-arrow' ) ); // phpcs:ignore ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>
<!-- .purple-cta-band -->
	<?php
endif;
