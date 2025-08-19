<?php
/**
 * Hooks Class
 *
 * Handles all WordPress hooks, filters, and actions for the theme.
 *
 * @package WPMix
 */

namespace WPMix;

/**
 * Class Hooks
 *
 * Contains all WordPress hooks and filters for the theme.
 */
class Hooks {

	/**
	 * Class constructor.
	 *
	 * Automatically initializes hooks and filters when class is instantiated.
	 */
	public function __construct() {
		add_filter( 'image_size_names_choose', array( $this, 'display_image_size_names_muploader' ), 10, 1 );
		add_filter( 'acf/settings/save_json', array( $this, 'acf_json_save_point' ) );
		add_filter( 'acf/settings/load_json', array( $this, 'acf_json_load_point' ) );
	}

	/**
	 * Display image sizes in media uploader.
	 *
	 * @param array $sizes Array of sizes defined in theme.
	 * @return array
	 */
	public function display_image_size_names_muploader( $sizes ) {
		$new_sizes = array();

		$added_sizes = get_intermediate_image_sizes();

		// $added_sizes is an indexed array, therefore need to convert it
		// to associative array, using $value for $key and $value.
		foreach ( $added_sizes as $key => $value ) {
			$new_sizes[ $value ] = $value;
		}

		// This preserves the labels in $sizes, and merges the two arrays.
		$new_sizes = array_merge( $new_sizes, $sizes );

		return $new_sizes;
	}

	/**
	 * Save ACF settings JSON inside Theme folder.
	 *
	 * @param string $path Path to the location where settings files needs to be saved.
	 * @return string
	 */
	public function acf_json_save_point( $path ) {
		$path = get_stylesheet_directory() . '/acf-json';
		return $path;
	}

	/**
	 * Load ACF settings JSON from Theme folder.
	 *
	 * @param array $paths Array of different paths.
	 * @return array
	 */
	public function acf_json_load_point( $paths ) {
		unset( $paths[0] );
		$paths[] = get_stylesheet_directory() . '/acf-json';
		return $paths;
	}
}
