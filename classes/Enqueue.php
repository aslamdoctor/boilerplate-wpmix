<?php
/**
 * Enqueue Class
 *
 * Handles enqueuing of CSS and JavaScript assets for the theme.
 *
 * @package WPMix
 */

namespace WPMix;

/**
 * Class Enqueue
 *
 * Contains all asset enqueuing functionality for the theme.
 */
class Enqueue {

	/**
	 * Class constructor.
	 *
	 * Automatically initializes enqueue hooks and actions when class is instantiated.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Enqueue/Add CSS and JS files.
	 *
	 * @return void
	 */
	public function enqueue_assets() {
		// Stylesheets.
		wp_register_style(
			'wpmix_main_css',
			( get_template_directory_uri() . '/dist/css/main.css' ),
			array(),
			filemtime( get_stylesheet_directory() . '/dist/css/main.css' )
		);
		wp_enqueue_style( 'wpmix_main_css' );

		// Javascripts.
		wp_register_script(
			'wpmix_main_js',
			( get_template_directory_uri() . '/dist/js/main.js' ),
			array( 'jquery' ),
			filemtime( get_stylesheet_directory() . '/dist/js/main.js' ),
			true
		);
		wp_enqueue_script( 'wpmix_main_js' );
	}

	/**
	 * Enqueue admin assets (if needed in the future).
	 *
	 * @return void
	 */
	public function enqueue_admin_assets() {
		// Add admin-specific assets here if needed.
	}

	/**
	 * Enqueue editor assets (if needed in the future).
	 *
	 * @return void
	 */
	public function enqueue_editor_assets() {
		// Add block editor specific assets here if needed.
	}
}
