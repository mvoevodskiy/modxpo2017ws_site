<?php
/**
 * Handles adding Component to Extension Packages
 *
 * @var xPDOObject $object
 * @var array $options
 */
if ($object->xpdo) {
	/** @var modX $modx */
	$modx =& $object->xpdo;

	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
		case xPDOTransport::ACTION_UPGRADE:

		    $pages = array('articles', 'about', 'contacts');

		    foreach ($pages as $page) {
                if (!$catRes = $modx->getObject('modResource', array('alias' => $page))) {

                    $catRes = $modx->newObject('modResource', array(
                        'pagetitle' => ucfirst($page),
                        'published' => 1,
                        'alias' => $page,
                        'parent' => 0,
                        'hidemenu' => 1,
                        'type' => 'document',
                        'contentType' => 'text/html',
                        'content' => '',
                        'show_in_tree' => 1,
                        'createdby' => 1,
                    ));
                    $catRes->save();
                    $setting = $modx->getObject('modSystemSetting', array('key' => 'modxpo2017ws_site_' . $page . '_page'));
                    $setting->set('value', $catRes->get('id'));
                    $setting->save();

                }

            }

		    $users = array('Gauke', 'Mikhail', 'Ivan');

		    foreach ($users as $name) {
                if (!$user = $modx->getObject('modUser', array('username' => $name))) {

                    $user = $modx->newObject('modUser', array(
                        'username' => $name,
                    ));
                    $profile = $modx->newObject('modUserProfile', array('email' => $name . '@modxpo.eu'));
                    $user->addOne($profile, 'Profile');
                    $user->save();
                }

            }

			break;

		case xPDOTransport::ACTION_UNINSTALL:
			if ($modx instanceof modX) {
				$modx->removeExtensionPackage('modxpo2017ws_site');
			}
			break;
	}
}
return true;