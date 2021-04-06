<?php
// Setup Widgets
function wpmix_widgets(){

	register_sidebar(array(
		'name' => __('Sidebar Widgets','wpmix'),
        'id'   => 'wpmix_sidebar-widgets',
        'description'   => __('These are widgets for the sidebar.', 'wpmix'),
        'before_widget' => '<div id="%1$s" class="the-widget %2$s col-md-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>'
	));

}
add_action( 'widgets_init', 'wpmix_widgets' );