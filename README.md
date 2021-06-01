# JetForm Manual Boilerplate
This is a guide on how to make your own extension for JetFormBuilder & JetEngine Forms. 

*This is a guide on how to make your own extension for JetFormBuilder & JetEngine Forms. This is an implementation without using the [Composer](https://getcomposer.org/doc/00-intro.md) package manager. If you know how to use it, [Advanced Boilerplate](https://github.com/girafffee/jet-forms-addon-boilerplate-advanced) is more suitable for you.*

## JetFormBuilder

### Adding an action via PHP

Our Action must be a class extends from `\Jet_Form_Builder\Actions\Types\Base`
```php  
use Jet_Form_Builder\Actions\Types\Base as ActionBase;  
  
class Stone_Age_Action extends ActionBase {
    // methods and propreties...
}
```
Inside this class, we must define several required methods:


#### method `get_id` : `required`
> The unique identifier for the action.
```php
    // class declaration

    /**  
     * @return string  
     */
    public function get_id() {  
        return 'my_action';  
    }
```

#### method `get_name` : `required`
> The name of the action that appears in the drop-down list of actions in the form builder.
```php
    // class declaration

    /**  
     * @return string  
     */
    public function get_name() {  
        return __( 'My Action', 'jet-forms-addon-manual-boilerplate' );  
    }
```

#### method `do_action` : `required`
>  The method for executing an action when submitting a form takes 2 parameters:
> `array $ request` - data from the form, in the format `field_name => field_value`
> `Action_Handler $ handler` - an object that manages actions.
```php
    use Jet_Form_Builder\Actions\Action_Handler;
	
    // class declaration
	
    /**  
     * @param array $request  
     * @param Action_Handler $handler  
     *  
     * @return void  
     */
    public function do_action( array $request, Action_Handler $handler ) {  
        // ...  
    }
```

#### method `dependence` : `optional`
> There may be a condition according to which the action will (not) be displayed in the list of available forms when editing.
```php
    /**
     * @return bool
     */
    public function dependence() {
        return true;
    }
```

#### method `self_script_name` : `optional`
> Returns the name of the object that is registered globally on the form edit page.

> *If you use the methods that are listed here after `self_script_name`, 
> then in this method you must specify the unique name of the object*
```php
    // class declaration

    /**  
     * @return string  
     */
    public function self_script_name() {  
        return 'JetMyAction';  
    }
```

#### method `editor_labels` : `optional`
> Returns an array in the format `attr_id => attr_label`.
```php
    // class declaration

    /**  
     * @return string[]  
     */
    public function editor_labels() {  
        return array(  
            'id'    => __( 'ID option', 'jet-forms-addon-manual-boilerplate' ),  
            'title' => __( 'Title', 'jet-forms-addon-manual-boilerplate' )  
        );  
    }
```

#### method `visible_attributes_for_gateway_editor` : `optional`
> Returns an array of the `attr_id` of all the attributes of the action.
```php
    // class declaration

    /**
     * @return string[]
     */
    public function visible_attributes_for_gateway_editor() {
        return array( 'id', 'title' );
    }
```
#### Adding an action to the manager
To register an action, you need to attach a method to the 
`jet-form-builder/actions/register` hook, like this:
```php
    // class declaration

    public static function register() {
        $self = new self();
    
    	add_action(
            'jet-form-builder/actions/register',
            array( $self, 'register_action' )
        );
    }
```
At this stage, you can already see that your action is already 
available for selection on the form. https://prnt.sc/13ig4yx

If your action doesn't need any input from the form builder, or that data shouldn't 
change, then you don't need to enqueue a separate js-script for your action.

#### Enqueuing action js-script
To enqueue a script, add a function to the hook
`jet-form-builder/editor-assets/before`. 
This can be done in the same `register` method: 
```php
    use Jet_FB_Manual_Boilerplate\Plugin;

    // class declaration

    public static function register() {
        $self = new self();
    
    	/** ... add action for register action  */

        add_action(
            'jet-form-builder/actions/register',
            array( $self, 'editor_assets' )
        );
    }

    public function editor_assets() {
        wp_enqueue_script(
            Plugin::instance()->slug,
            Plugin::instance()->plugin_url( 'assets/js/builder.editor.js' ),
            array(),
            Plugin::instance()->get_version(),
            true
        );
    }
```

### Adding an action via JavaScript

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
 - action_id
 - action_instance

Где `action_id` должен соответствовать строке, определенной в [`get_id`](https://github.com/girafffee/jet-forms-addon-boilerplate-manual#method-get_id--required)

#### method addAction : required
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
which is given in the method [`editor_labels`](https://github.com/girafffee/jet-forms-addon-boilerplate-manual#method-editor_labels--optional)
- [Function] onChangeSetting - to change action settings. It takes two parameters:
    - [any] value of the option 
    - [String] name of the option















