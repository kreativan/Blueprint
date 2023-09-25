<?php

/**
 * Includes: search-bar.php
 * Searchbar toggle from the tab button
 * Used to search items in the table
 */

namespace ProcessWire;

?>

<div class="Inputfields tm-outline uk-padding-small<?= !$_this->is_search() ? ' uk-hidden' : '' ?>">

  <h4 class="uk-text-bold uk-text-uppercase uk-margin-small"><?= __('Search') ?></h4>

  <form class="uk-form-stacked" action="./" method="GET" hx-boost="true" hx-target="#table" hx-select="#table" hx-swap="innerHTML" hx-trigger="change" hx-indicator="#htmx-indicator-tabs">

    <div class="uk-grid uk-grid-small" uk-grid>

      <?php foreach ($_this->search_fields() as $field) : ?>
        <div class="uk-width-<?= $field['grid_size'] ?>@m">
          <label class="uk-form-label"><?= $field['label'] ?></label>
          <span class="uk-position-relative">

            <?php if ($field['type'] == 'text') : ?>
              <input class="uk-input input-type-confirm" type="text" name="<?= $field['name'] ?>" value="<?= $field['value'] ?>" placeholder="<?= $field['placeholder'] ?>" onkeyup="adminHelper.inputTypeConfirm()" />
              <button type="button" class="<?= $field['value'] ? 'active' : '' ?>">
                <i class="fa fa-check"></i>
              </button>
            <?php elseif ($field['type'] == 'select') : ?>
              <select class="uk-select InputfieldSetWidth" name="<?= $field['name'] ?>">
                <option value="">- <?= $field['placeholder'] ?> -</option>
                <?php foreach ($field['options'] as $value => $label) : ?>
                  <option value="<?= $value ?>" <?= ($field['value'] == $value) ? 'selected' : '' ?>>
                    <?= $label ?> </option>
                <?php endforeach; ?>
              </select>
            <?php elseif ($field['type'] == 'select_pages') : ?>
              <select class="uk-select InputfieldSetWidth" name="<?= $field['name'] ?>">
                <option value="">- <?= $field['placeholder'] ?> -</option>
                <?php foreach ($field['pages'] as $p) : ?>
                  <option value="<?= $p->id ?>" <?= ($field['value'] == $p->id) ? 'selected' : '' ?>>
                    <?= $p->title ?> </option>
                <?php endforeach; ?>
              </select>
            <?php endif; ?>
          </span>
        </div>
      <?php endforeach; ?>

    </div>

  </form>

</div>