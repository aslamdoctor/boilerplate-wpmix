	<section id="footer" class="clearfix">
		<div class="container">
			<?php if ( is_active_sidebar( 'footer_widgets' ) ) : ?>
			<div class="row">
				<?php dynamic_sidebar( 'footer_widgets' ); ?>
			</div><!-- #primary-sidebar -->
			<?php endif; ?>

			<div class="copyright text-center">
				&copy; <?php date( 'Y' ); ?> Boilerplate. All rights reserved.
			</div>
		</div>
	</section>
	<!-- #footer ends -->


	<?php wp_footer(); ?>

	<!-- Don't forget analytics -->

	</body>

	</html>
