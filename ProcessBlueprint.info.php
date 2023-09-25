<?php

/**
 *  Module Blueprint
 *  @author Ivan Milincic <hello@kreativan.dev>
 *  @copyright 2023 kraetivan.dev
 *  @link http://kraetivan.dev
 */

$info = array(

  // Your module's title
  'title' => 'Kreativan: Blueprint',

  // A 1 sentence description of what your module does
  'summary' => 'ProcessWire Process Module Boilerplate using AdminHelper',

  // Module version number: use 1 for 0.0.1 or 100 for 1.0.0, and so on
  'version' => 1,

  // Name of person who created this module (change to your name)
  'author' => 'Ivan Milincic',

  // Icon to accompany this module (optional), uses font-awesome icon names, minus the "fa-" part
  'icon' => 'desktop',

  // URL to more info: change to your full modules.processwire.com URL (if available), or something else if you prefer
  'href' => 'https://kreativan.dev',

  // name of permission required of users to execute this Process (optional)
  'permission' => 'blueprint',

  // permissions that you want automatically installed/uninstalled with this module (name => description)
  'permissions' => array(
    'blueprint' => 'Access to Blueprint'
  ),

  // page that you want created to execute this module
  'page' => array(
    'name' => 'blueprint',
    'title' => 'Blueprint',
    'parent' => '',
  ),

  'singular' => true,
  'autoload' => false, // need for Redirect

  // for more options that you may specify here, see the file: /wire/core/Process.php
  // and the file: /wire/core/Module.php

);
