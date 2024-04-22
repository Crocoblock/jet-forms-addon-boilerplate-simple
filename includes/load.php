<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/functions.php';

add_action( 'plugins_loaded', 'jet_fb_simple_boilerplate_setup' );
