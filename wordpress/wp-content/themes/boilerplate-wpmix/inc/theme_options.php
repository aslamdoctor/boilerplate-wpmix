<?php
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> __('Theme Options', 'wpmix'),
		'menu_title'	=> __('Theme Options', 'wpmix'),
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'    => true
	));

	acf_add_options_sub_page(array(
		'page_title'  => __('Header', 'wpmix'),
		'menu_title'  => __('Header', 'wpmix'),
		'capability'	=> 'edit_posts',
		'parent_slug' => 'theme-options',
	));

	acf_add_options_sub_page(array(
		'page_title'  => __('Footer', 'wpmix'),
		'menu_title'  => __('Footer', 'wpmix'),
		'capability'	=> 'edit_posts',
		'parent_slug' => 'theme-options',
	));
}
