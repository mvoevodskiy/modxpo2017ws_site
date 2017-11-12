<?php

class modxpo2017ws_siteOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'modxpo2017ws_siteItem';
    public $classKey = 'modxpo2017ws_siteItem';
    public $languageTopics = array('modxpo2017ws_site');
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('modxpo2017ws_site_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
            $this->modx->error->addField('name', $this->modx->lexicon('modxpo2017ws_site_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'modxpo2017ws_siteOfficeItemCreateProcessor';