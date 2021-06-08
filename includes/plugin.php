<?php

namespace Jet_FB_Simple_Boilerplate;

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

	public $slug = 'jet-forms-addon-boilerplate-simple';

	public function __construct() {
		$this->register_autoloader();
		$this->init_components();
	}

	private function init_components() {
		Jet_Form_Builder\Actions\My_Action::register();
		new Jet_Form_Builder\Tabs\My_Tab();
	}

	/**
	 * Register autoloader.
	 */
	public function register_autoloader() {
		require JET_FB_SIMPLE_BOILERPLATE_PATH . 'includes/autoloader.php';
		Autoloader::run();
	}

	public function get_version() {
		return JET_FB_SIMPLE_BOILERPLATE_VERSION;
	}

	public function plugin_url( $path ) {
		return JET_FB_SIMPLE_BOILERPLATE_URL . $path;
	}

	public function get_template_path( $template ) {
		$path = JET_FB_SIMPLE_BOILERPLATE_PATH . 'templates' . DIRECTORY_SEPARATOR;

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