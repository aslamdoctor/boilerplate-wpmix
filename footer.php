<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WPMix
 */

?>
<section id="footer" class="clearfix">
		<div class="container">
			<?php if ( is_active_sidebar( 'footer_widgets' ) ) : ?>
			<div class="row">
				<?php dynamic_sidebar( 'footer_widgets' ); ?>
			</div><!-- #primary-sidebar -->
			<?php endif; ?>

			<div class="copyright text-center">
				&copy; <?php gmdate( 'Y' ); ?> Boilerplate. All rights reserved.
			</div>
		</div>
	</section>
	<!-- #footer ends -->


	<?php wp_footer(); ?>

	<!-- Don't forget analytics -->

	</body>

	</html>
