<?php

namespace JFB\SimpleBoilerplate\Actions;

use Jet_Form_Builder\Actions\Types\Base as ActionBase;
use Jet_Form_Builder\Actions\Action_Handler;

class MyAction extends ActionBase {

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
		return __( 'My Action', 'jet-forms-addon-boilerplate-simple' );
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