<?php

/**
 * Views: execute.php
 * @var $this_module - this module object
 * @var $_this - this module object
 * @var $page_name - current page name
 * @var $items - items (pages)
 */

namespace ProcessWire;

/**
 * Main file that will be rendered and synced with HTMX
 */
$table = __DIR__ . '/../includes/table.php';

/**
 * Data that will be passed to HTMX file using data-vals attribute
 * Use 'this' => 'module_name' to pass the module object to the htmx file
 */
$data = [
  'this' => $_this->className(),
];

// Close page edit modal after save?
$close_modal = false;

?>

<div id="blueprint-id" data-htmx="<?= $table ?>" data-vals='<?= $AdminHelper->json_encode($data) ?>' data-close-modal="$close_modal">

  <?php
  $files->include($table, [
    '_this' => $_this,
  ]);
  ?>

</div>