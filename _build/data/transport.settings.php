<?php
/** @var modX $modx */
/** @var array $sources */

$settings = array();

$tmp = array(
    'articles_page' => array(
        'xtype' => 'numberfield',
        'value' => 0,
        'area' => 'modxpo2017ws_site_main',
    ),
    'about_page' => array(
        'xtype' => 'numberfield',
        'value' => 0,
        'area' => 'modxpo2017ws_site_main',
    ),
    'contacts_page' => array(
        'xtype' => 'numberfield',
        'value' => 0,
        'area' => 'modxpo2017ws_site_main',
    ),
);

foreach ($tmp as $k => $v) {
    /** @var modSystemSetting $setting */
    $setting = $modx->newObject('modSystemSetting');
    $setting->fromArray(array_merge(
        array(
            'key' => 'modxpo2017ws_site_' . $k,
            'namespace' => PKG_NAME_LOWER,
        ), $v
    ), '', true, true);

    $settings[] = $setting;
}
unset($tmp);

return $settings;
