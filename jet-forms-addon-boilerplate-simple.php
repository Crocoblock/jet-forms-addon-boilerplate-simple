<?php
/**
 * Plugin Name: JetForms Simple Boilerplate
 * Plugin URI:  https://crocoblock.com/
 * Description:
 * Version:     1.1.0
 * Author:      Crocoblock
 * Author URI:  https://crocoblock.com/
 * Text Domain: jet-forms-addon-boilerplate-simple
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

const JFB_SIMPLE_BOILERPLATE__FILE__ = __FILE__;

define( 'JFB_SIMPLE_BOILERPLATE_PLUGIN_BASE', plugin_basename( JFB_SIMPLE_BOILERPLATE__FILE__ ) );
define( 'JFB_SIMPLE_BOILERPLATE_PATH', plugin_dir_path( JFB_SIMPLE_BOILERPLATE__FILE__ ) );
define( 'JFB_SIMPLE_BOILERPLATE_URL', plugins_url( '/', JFB_SIMPLE_BOILERPLATE__FILE__ ) );

require __DIR__ . '/includes/load.php';

