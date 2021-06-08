<?php


namespace Jet_FB_Simple_Boilerplate\Jet_Form_Builder\Tabs;


use Jet_FB_Simple_Boilerplate\Plugin;
use Jet_Form_Builder\Admin\Tabs_Handlers\Base_Handler;

class My_Tab extends Base_Handler {

	public function __construct() {
		parent::__construct();

		add_filter( 'jet-form-builder/register-tabs-handlers', function ( $tabs ) {
			return array_merge( $tabs, array( $this ) );
		} );
	}

	/**
	 * @return string
	 */
	public function slug(): string {
		return 'my-tab';
	}

	/**
	 * @return void
	 */
	public function on_get_request() {
		$secret = sanitize_text_field( $_POST['secret'] );
		$key    = sanitize_text_field( $_POST['key'] );

		$result = $this->update_options( array(
			'secret' => $secret,
			'key'    => $key
		) );

		$result ? wp_send_json_success( array(
			'message' => __( 'Saved successfully!', 'jet-fom-builder' )
		) ) : wp_send_json_error( array(
			'message' => __( 'Unsuccessful save.', 'jet-form-builder' )
		) );
	}

	/**
	 * @return array
	 */
	public function on_load() {
		return $this->get_options( array(
			'key'    => 'default key',
			'secret' => 'default secret'
		) );
	}

	public function before_assets() {
		wp_enqueue_script(
			Plugin::instance()->slug . "-{$this->slug()}",
			Plugin::instance()->plugin_url( 'assets/js/builder.admin.js' ),
			array(),
			Plugin::instance()->get_version(),
			true
		);
	}
}