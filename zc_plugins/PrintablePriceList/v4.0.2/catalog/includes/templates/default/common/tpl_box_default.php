<?php
// -----
// Part of the "Printable Price List" plugin for Zen Cart.
//
// Last updated: v4.0.0
//
// removed all markup, since we don't wan't fancy boxes (languages and currencies) for the pricelist
//
// $content is a local variable set by the sidebox module (e.g. languages.php/currencies.php) before
// this box template is included, so it is not a global. The ?? '' guard simply suppresses any
// undefined-variable notice should the template ever be loaded without that module having run.
//
$content = $content ?? '';
echo $content;
