<?php

namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;

class Uid extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Medarbetare';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/manager.svg';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(500);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'label' => 'Ange Lucat-ID:',
                'type' => 'input',
                'name' => 'uid',
                'config' => [
                    'width' => 300,
                ],
            ],
            [
                'label' => 'Visa bild',
                'type' => 'checkbox',
                'name' => 'displayImage',
            ],
            [
                'label' => 'Visa rubriken "Kontakt/Contact"',
                'type' => 'checkbox',
                'name' => 'displayHeading',
            ],
        ]);

        return $config;
    }

    // Other methods defined above!!!
    public function action(Info $info)
    {
        parent::action($info);

        $baseUri = $info->getParam('baseuri') !== '/' ?: '';

        // Get staff object
        try {
            $uid = $this->getDocumentEditable($info->getDocument(), 'input', 'uid')->getData();
            $employee = DataObject\LucatPerson::getByUid($uid, ['limit' => 1, 'unpublished' => true]);
        } catch (\Exception $e) {
            $employee = null;
        }

        // Assign params to view
        $info->setParam('employee', $employee);
        $info->setParam('baseuri', $baseUri);
    }
}
