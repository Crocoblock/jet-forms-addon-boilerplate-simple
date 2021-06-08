<?php


namespace Jet_FB_Simple_Boilerplate\Jet_Form_Builder\Tabs;


class Manager {

	public static function register() {
		( new self() )->register_tabs();
	}

	private function tabs() {
		return array(  );
	}

	private function register_tabs() {
		add_filter( 'jet-form-builder/register-tabs-handlers', function ( $tabs ) {
			return array_merge( $tabs, $this->tabs() );
		} );
	}

}