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

There we will add our `TabComponent` to the general array of tabs through a filter.