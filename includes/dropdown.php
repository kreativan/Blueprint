<?php

/**
 * Includes: dropdown.php
 * Dropdown content triggered by dropdown button
 * @var $_GET['id'] - page id
 * @var $_GET['back_url'] - back url
 */

namespace ProcessWire;

$id = $sanitizer->int($input->get->id);
$back_url = $sanitizer->text($input->get->back_url);
$page = $pages->get($id);

?>

<ul class="uk-nav uk-dropdown-nav">

  <!-- Edit -->
  <?php if ($user->hasPermission('page-edit', $page)) : ?>
    <li>
      <a href="<?= $AdminHelper->pageEditLink($id, $back_url) ?>">
        <i class="fa fa-edit"></i>
        <?= __('Edit'); ?>
      </a>
    </li>
  <?php endif; ?>

</ul>