<?php
if ( ! function_exists( 'wpmix_get_thumb' ) ) {
	/**
	 * Get Post Thumbnail.
	 *
	 * @param string $size Image size defined in WordPress.
	 * @param string $class CSS Class to apply on image.
	 * @param string $placeholder Placeholder image path if image not exists.
	 */
	function wpmix_get_thumb( $size = 'thumbnail', $class = 'post-thumb', $placeholder = '' ) {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size, array( 'class' => $class ) );
		} else {
			if ( ! empty( $placeholder ) ) {
				echo '<img src="' . $placeholder . '" class="' . $class . '" alt="">';
			}
		}
	}
}


if ( ! function_exists( 'wpmix_crop_text' ) ) {
	/**
	 * Crop text.
	 *
	 * @param string $text Text to Crop.
	 * @param string $length Upto how much length the text needs to crop.
	 * @return string
	 */
	function wpmix_crop_text( $text, $length = 50 ) {
		if ( strlen( $text ) <= $length ) {
			return $text;
		} else {
			$text = substr( $text, 0, $length );
			$text = $text . '...';
			return $text;
		}
	}
}


if ( ! function_exists( 'wpmix_get_excerpt' ) ) {
	/**
	 * Custom Excerpt.
	 *
	 * @param int $limit Number of Words.
	 * @return string
	 */
	function wpmix_get_excerpt( $limit ) {
		$get_content = has_excerpt() ? get_the_excerpt() : get_the_content();
		$get_content = wp_strip_all_tags( $get_content );
		$excerpt     = explode( ' ', $get_content, $limit );

		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$excerpt = implode( ' ', $excerpt ) . '...';
		} else {
			$excerpt = implode( ' ', $excerpt );
		}

		$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );

		return $excerpt;
	}
}
