<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

function jet_fb_simple_boilerplate_setup() {
	/**
	 * We use additional check for case, when site administrator manually
	 * delete or deactivate JetFormBuilder plugin (not via plugin's page)
	 */
	if ( ! function_exists( 'jet_form_builder' ) ) {
		return;
	}

	\JFB\SimpleBoilerplate\Plugin::instance()->setup();
	\JFB\SimpleBoilerplate\Plugin::instance()->init_hooks();
}
