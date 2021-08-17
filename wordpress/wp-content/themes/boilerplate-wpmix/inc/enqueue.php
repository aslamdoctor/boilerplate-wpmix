<?php
// Enqueue/Add CSS and JS files
function wpmix_enqueue(){
	$wpmix_theme = wp_get_theme();
	$wpmix_theme_version = $wpmix_theme->get('Version');

	// Stylesheets
	wp_register_style('wpmix_main_css', (get_template_directory_uri()."/dist/css/main.css"), false);
	wp_enqueue_style('wpmix_main_css', get_template_directory_uri() . "/dist/css/main.css", array(), $wpmix_theme_version);

	// Javascripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('wpmix_main_js', get_template_directory_uri() . "/dist/js/main.js", array('jquery'), $wpmix_theme_version, true);
}

add_action( 'wp_enqueue_scripts', 'wpmix_enqueue' );
