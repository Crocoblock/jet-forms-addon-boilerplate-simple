<?php

namespace Jet_FB_Manual_Boilerplate;

if ( ! defined( 'WPINC' ) ) {
	die();
}

class Plugin {
	/**
	 * Instance.
	 *
	 * Holds the plugin instance.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @var Plugin
	 */
	public static $instance = null;

	public $slug = 'jet-form-builder-integration';

	public function __construct() {

	}

	public function get_version() {
		return JET_FB_MANUAL_BOILERPLATE_VERSION;
	}

	public function plugin_url( $path ) {
		return JET_FB_MANUAL_BOILERPLATE_URL . $path;
	}

	public function get_template_path( $template ) {
		$path = JET_FB_MANUAL_BOILERPLATE_PATH . 'templates' . DIRECTORY_SEPARATOR;

		return ( $path . $template . '.php' );
	}


	/**
	 * Instance.
	 *
	 * Ensures only one instance of the plugin class is loaded or can be loaded.
	 *
	 * @return Plugin An instance of the class.
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}

Plugin::instance();