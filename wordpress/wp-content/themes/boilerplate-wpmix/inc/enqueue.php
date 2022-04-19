<?php
if ( ! function_exists( 'wpmix_enqueue' ) ) {
	/**
	 * Enqueue/Add CSS and JS files
	 *
	 * @return void
	 */
	function wpmix_enqueue() {
		// Stylesheets.
		wp_register_style( 'wpmix_main_css', ( get_template_directory_uri() . '/dist/css/main.css' ), array(), filemtime( get_stylesheet_directory() . '/dist/css/main.css' ) );
		wp_enqueue_style( 'wpmix_main_css' );

		// Javascripts.
		wp_register_script( 'wpmix_main_js', ( get_template_directory_uri() . '/dist/js/main.js' ), array( 'jquery' ), filemtime( get_stylesheet_directory() . '/dist/js/main.js' ), true );
		wp_enqueue_script( 'wpmix_main_js' );
	}

	add_action( 'wp_enqueue_scripts', 'wpmix_enqueue' );
}
