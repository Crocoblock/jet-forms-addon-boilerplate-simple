# Adding a JetFormBuilder Tab via PHP

First, let's start by registering a request interceptor, where we have to store user-entered data.

The class for the tab must inherit from `Jet_Form_Builder\Admin\Tabs_Handlers\Base_Handler`. 

Therefore, we should have something like this:
```php
namespace Jet_FB_Simple_Boilerplate\Jet_Form_Builder\Tabs;

use Jet_Form_Builder\Admin\Tabs_Handlers\Base_Handler;

class My_Tab extends Base_Handler {
    // ...
}
```

Our class should implement such methods:
### method `slug` : `required`
> The unique identifier for the tab.
```php
// class declaration

    /**  
     * @return string  
     */
    public function slug() {  
        return 'my-tab';  
    }
```

### method `on_get_request` : `required`
The method in which the values from the global 
`$_POST` array should be stored. 
The idea behind the tabs is that the values are available throughout the site, 
so here we use our wrapper `Base_Handler::update_options( array $values )`, 
which in turn saves the data through the `update_option` function.

```php
    // class declaration

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
```

### method `on_load` : `required`
The method to return the saved data. To do this, 
we can use our wrapper `Base_Handler::get_options( array $default_values )`.
```php
    // class declaration

    /**
     * @return array
     */
    public function on_load(): array {
        return $this->get_options( array(
            'key'    => 'default key',
            'secret' => 'default secret'
        ) );
    }
```