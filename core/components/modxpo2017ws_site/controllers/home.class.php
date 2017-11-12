<?php

/**
 * The home manager controller for modxpo2017ws_site.
 *
 */
class modxpo2017ws_siteHomeManagerController extends modExtraManagerController
{
    /** @var modxpo2017ws_site $modxpo2017ws_site */
    public $modxpo2017ws_site;


    /**
     *
     */
    public function initialize()
    {
        $path = $this->modx->getOption('modxpo2017ws_site_core_path', null,
                $this->modx->getOption('core_path') . 'components/modxpo2017ws_site/') . 'model/modxpo2017ws_site/';
        $this->modxpo2017ws_site = $this->modx->getService('modxpo2017ws_site', 'modxpo2017ws_site', $path);
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('modxpo2017ws_site:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('modxpo2017ws_site');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->modxpo2017ws_site->config['cssUrl'] . 'mgr/main.css');
        $this->addCss($this->modxpo2017ws_site->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->modxpo2017ws_site->config['jsUrl'] . 'mgr/modxpo2017ws_site.js');
        $this->addJavascript($this->modxpo2017ws_site->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->modxpo2017ws_site->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->modxpo2017ws_site->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->modxpo2017ws_site->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->modxpo2017ws_site->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->modxpo2017ws_site->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        modxpo2017ws_site.config = ' . json_encode($this->modxpo2017ws_site->config) . ';
        modxpo2017ws_site.config.connector_url = "' . $this->modxpo2017ws_site->config['connectorUrl'] . '";
        Ext.onReady(function() {
            MODx.load({ xtype: "modxpo2017ws_site-page-home"});
        });
        </script>
        ');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->modxpo2017ws_site->config['templatesPath'] . 'home.tpl';
    }
}