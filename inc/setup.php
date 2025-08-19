<?php
if ( ! function_exists( 'wpmix_setup_theme' ) ) {
	/**
	 * Enable Theme Features, Register Menus & Register Image Size
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
				'top-menu' => __( 'Top Menu', 'wpmix' ),
			)
		);
	}
	add_action( 'after_setup_theme', 'wpmix_setup_theme' );
}


if ( ! function_exists( 'wpmix_widgets_init' ) ) {
	/**
	 * Register widget areas
	 */
	function wpmix_widgets_init() {

		register_sidebar(
			array(
				'name'          => 'Footer Widgets',
				'id'            => 'footer_widgets',
				'before_widget' => '<div class="widget col-lg-4">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget__title">',
				'after_title'   => '</h3>',
			)
		);

	}
	add_action( 'widgets_init', 'wpmix_widgets_init' );
}
