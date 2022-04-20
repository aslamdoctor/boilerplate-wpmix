<?php
if ( ! function_exists( 'wpmix_setup_theme' ) ) {
	/**
	 * Enable Theme Features, Register Menus & Register Image Size
	 *
	 * @return void
	 */
	function wpmix_setup_theme() {
		// Theme features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'menus' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo' );

		// Define Image Sizes.
		add_image_size( 'header-logo', 200, 200, false );
		add_image_size( 'thumb-360x240', 360, 240, true );
		add_image_size( 'featured-1200x400', 1200, 400, true );

		// Register Menus.
		register_nav_menus(
			array(
				'top-menu'    => __( 'Top Menu', 'wpmix' ),
				'mobile-menu' => __( 'Mobile Menu', 'wpmix' ),
				'footer-menu' => __( 'Footer Menu', 'wpmix' ),
			)
		);
	}
	add_action( 'after_setup_theme', 'wpmix_setup_theme' );
}
