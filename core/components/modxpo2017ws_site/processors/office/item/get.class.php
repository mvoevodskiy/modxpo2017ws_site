<?php

class modxpo2017ws_siteOfficeItemGetProcessor extends modObjectGetProcessor
{
    public $objectType = 'modxpo2017ws_siteItem';
    public $classKey = 'modxpo2017ws_siteItem';
    public $languageTopics = array('modxpo2017ws_site:default');
    //public $permission = 'view';


    /**
     * We doing special check of permission
     * because of our objects is not an instances of modAccessibleObject
     *
     * @return mixed
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        return parent::process();
    }

}

return 'modxpo2017ws_siteOfficeItemGetProcessor';