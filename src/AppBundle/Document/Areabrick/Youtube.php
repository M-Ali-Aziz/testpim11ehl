<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;

class Youtube extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName()
    {
        return 'YouTube';
    }

    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/start.svg';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(500);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'label' => 'Rubrik på videoklippet (valfritt)',
                'type' => 'input',
                'name' => 'heading'
            ],
            [
                'label' => 'YouTube videoklipp-ID (ex. MQQWNkJNEI8)',
                'type' => 'input',
                'name' => 'id'
            ]
        ]);

        return $config;
    }
}
