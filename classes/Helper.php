<?php
/**
 * Helper Class
 *
 * Contains utility methods and helper functions for the theme.
 * All methods are static for easy access throughout the theme.
 *
 * @package WPMix
 */

namespace WPMix;

/**
 * Class Helper
 *
 * Contains static utility methods for common theme operations.
 */
class Helper {

	/**
	 * Class constructor.
	 *
	 * Helper class uses static methods, so constructor is empty.
	 */
	public function __construct() {
		// Helper class uses static methods, no initialization needed.
	}

	/**
	 * Get Post Thumbnail.
	 *
	 * @param string $size Image size defined in WordPress.
	 * @param string $css_class CSS Class to apply on image.
	 * @param string $placeholder Placeholder image path if image not exists.
	 * @return void
	 */
	public static function get_thumb( $size = 'thumbnail', $css_class = 'post-thumb', $placeholder = '' ) {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size, array( 'class' => $css_class ) );
		} elseif ( ! empty( $placeholder ) ) {
			echo '<img src="' . esc_url( $placeholder ) . '" class="' . esc_attr( $css_class ) . '" alt="">';
		}
	}

	/**
	 * Crop text to specified length.
	 *
	 * @param string $text Text to crop.
	 * @param int    $length Maximum length of the text.
	 * @return string Cropped text with ellipsis if needed.
	 */
	public static function crop_text( $text, $length = 50 ) {
		if ( strlen( $text ) <= $length ) {
			return $text;
		}

		$text = substr( $text, 0, $length );
		return $text . '...';
	}

	/**
	 * Get custom excerpt with word limit.
	 *
	 * @param int $limit Number of words to limit the excerpt to.
	 * @return string Custom excerpt.
	 */
	public static function get_excerpt( $limit ) {
		$get_content = has_excerpt() ? get_the_excerpt() : get_the_content();
		$get_content = wp_strip_all_tags( $get_content );
		$excerpt     = explode( ' ', $get_content, $limit );

		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$excerpt = implode( ' ', $excerpt ) . '...';
		} else {
			$excerpt = implode( ' ', $excerpt );
		}

		// Remove shortcodes.
		$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );

		return $excerpt;
	}

	/**
	 * Get sanitized CSS class string.
	 *
	 * @param string|array $classes CSS classes to sanitize.
	 * @return string Sanitized CSS classes.
	 */
	public static function get_css_classes( $classes ) {
		if ( is_array( $classes ) ) {
			$classes = implode( ' ', $classes );
		}

		return esc_attr( $classes );
	}

	/**
	 * Check if current page is a specific post type.
	 *
	 * @param string $post_type Post type to check.
	 * @return bool True if current page is the specified post type.
	 */
	public static function is_post_type( $post_type ) {
		return get_post_type() === $post_type;
	}
}
