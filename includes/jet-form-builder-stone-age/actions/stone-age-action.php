<?php

namespace Jet_FB_Manual_Boilerplate;

use Jet_Form_Builder\Actions\Types\Base as ActionBase;
use Jet_Form_Builder\Actions\Action_Handler;

class Stone_Age_Action extends ActionBase {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @return string
	 */
	public function get_id() {
		return 'stone_age';
	}

	/**
	 * @return string
	 */
	public function get_name() {
		return __( 'Stone Age Action', 'jet-form-builder-integration' );
	}

	/**
	 * @return string
	 */
	public function self_script_name() {
		return 'JetStoneAgeAction';
	}

	/**
	 * @return string[]
	 */
	public function editor_labels() {
		return array(
			'id'    => __( 'ID option', 'jet-form-builder-integration' ),
			'title' => __( 'Title', 'jet-form-builder-integration' )
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
}