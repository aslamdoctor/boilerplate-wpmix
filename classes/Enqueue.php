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
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
	}

	/**
	 * Enqueue/Add CSS and JS files.
	 *
	 * @return void
	 */
	public function enqueue_assets() {
		// Stylesheets.
		wp_register_style(
			'wpmix-main-style',
			( get_template_directory_uri() . '/dist/css/main.css' ),
			array(),
			filemtime( get_stylesheet_directory() . '/dist/css/main.css' )
		);
		wp_enqueue_style( 'wpmix-main-style' );

		// Javascripts.
		wp_register_script(
			'wpmix-main-js',
			( get_template_directory_uri() . '/dist/js/main.js' ),
			array( 'jquery' ),
			filemtime( get_stylesheet_directory() . '/dist/js/main.js' ),
			true
		);
		wp_enqueue_script( 'wpmix-main-js' );

		// localize variables.
		wp_localize_script(
			'wpmix-main-js',
			'wpmix_params',
			array(
				'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX url.
			)
		);
	}

	/**
	 * Enqueue editor assets (if needed in the future).
	 *
	 * @return void
	 */
	public function enqueue_editor_assets() {
		// Stylesheets.
		wp_register_style(
			'wpmix-block-editor-style',
			( get_template_directory_uri() . '/dist/css/block-editor-style.min.css' ),
			array(),
			filemtime( get_stylesheet_directory() . '/dist/css/block-editor-style.min.css' )
		);
		wp_enqueue_style( 'wpmix-block-editor-style' );
	}
}
