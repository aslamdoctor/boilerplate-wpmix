<?php
/**
 * Functions and definitions
 *
 * Main functions file that loads all theme components.
 *
 * @package WPMix
 */

// Load Composer autoloader.
require_once get_template_directory() . '/vendor/autoload.php';

// Initialize theme classes.
new \WPMix\Setup();
new \WPMix\Enqueue();
new \WPMix\Hooks();
new \WPMix\Helper();
new \WPMix\ClassicEditor();
