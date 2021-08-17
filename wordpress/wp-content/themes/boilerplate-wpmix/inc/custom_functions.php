<?php
// ========== Get Post Thumbnail ==========
function wpmix_get_thumb($size = "thumbnail", $class = "post-thumb", $placeholder = '')
{
	if (has_post_thumbnail()) {
		the_post_thumbnail($size, array('class' => $class));
	} else {
		if (!empty($placeholder)) {
			echo '<img src="' . $placeholder . '" class="' . $class . '" alt="">';
		}
	}
}


// ========== Crop text ==========
function wpmix_crop_text($text, $length = 50)
{
	if (strlen($text) <= $length) {
		return $text;
	} else {
		$text = substr($text, 0, $length);
		$text = $text . '...';
		return $text;
	}
}



// ========== Custom Excerpt ==========
function wpmix_get_excerpt($limit)
{
	$get_content = has_excerpt() ? get_the_excerpt() : get_the_content();
	$get_content = strip_tags($get_content);
	$excerpt = explode(' ', $get_content, $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return $excerpt;
}
