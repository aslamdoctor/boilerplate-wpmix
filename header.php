<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package WPMix
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if ( is_search() ) { ?>
		<meta name="robots" content="noindex, nofollow" />
	<?php } ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );}
	?>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,600;1,600&display=swap" rel="stylesheet"><?php // phpcs:ignore ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<ul class="skip-navigation">
		<li><a href="#intro">Skip to intro</a></li>
		<li><a href="#navigation">Skip to navigation</a></li>
	</ul>

	<section id="header" class="clearfix">
		<div class="container">
			<a href="<?php bloginfo( 'url' ); ?>/" class="logo">
				<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				echo wp_get_attachment_image(
					$custom_logo_id,
					'header-logo',
					false,
					array(
						'class' => '',
						'alt'   => get_bloginfo( 'name' ),
					)
				);
				?>
			</a>

			<button class="btn-mobile-menu hamburger hamburger--slider d-lg-none" type="button">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'top-menu',
					'menu_id'        => 'top-menu',
					'menu_class'     => 'top-menu hidden-sm hidden-xs',
					'container'      => false,
					'depth'          => 1, // to disable sub menus.
				)
			);
			?>
		</div>
	</section>
	<!-- #header ends -->
