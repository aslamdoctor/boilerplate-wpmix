<?php
// Define Menus
function wpmix_setup_theme()
{
	// Theme Supports
	add_theme_support('automatic-feed-links');
	add_theme_support('menus');
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');


	// Define Thumbnail Sizes
	add_image_size('thumb-360x240', 360, 240, true);
	add_image_size('featured-1200x400', 1200, 400, true);


	// register menus
	register_nav_menus(
		array(
			'top-menu' => __('Top Menu', 'wpmix'),
			'mobile-menu' => __('Mobile Menu', 'wpmix'),
			'footer-menu' => __('Footer Menu', 'wpmix'),
		)
	);
}
add_action('after_setup_theme', 'wpmix_setup_theme');
