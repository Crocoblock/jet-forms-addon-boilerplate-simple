<?php

namespace Jet_FB_Manual_Boilerplate\Jet_Form_Builder\Actions;

use Jet_FB_Manual_Boilerplate\Plugin;
use Jet_Form_Builder\Actions\Manager;
use Jet_Form_Builder\Actions\Types\Base as ActionBase;
use Jet_Form_Builder\Actions\Action_Handler;

class My_Action extends ActionBase {

	public static function register() {
		$self = new self();

		add_action(
			'jet-form-builder/actions/register',
			array( $self, 'register_action' )
		);
		add_action(
			'jet-form-builder/editor-assets/before',
			array( $self, 'editor_assets' )
		);
	}

	public function register_action( Manager $manager ) {
		$manager->register_action_type( $this );
	}

	/**
	 * @return string
	 */
	public function get_id() {
		return 'my_action';
	}

	/**
	 * @return string
	 */
	public function get_name() {
		return __( 'My Action', 'jet-forms-addon-boilerplate-manual' );
	}

	/**
	 * @return string
	 */
	public function self_script_name() {
		return 'JetMyAction';
	}

	/**
	 * @return string[]
	 */
	public function editor_labels() {
		return array(
			'id'    => __( 'ID option', 'jet-forms-addon-boilerplate-manual' ),
			'title' => __( 'Title', 'jet-forms-addon-boilerplate-manual' )
		);
	}

	/**
	 * @return string[]
	 */
	public function visible_attributes_for_gateway_editor() {
		return array( 'id', 'title' );
	}

	/**
	 * Not required
	 * @return bool
	 */
	public function dependence() {
		return true;
	}

	/**
	 * @param array $request
	 * @param Action_Handler $handler
	 *
	 * @return void
	 */
	public function do_action( array $request, Action_Handler $handler ) {
		// ...
	}

	public function editor_assets() {
		wp_enqueue_script(
			Plugin::instance()->slug,
			Plugin::instance()->plugin_url( 'assets/js/builder.editor.js' ),
			array(),
			Plugin::instance()->get_version(),
			true
		);
	}
}