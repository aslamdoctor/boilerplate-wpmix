<?php
// Just a shortcode for testing purpose
function wpmix_my_test_shortcode(){
    $shortcode_text = 'Hello World!!';
    return $shortcode_text;
}
add_shortcode('my-shortcode', 'wpmix_my_test_shortcode');


