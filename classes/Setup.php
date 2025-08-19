<?php
/**
 * Setup Class
 *
 * Handles all theme setup functionality including theme features,
 * image sizes, menus, and widget areas.
 *
 * @package WPMix
 */

namespace WPMix;

/**
 * Class Setup
 *
 * Contains all theme setup and initialization functionality.
 */
class Setup {

	/**
	 * Class constructor.
	 *
	 * Automatically initializes setup hooks and actions when class is instantiated.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	/**
	 * Enable Theme Features, Register Menus & Register Image Size.
	 *
	 * @return void
	 */
	public function setup_theme() {
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

	/**
	 * Register widget areas.
	 *
	 * @return void
	 */
	public function widgets_init() {
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
}
