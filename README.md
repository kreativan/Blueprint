# Blueprint

This is a blueprint for creating ProcessWire modules and custom admin UI, with the help of the AdminHelper.    
https://github.com/kreativan/AdminHelper

Blueprint contains:
- Module class that extends WideData and used to handle module logic and methods for the module purpose.
- Module Config file that contains module settings and options.
- Process Module responsible for custom admin UI.
- Module Info file that contains module info and settings.

### views
Used by Process module, views folder is where the custom admin UI markup is located. There should be file for each module view/route handled in Process Module `___execute()` method. Each execute method returns array of data that is passed to the view file.

```php
public function ___execute() {
  return [
    "this_module" => $this, // pass the module object
    "_this" => $this, // pass the module object
    "page_name" => "main", // page name
    "items" => $this->items() // pass the items or any kind of data...
  ];
}
```

### includes
Includes folder is used by the Process module and contains files used to create custom admin ui, mainly included in the view files when needed.

### hooks
Hooks folder is used by the main module and contains files that are automatically included in main module `ready` or `init` method. You can use this folder to add hooks for your module and organize them in separate files to make it easier to maintain eg: access.php, pages.php, fields.php etc...

```php
public function ready() {
  /** Include hooks from folder */
  $this->adminHelper->autoloadFolder(__DIR__ . '/hooks/');
}
```

### classes
Classes folder is used by the main module and should contain custom classes. There is one Example class included in the blueprint that extends WireData. Also main modules provides a simple method to easily create new class instances.

```php
public function example() {
  require_once(__DIR__ . "/classes/Example.php");
  return new \Blueprint\Example();
}

// Usage example:
$example = $blueprint->example();
```

### actions
Actions folder contains files that are automatically included in main module `init` method based on the `$_GET` variable name defined in `$AdminHelper->autoloadActions()` method. You can use this file to handle login and data processing (form submits etc...) related to the Process module and the custom admin ui, for example: create-product.php, update-product.php, delete-product.php etc...

```php
/**
  * Auto-load Actions
  * Will include files from /actions/ folder based on a specified GET variable
  * @param array $GET - name of the get variable eg: 'my_action' eg: '?my_action=delete'
  * @param string $module - module name
  */
$this->AdminHelper->autoloadActions('my_action', 'ProcessBlueprint');
```