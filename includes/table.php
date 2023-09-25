<?php

/**
 * Includes: table.php
 * @var $_this - this module object passed from execute.php
 */

namespace ProcessWire;

$items = $_this->items();

?>

<table class="AdminDataTableSortable uk-table uk-table-striped uk-table-middle uk-table-small uk-margin-remove">

  <thead>
    <tr>
      <th class="uk-table-shrink">ID</th>
      <th><?= __('Title') ?></th>
      <th><?= __('Template') ?></th>
    </tr>
  </thead>

  <tbody>
    <?php if ($items->count) : ?>
      <?php foreach ($items as $item) :
        // row (tr) css class
        // add is-hidden class if page is hidden or unpublished
        $class = $item->isHidden() || $item->isUnpublished() ? "is-hidden" : "";

        // Page edit modal options
        $modal_options = ['container' => 1, 'height' => '100%'];
      ?>
        <tr class="<?= $class ?>">

          <!-- Dropdown Menu -->
          <td>
            <?php
            $files->include(__DIR__ . '/dropdown-button.php', [
              'item' => $item,
            ]);
            ?>
          </td>

          <!-- Title + Page Edit Modal -->
          <td>
            <a href="#" <?= $AdminHelper->htmx()->pageEditModal($item->id, $modal_options) ?>>
              <?= $item->title ?>
              <?= $duplicated_warning ?>
            </a>
          </td>

          <!-- Template -->
          <td>
            <?= $item->template->name ?>
          </td>

        </tr>
      <?php endforeach; ?>
    <?php else :
      // if there is no items display a message 
    ?>
      <tr>
        <td colspan="100%">
          <?= __('No items to display') ?>
        </td>
      </tr>
    <?php endif; ?>
  </tbody>

</table>

<?php
// Render Pagination
if (!$input->get->q) echo $items->renderPager();
?>