	<section id="footer" class="clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-menu',
						'menu_id' => 'footer-menu',
						'menu_class' => 'footer-menu',
						'container' => false
					) );
					?>
				</div>
				<div class="col-md-6">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'socialmedia-menu',
						'menu_id' => 'socialmedia-menu',
						'menu_class' => 'socialmedia-menu',
						'container' => false
					) );
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 copyright text-center">
					&copy; Boilerplate. All rights reserved.
				</div>
			</div>
		</div>
	</section>
	<!-- #footer ends -->

	
	<?php wp_footer(); ?>

	<!-- Don't forget analytics -->

</body>

</html>
