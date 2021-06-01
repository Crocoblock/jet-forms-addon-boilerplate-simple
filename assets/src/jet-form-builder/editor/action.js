const {
		  TextControl,
	  } = wp.components;

const {
		  addAction,
	  } = JetFBActions;

addAction( 'my_action', function MyAction( {
											   settings,
											   label,
											   onChangeSetting,
										   } ) {

	return <>
		<TextControl
			label={ label( 'id' ) }
			value={ settings.id }
			onChange={ newVal => onChangeSetting( newVal, 'id' ) }
		/>
		<TextControl
			label={ label( 'title' ) }
			value={ settings.title }
			onChange={ newVal => onChangeSetting( newVal, 'title' ) }
		/>
	</>;
} );
