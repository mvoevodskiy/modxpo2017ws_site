<?php

class modxpo2017ws_siteOfficeItemUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'modxpo2017ws_siteItem';
    public $classKey = 'modxpo2017ws_siteItem';
    public $languageTopics = array('modxpo2017ws_site');
    //public $permission = 'save';


    /**
     * We do a special check of permission
     * because our objects is not an instances of modAccessibleObject
     *
     * @return bool|string
     */
    public function beforeSave()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $id = (int)$this->getProperty('id');
        $name = trim($this->getProperty('name'));
        if (empty($id)) {
            return $this->modx->lexicon('modxpo2017ws_site_item_err_ns');
        }

        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('modxpo2017ws_site_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, array('name' => $name, 'id:!=' => $id))) {
            $this->modx->error->addField('name', $this->modx->lexicon('modxpo2017ws_site_item_err_ae'));
        }

        return parent::beforeSet();
    }
}

return 'modxpo2017ws_siteOfficeItemUpdateProcessor';
