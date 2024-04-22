<?php

namespace JFB\SimpleBoilerplate;

use JFB\SimpleBoilerplate\Actions\Manager as ActionsManager;

class Plugin {

	const SLUG = 'jet-forms-addon-boilerplate-simple';

	/** @var ActionsManager */
	private $actions;

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
	private static $instance = null;


	public function setup() {
		$this->actions = new ActionsManager();
	}

	public function init_hooks() {
		$this->actions->init_hooks();
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
	public static function instance(): Plugin {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}