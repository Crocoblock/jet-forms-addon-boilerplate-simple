# Adding an JetFormBuilder Tab via JavaScript

_We will assume that you have a `webpack` configured. 
If not, then follow the config example as in this repository._

In this example, such a structure of js files:
 - /js
    - builder.admin.js
 - /src
    - /jet-form-builder
        - /admin
            - main.js
    - /my-tab
        - index.js
        - TabComponent.vue
        - source.js
        
Open `/src/jet-form-builder/admin/main.js`

There we will add our `TabComponent` to the general array of tabs 
through a filter `jet.fb.register.settings-page.tabs`
```js
import * as tabComponent from '../../simple-tab';

const {
	addFilter
} = wp.hooks;

addFilter( 'jet.fb.register.settings-page.tabs', 'jet-form-builder', tabs => {
	tabs.push( tabComponent );

	return tabs;
} );
```

You must form each tab into a separate module in the format `{ title, component }`

Example:
```js
import Tab from './TabComponent.vue';

const { __ } = wp.i18n;

const title = __( 'Simple Tab', 'jet-forms-addon-boilerplate-simple' );
const component = Tab;

export {
	title,
	component
}
```

Let's start building a vue component.
> If you are a beginner or have no experience 
> with this plan, you can study the official documentation: [Single File Components](https://vuejs.org/v2/guide/single-file-components.html).

### property name (string) : required
> Must equal the returned string from the method [`slug`](https://github.com/girafffee/jet-forms-addon-boilerplate-simple/blob/main/docs/JetFormBuilder/add-tab/PHP.md#method-slug--required)
> on the PHP side

### property props.incoming (object) : required 
> In this property you get the data that came from the server side, 
> which you defined in the 
> [`on_load`](https://github.com/girafffee/jet-forms-addon-boilerplate-simple/blob/main/docs/JetFormBuilder/add-tab/PHP.md#method-on_load--required) method.

> It is assumed that you will be passing your tab settings here.

### property methods.getRequestOnSave (function) : required
> In this function, you must return an object with data 
> that will be stored in your tab.

By default, the script part of your component should look like this:
```js
export default {
    name: 'my-tab',
    props: {
        incoming: Object,
    },
    methods: {
        getRequestOnSave() {
            return {
                data: {},
            };
        },
    },
}
``` 



