# Adding an JetFormBuilder Action via JavaScript

_We will assume that you have a JSX compiler configured. 
If not, then follow the config example as in this repository._

In this example, such a structure of js files:
 - /js
    - builder.editor.js
 - /src
    - /jet-form-builder
        - /editor
            - action.js

Открываем `src\jet-form-builder\editor\action.js`, 
где мы будет строить шаблон для редактирования экшена в билдере формы.

Для регистрации есть экшена в глобальной области есть функция `addAction`.
Она получает всего два параметра:
 - [String] `action_id`
 - [React.Component | Function] `action_instance`

Где `action_id` должен соответствовать строке, определенной в [`get_id`](https://github.com/girafffee/jet-forms-addon-boilerplate-simple#method-get_id--required)

### method addAction : required
```js
const { addAction } = JetFBActions;

addAction( 'my_action', function MyAction( {
    settings,
    label,
    onChangeSetting,
} ) {

    return <>
        <TextControl
            label={ label( 'id' ) }
            value={ settings.id }
            onChange={ newVal => 
                onChangeSetting( newVal, 'id' ) 
            }
        />
        <TextControl
            label={ label( 'title' ) }
            value={ settings.title }
            onChange={ newVal => 
                onChangeSetting( newVal, 'title' ) 
            }
        />
    </>;
} );
```
An action component accepts props, and here are some of them:

- [Object] settings - contains action settings
- [Function] label - get the option name by `attr_id`, 
which is given in the method [`editor_labels`](https://github.com/girafffee/jet-forms-addon-boilerplate-simple#method-editor_labels--optional)
- [Function] onChangeSetting - to change action settings. It takes two parameters:
    - [any] value of the option 
    - [String] name of the option