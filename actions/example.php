<?php

/**
 * Action: example
 * This file will be executed in module init() method if there is a GET request:
 * @example ./?my_action=example
 * Where "my_action" is the name of the GET variable,
 * defined in $adminHelper->autoloadActions('my_action', 'ModuleName') method
 */

namespace ProcessWire;

d("Hello from example action!");
