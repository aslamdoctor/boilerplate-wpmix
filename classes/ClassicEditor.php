<?php
/**
 * Classic Editor Class
 *
 * Handles classic editor related functionality for the theme.
 *
 * @package WPMix
 */

namespace WPMix;

/**
 * Class ClassicEditor
 *
 * Contains all classic editor related functionality for the theme.
 */
class ClassicEditor {

	/**
	 * Class constructor.
	 *
	 * Automatically initializes classic editor hooks and actions when class is instantiated.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'add_editor_styles' ) );
		add_filter( 'mce_buttons_2', array( $this, 'tiny_mce_style_formats' ) );
		add_filter( 'tiny_mce_before_init', array( $this, 'tiny_mce_before_init' ) );
		add_filter( 'acf/fields/wysiwyg/toolbars', array( $this, 'wysiwyg_only_bold_toolbar' ) );
	}

	/**
	 * Registers an editor stylesheet for the theme.
	 *
	 * @return void
	 */
	public function add_editor_styles() {
		add_editor_style( 'dist/css/custom-editor-style.min.css' );
	}

	/**
	 * Reveals TinyMCE's hidden Style dropdown.
	 *
	 * @param array $buttons Array of Tiny MCE's button ids.
	 * @return array
	 */
	public function tiny_mce_style_formats( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}

	/**
	 * Adds style options to TinyMCE's Style dropdown.
	 *
	 * @param array $settings TinyMCE settings array.
	 * @return array
	 */
	public function tiny_mce_before_init( $settings ) {
		$style_formats = array(
			array(
				'title'    => __( 'Lead Paragraph', 'wpmix' ),
				'selector' => 'p',
				'classes'  => 'lead',
				'wrapper'  => true,
			),
			array(
				'title'  => _x( 'Small', 'Font size name', 'wpmix' ),
				'inline' => 'small',
			),
			array(
				'title'  => __( 'Cite', 'wpmix' ),
				'inline' => 'cite',
			),
		);

		if ( isset( $settings['style_formats'] ) ) {
			$orig_style_formats = json_decode( $settings['style_formats'], true );
			if ( is_array( $orig_style_formats ) ) {
				$style_formats = array_merge( $orig_style_formats, $style_formats );
			}
		}

		$settings['style_formats'] = wp_json_encode( $style_formats );
		return $settings;
	}

	/**
	 * Show only bold button in ACF editor.
	 *
	 * @param array $toolbars Array of ACF WYSIWYG toolbars.
	 * @return array Modified toolbars array.
	 */
	public function wysiwyg_only_bold_toolbar( $toolbars ) {
		// Add a new toolbar called "Only Bold".
		$toolbars['Only Bold'] = array();

		// This toolbar has only 1 row of buttons.
		$toolbars['Only Bold'][1] = array( 'bold' );

		return $toolbars;
	}
}
