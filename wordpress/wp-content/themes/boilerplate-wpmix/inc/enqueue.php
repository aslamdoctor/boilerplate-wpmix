<?php
// Enqueue/Add CSS and JS files
function wpmix_enqueue(){
	// Stylesheets
	wp_register_style('wpmix_app_css', (get_template_directory_uri()."/dist/css/app.css"), false);
    wp_enqueue_style('wpmix_app_css');

    // Javascripts
    wp_register_script('wpmix_app_js', (get_template_directory_uri()."/dist/js/app.js"), array(), false, true);

    //wp_enqueue_script('jquery');
    wp_enqueue_script('wpmix_app_js');
}

add_action( 'wp_enqueue_scripts', 'wpmix_enqueue' );
?>
