<?php
if ( ! function_exists( 'wpmix_display_image_size_names_muploader' ) ) {
	/**
	 * Display image sizes in media uploader.
	 *
	 * @param array $sizes Array of sizes defined in theme.
	 * @return array
	 */
	function wpmix_display_image_size_names_muploader( $sizes ) {
		$new_sizes = array();

		$added_sizes = get_intermediate_image_sizes();

		// $added_sizes is an indexed array, therefore need to convert it
		// to associative array, using $value for $key and $value
		foreach ( $added_sizes as $key => $value ) {
			$new_sizes[ $value ] = $value;
		}

		// This preserves the labels in $sizes, and merges the two arrays.
		$new_sizes = array_merge( $new_sizes, $sizes );

		return $new_sizes;
	}
	add_filter( 'image_size_names_choose', 'wpmix_display_image_size_names_muploader', 10, 1 );
}




if ( ! function_exists( 'wpmix_acf_json_save_point' ) ) {
	/**
	 * Save ACF settings JSON inside Theme folder.
	 *
	 * @param string $path Path to the location where settings files needs to be saved.
	 * @return string
	 */
	function wpmix_acf_json_save_point( $path ) {
		$path = get_stylesheet_directory() . '/acf-json';
		return $path;
	}
	add_filter( 'acf/settings/save_json', 'wpmix_acf_json_save_point' );
}




if ( ! function_exists( 'wpmix_acf_json_load_point' ) ) {
	/**
	 * Load ACF settings JSON from Theme folder.
	 *
	 * @param array $paths Array of different paths.
	 * @return array
	 */
	function wpmix_acf_json_load_point( $paths ) {
		unset( $paths[0] );
		$paths[] = get_stylesheet_directory() . '/acf-json';
		return $paths;
	}
	add_filter( 'acf/settings/load_json', 'wpmix_acf_json_load_point' );
}
