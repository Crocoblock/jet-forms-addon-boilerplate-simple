<?php

namespace JFB\SimpleBoilerplate\Actions;

use JFB\SimpleBoilerplate\Plugin;

class Manager {

	public function init_hooks() {
		add_action(
			'jet-form-builder/actions/register',
			array( $this, 'register_action' )
		);
		add_action(
			'jet-form-builder/editor-assets/before',
			array( $this, 'editor_assets' )
		);
	}

	public function register_action( \Jet_Form_Builder\Actions\Manager $manager ) {
		$manager->register_action_type( new MyAction() );
	}

	public function editor_assets() {
		$script_url   = JFB_SIMPLE_BOILERPLATE_URL . 'assets/build/editor.js';
		$script_asset = require_once JFB_SIMPLE_BOILERPLATE_PATH . 'assets/build/editor.asset.php';

		wp_enqueue_script(
			Plugin::SLUG,
			$script_url,
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);
	}

}