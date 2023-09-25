<?php

/**
 * Includes: dropdown-button.php
 * Dropdown button will trigger a dropdown menu with htmx get request
 * @var $item - page object
 * @var $back_url - back url - used in dropdown for page edit link
 */

namespace ProcessWire;

$icon = "more-vertical";
$dropdown_path = __DIR__ . "/dropdown.php";

$attr = 'uk-icon="more-vertical"';
$attr .= "hx-get='./?htmx={$dropdown_path}&id={$item->id}&back_url={$back_url}'";
$attr .= "hx-target='#dropdown-{$item->id}'";
$attr .= "hx-swap='innerHTML'";

?>

<a href="#" class="uk-icon-button" <?= $attr ?>></a>

<div id="dropdown-<?= $item->id ?>" class="uk-dropdown" uk-dropdown="mode: click;">
  <span uk-spinner></span>
</div>