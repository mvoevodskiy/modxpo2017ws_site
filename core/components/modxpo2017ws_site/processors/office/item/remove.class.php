<?php

class modxpo2017ws_siteOfficeItemRemoveProcessor extends modObjectProcessor
{
    public $objectType = 'modxpo2017ws_siteItem';
    public $classKey = 'modxpo2017ws_siteItem';
    public $languageTopics = array('modxpo2017ws_site');
    //public $permission = 'remove';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('modxpo2017ws_site_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var modxpo2017ws_siteItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('modxpo2017ws_site_item_err_nf'));
            }

            $object->remove();
        }

        return $this->success();
    }

}

return 'modxpo2017ws_siteOfficeItemRemoveProcessor';