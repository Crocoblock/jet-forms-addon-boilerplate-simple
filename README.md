# JetForm Manual Boilerplate
This is a guide on how to make your own extension for JetFormBuilder & JetEngine Forms. 

*This is a guide on how to make your own extension for JetFormBuilder & JetEngine Forms. This is an implementation without using the [Composer](https://getcomposer.org/doc/00-intro.md) package manager. If you know how to use it, [Advanced Boilerplate](https://github.com/girafffee/jet-forms-addon-boilerplate-advanced) is more suitable for you.*

## JetFormBuilder

### Adding an action

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
        return 'stone_age';  
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
        return __( 'Stone Age Action', 'jet-forms-addon-manual-boilerplate' );  
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

> *If you use the methods that are listed here after `self_script_name`, then in this method you must specify the unique name of the object*
```php
    // class declaration

    /**  
     * @return string  
     */
    public function self_script_name() {  
        return 'JetStoneAgeAction';  
    }
```

#### method `editor_labels` : `optional`
> Возвращает array в формате `attr_id => attr_label`. 
> Можно оставить пустым, если необходимо регистрировать labels со стороны `JavaScript`
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
> Возвращает массив из `attr_id` всех атрибутов экшена.
```php
    // class declaration

    /**
     * @return string[]
     */
    public function visible_attributes_for_gateway_editor() {
        return array( 'id', 'title' );
    }
```
