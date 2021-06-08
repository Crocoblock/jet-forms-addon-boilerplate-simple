import * as tabComponent from '../../simple-tab';

const {
	addFilter
} = wp.hooks;

addFilter( 'jet.fb.register.settings-page.tabs', 'jet-form-builder', tabs => {
	tabs.push( tabComponent );

	return tabs;
} );