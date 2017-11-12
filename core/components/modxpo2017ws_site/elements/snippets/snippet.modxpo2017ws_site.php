<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/** @var modxpo2017ws_site $modxpo2017ws_site */
if (!$modxpo2017ws_site = $modx->getService('modxpo2017ws_site', 'modxpo2017ws_site', $modx->getOption('modxpo2017ws_site_core_path', null,
        $modx->getOption('core_path') . 'components/modxpo2017ws_site/') . 'model/modxpo2017ws_site/', $scriptProperties)
) {
    return 'Could not load modxpo2017ws_site class!';
}

// Do your snippet code here. This demo grabs 5 items from our custom table.
$tpl = $modx->getOption('tpl', $scriptProperties, 'Item');
$sortby = $modx->getOption('sortby', $scriptProperties, 'name');
$sortdir = $modx->getOption('sortbir', $scriptProperties, 'ASC');
$limit = $modx->getOption('limit', $scriptProperties, 5);
$outputSeparator = $modx->getOption('outputSeparator', $scriptProperties, "\n");
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);

// Build query
$c = $modx->newQuery('modxpo2017ws_siteItem');
$c->sortby($sortby, $sortdir);
$c->limit($limit);
$items = $modx->getIterator('modxpo2017ws_siteItem', $c);

// Iterate through items
$list = array();
/** @var modxpo2017ws_siteItem $item */
foreach ($items as $item) {
    $list[] = $modx->getChunk($tpl, $item->toArray());
}

// Output
$output = implode($outputSeparator, $list);
if (!empty($toPlaceholder)) {
    // If using a placeholder, output nothing and set output to specified placeholder
    $modx->setPlaceholder($toPlaceholder, $output);

    return '';
}
// By default just return output
return $output;
