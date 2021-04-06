<?php
// ========== Run shortcodes from widget ==========
add_filter( 'widget_text', 'do_shortcode' );



// ========== Format page title ==========
function wpmix_format_page_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'wpmix' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'wpmix_format_page_title', 10, 2 );



// ========== Limit Posts per page for specific archive ==========
add_filter('pre_get_posts', 'limit_category_posts');
function limit_category_posts($query){
    if (is_tax('my_category')) {
        $query->set('posts_per_page', 5);
    }
    return $query;
}



// ========== Remove empty paragraphs from shortcode string ==========
function wpmix_shortcode_empty_paragraph_fix( $content ) {
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );

    $content = strtr( $content, $array );

    return $content;
}
add_filter( 'the_content', 'wpmix_shortcode_empty_paragraph_fix' );



// ========== Remove P tags from images ==========
function filter_ptags_on_images($content) {
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('acf_the_content', 'filter_ptags_on_images');
add_filter('the_content', 'filter_ptags_on_images');



// ========== Add CSS class to next/prev post links ==========
function wpmix_next_posts_link_attributes() {
    return 'class="older-posts the-button"';
}
add_filter( 'next_posts_link_attributes', 'wpmix_next_posts_link_attributes' );
function wpmix_previous_posts_link_attributes() {
    return 'class="newer-posts the-button"';
}
add_filter( 'previous_posts_link_attributes', 'wpmix_previous_posts_link_attributes' );



// ========== Add CSS class to parent link of custom post type page ==========
function wpmix_remove_parent_classes($class){
    // check for current page classes, return false if they exist.
    //return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
    return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor') ? FALSE : TRUE;
}
function wpmix_add_class_to_wp_nav_menu($classes){
    switch (get_post_type())
    {
        case 'my_post_type':
            // we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
            $classes = array_filter($classes, "wpmix_remove_parent_classes");

            /*// add the current page class to a specific menu item (replace ###).
            if (in_array('menu-item-592', $classes))
            {
               $classes[] = 'current_page_parent';
            }*/
        break;

    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'wpmix_add_class_to_wp_nav_menu' );



// ========== Display image sizes in media uploader ==========
function wpmix_display_image_size_names_muploader( $sizes ) {
    $new_sizes = array();

    $added_sizes = get_intermediate_image_sizes();

    // $added_sizes is an indexed array, therefore need to convert it
    // to associative array, using $value for $key and $value
    foreach( $added_sizes as $key => $value) {
        $new_sizes[$value] = $value;
    }

    // This preserves the labels in $sizes, and merges the two arrays
    $new_sizes = array_merge( $new_sizes, $sizes );

    return $new_sizes;
}
add_filter( 'image_size_names_choose', 'wpmix_display_image_size_names_muploader', 11, 1 );



//========== Filter Search result ==========
function wpmix_search_filter($query) {
    /* if ($query->is_search) {
        $query->set('post_type', array('post'));
    } */
    return $query;
}
add_filter( 'pre_get_posts', 'wpmix_search_filter' );
