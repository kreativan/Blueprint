<?php

/**
 * Includes: input-type-confirm.php
 * Inputfield with type confirm, 
 * displays confirm icon and button to apply the value.
 * @var string $field_name - field name
 * @var string $field_value - current field value
 * @var string $placeholder - field placeholder
 */
 */

?>

<div class="uk-position-relative">
  <input class="uk-input on-type-confirm" type="text" name="<?= $field_name ?>" value="<?= $field_value ?>" placeholder="<?= $placeholder ?>" onkeyup="adminHelper.inputTypeConfirm()" />
  <button type="button" class="<?= $value ? 'active' : 'uk-hidden' ?>">
    <i class="fa fa-check"></i>
  </button>
</div>