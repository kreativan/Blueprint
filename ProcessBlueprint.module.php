<?php

/**
 *  ProcessBlueprint
 *
 *  @author Ivan Milincic <hello@kreativan.dev>
 *  @copyright 2023 kraetivan.dev
 *  @link http://kraetivan.dev
 */

namespace ProcessWire;

class ProcessBlueprint extends Process implements WirePageEditor {

  // for WirePageEditor
  public function getPage() {
    return $this->page;
  }

  // --------------------------------------------------------- 
  // Init 
  // --------------------------------------------------------- 

  public function init() {
    parent::init(); // always remember to call the parent init

    /**
     * Auto-load Actions
     * Will include files from /actions/ folder based on a specified GET variable
     * @param array $GET - name of the get variable eg: 'my_action' eg: '?my_action=delete'
     * @param string $module - module name
     */
    $this->AdminHelper->autoloadActions('my_action', 'ProcessBlueprint');
  }

  // --------------------------------------------------------- 
  // Ready runs after init() 
  // --------------------------------------------------------- 

  public function ready() {
    // do something
  }

  // --------------------------------------------------------- 
  // Admin Pages 
  // --------------------------------------------------------- 

  /**
   * Main module admin page
   * Can access this page from url: ./
   * Will render file from views/execute.php
   */
  public function ___execute() {
    /**
     *  Redirect helper
     *  this should always redirect us where we left off after page save,
     *  back to paginated page, or with get variables...
     */
    $this->AdminHelper->redirectHelper();

    // set a new headline, replacing the one used by our page
    // this is optional as PW will auto-generate a headline
    $this->headline('Blueprint');
    // add a breadcrumb that returns to our main page
    // this is optional as PW will auto-generate breadcrumbs
    $this->breadcrumb('./', 'Blueprint');

    return [
      "this_module" => $this,
      "_this" => $this,
      "page_name" => "main",
      "items" => $this->items()
    ];
  }

  /**
   * Subpage
   * Can access this page from main page using url: ./subpage/
   * Will render file from views/subpage.php
   */
  public function ___executeSubpage() {
    $this->AdminHelper->redirectHelper();
    $this->headline('Subpage');
    $this->breadcrumb('./', 'Blueprint');
    $this->breadcrumb('./subpage/', 'Subpage');
    return [
      "this_module" => $this,
      "_this" => $this,
      "page_name" => "subpage",
    ];
  }

  // --------------------------------------------------------- 
  // Query items
  // --------------------------------------------------------- 

  /**
   * Use this method to get items (pages) from database
   * and pass them to the view
   * @see ___execute()
   */
  public function items() {
    return;
  }

  // --------------------------------------------------------- 
  // Search 
  // --------------------------------------------------------- 

  /**
   * Check if search is active
   */
  public function is_search() {
    $is_search = false;
    foreach ($this->input->get as $key => $value) {
      if (in_array($key, $this->search_fields()) && $value != "") $is_search = true;
    }
    return $is_search;
  }

  /** 
   * Search fields
   * List of fields that will be used in the search bar
   * Array key should be the same as the field name
   */
  public function search_fields() {
    $fields = [
      'title' => [
        'type' => 'text',
        'name' => 'title',
        'value' => $this->input->get->title,
        'label' => __('Title'),
        'placeholder' => __('Title'),
        'grid' => '1-2',
      ],
      'status' => [
        'type' => 'select',
        'name' => 'status',
        'value' => $this->input->get->status,
        'label' => __('Status'),
        'placeholder' => __('Select Status'),
        'options' => [
          'option1' => 'Option 1',
          'option2' => 'Option 2',
          'option3' => 'Option 3',
        ],
        'grid' => '1-2',
      ],
      'category' => [
        'type' => 'select_pages',
        'name' => 'category',
        'value' => $this->input->get->category,
        'label' => __('Category'),
        'placeholder' => __('Select Category'),
        'pages' => $this->pages->find('template=category'),
        'grid' => '1-2',
      ],
    ];
    return $fields;
  }
}
