<?php

/**
 *  Blueprint 
 *  @author Ivan Milincic <hello@kreativan.dev>
 *  @copyright 2023 kraetivan.dev
 *  @link http://kraetivan.dev
 */


namespace ProcessWire;

class Blueprint extends WireData implements Module {

  public static function getModuleInfo() {
    return array(
      'title' => 'Blueprint',
      'version' => 100,
      'summary' => 'Main blueprint module for the logic and helpers',
      'icon' => 'codepen',
      'author' => "Ivan Milincic",
      "href" => "https://kreativan.dev",
      'singular' => true,
      'autoload' => true
    );
  }

  public function __construct() {
    // ...
  }


  // --------------------------------------------------------- 
  // Init 
  // --------------------------------------------------------- 

  public function init() {
    /**  
     * Set global variable for this module
     * global @var $blueprint 
     */
    $this->wire("blueprint", $this, true);
  }


  // --------------------------------------------------------- 
  // Ready runs after init() 
  // --------------------------------------------------------- 

  public function ready() {
    /** Include hooks from folder */
    $this->adminHelper->autoloadFolder(__DIR__ . '/hooks/');
  }


  // ========================================================= 
  // Basic
  // ========================================================= 

  public function path() {
    return $this->config->paths->siteModules . $this->className() . "/";
  }

  public function url() {
    return $this->wire('config')->urls->siteModules . $this->className() . '/';
  }


  // ========================================================= 
  // Classes 
  // ========================================================= 

  public function example() {
    require_once(__DIR__ . "/classes/Example.php");
    return new \Blueprint\Example();
  }
}
