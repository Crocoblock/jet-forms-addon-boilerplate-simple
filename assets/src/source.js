import { Actions } from "jfb-editor";

const { __ } = wp.i18n;

const getLocalizedFullPack = new Actions.EditorData( 'mailer_lite', 'MailerLite' )
.setLabels( {
	"api_key": "API Key:",
	"validate_api_key": "Validate API Key",
	"group_id": "Group:",
	"update_group_ids": "Update Group List",
	"fields_map": "Fields Map:",
	"use_global": __( 'Use Global Settings' ),
} )
.setHelp( {
	"api_key_link_prefix": "How to obtain your MailerLite API Key? More info",
	"api_key_link_suffix": "here",
	"api_key_link": "http://help.mailerlite.com/article/show/35040-where-can-i-find-the-api-key",
	"fields_map": "Set form fields names to to get user data from"
} )
.setGatewayAttrs( [
	"group_id"
] )
.setSource( { action: "jet_form_builder_get_mailerlite_data" } )
.exportAll();

export { getLocalizedFullPack };