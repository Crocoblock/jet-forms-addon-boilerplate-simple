<?php
/**
 * Plugin Name: JetForms Manual Boilerplate
 * Plugin URI:  https://crocoblock.com/
 * Description:
 * Version:     1.0.0
 * Author:      Crocoblock
 * Author URI:  https://crocoblock.com/
 * Text Domain: jet-forms-addon-boilerplate-manual
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

add_action( 'plugins_loaded', function () {

	define( 'JET_FB_MANUAL_BOILERPLATE_VERSION', '1.0.0' );

	define( 'JET_FB_MANUAL_BOILERPLATE__FILE__', __FILE__ );
	define( 'JET_FB_MANUAL_BOILERPLATE_PLUGIN_BASE', plugin_basename( __FILE__ ) );
	define( 'JET_FB_MANUAL_BOILERPLATE_PATH', plugin_dir_path( __FILE__ ) );
	define( 'JET_FB_MANUAL_BOILERPLATE_URL', plugins_url( '/', __FILE__ ) );

	require JET_FB_MANUAL_BOILERPLATE_PATH . 'includes/plugin.php';
}, 100 );

