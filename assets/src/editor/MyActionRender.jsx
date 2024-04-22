import { TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

function MyActionRender( {
	settings,
	onChangeSettingObj,
} ) {

	return <>
		<TextControl
			label={ __(
				'Input id here',
				'jet-forms-addon-boilerplate-simple',
			) }
			value={ settings.id }
			onChange={ id => onChangeSettingObj( { id } ) }
		/>
		<TextControl
			label={ __(
				'Input title here',
				'jet-forms-addon-boilerplate-simple',
			) }
			value={ settings.title }
			onChange={ title => onChangeSettingObj( { title } ) }
		/>
	</>;
}

export default MyActionRender;
