<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var modxpo2017ws_site $modxpo2017ws_site */
$modxpo2017ws_site = $modx->getService('modxpo2017ws_site', 'modxpo2017ws_site', $modx->getOption('modxpo2017ws_site_core_path', null,
        $modx->getOption('core_path') . 'components/modxpo2017ws_site/') . 'model/modxpo2017ws_site/'
);
$modx->lexicon->load('modxpo2017ws_site:default');

// handle request
$corePath = $modx->getOption('modxpo2017ws_site_core_path', null, $modx->getOption('core_path') . 'components/modxpo2017ws_site/');
$path = $modx->getOption('processorsPath', $modxpo2017ws_site->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));