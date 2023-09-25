<?php

/**
 * Includes: tabs.php
 */

namespace ProcessWire;

?>

<ul class="WireTabs uk-tab">

  <!-- Basic tab item -->
  <li>
    <a href="./" title="">
      <?= __('Blueprint') ?>
    </a>
  </li>

  <!-- Tab button -->
  <li class="tm-tab-button">
    <a href="#" uk-toggle="target: #search > div; cls: uk-hidden">
      <i class="fa fa-search"></i>
      <?= __('Search') ?>
    </a>
  </li>

  <!-- Tabs htmx spinner indicator -->
  <li>
    <span id="htmx-indicator-tabs" class="uk-text-primary" uk-spinner></span>
  </li>

</ul>