<?php
/**
 * Block Editor Class
 *
 * Handles block editor related functionality for the theme.
 *
 * @package WPMix
 */

namespace WPMix;

/**
 * Class BlockEditor
 *
 * Contains all block editor related functionality for the theme.
 */
class BlockEditor {

	/**
	 * Class constructor.
	 *
	 * Automatically initializes block editor hooks and actions when class is instantiated.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_block_types' ) );
		add_action( 'init', array( $this, 'register_block_styles' ) );
		add_action( 'after_setup_theme', array( $this, 'enable_editor_styles' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
	}

	/**
	 * Register custom gutenberg block types.
	 *
	 * @return void
	 */
	public function register_block_types() {
		// Check if blocks directory exists before registering.
		$blocks_dir = get_template_directory() . '/blocks';

		if ( is_dir( $blocks_dir ) ) {
			$block_folders = array(
				'purple-cta-band',
			);

			foreach ( $block_folders as $block_folder ) {
				$block_json = $blocks_dir . '/' . $block_folder . '/block.json';
				if ( file_exists( $block_json ) ) {
					register_block_type( $block_json );
				}
			}
		}
	}

	/**
	 * Register custom block styles.
	 *
	 * @return void
	 */
	public function register_block_styles() {
		// Register custom block style for intro paragraph.
		if ( function_exists( 'register_block_style' ) ) {
			register_block_style(
				'core/paragraph',
				array(
					'name'  => 'introduction-paragraph',
					'label' => __( 'Introduction', 'wpmix' ),
				)
			);
		}
	}

	/**
	 * Enable editor styles.
	 *
	 * @return void
	 */
	public function enable_editor_styles() {
		add_theme_support( 'editor-styles' );
		add_editor_style( get_template_directory_uri() . '/dist/css/block-editor-style.min.css' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );
	}

	/**
	 * Enqueue editor assets (like scripts, fonts etc but don't enqueue styles here as it will effect admin ui).
	 *
	 * @return void
	 */
	public function enqueue_editor_assets() {
	}
}
