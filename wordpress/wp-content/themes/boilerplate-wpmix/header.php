<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" />
	<?php } ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
</head>

<body <?php body_class(); ?>>
	<ul class="skip-navigation">
		<li><a href="#intro">Skip to intro</a></li>
		<li><a href="#navigation">Skip to navigation</a></li>
	</ul>

	<section id="header" class="clearfix">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a href="<?php echo get_template_directory_uri();?>/" class="logo"><img src="http://placehold.it/150x150" alt=""></a>

					<button class="btn-mobile-menu hamburger hamburger--slider d-lg-none" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>

					<?php
					wp_nav_menu(array(
						'theme_location' => 'top-menu',
						'menu_id' => 'top-menu',
						'menu_class' => 'top-menu hidden-sm hidden-xs',
						'container' => false,
						'depth' => 1, // to disable sub menus
					));
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- #header ends -->