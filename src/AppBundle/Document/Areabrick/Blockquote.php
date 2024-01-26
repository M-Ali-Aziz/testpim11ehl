<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;

class Blockquote extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Citat';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/voice_presentation.svg';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(500);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'label' => 'Citat',
                'type' => 'textarea',
                'name' => 'blockquote',
                'config' => [
                    'height' => 90
                ]
            ],
            [
                'label' => 'Namn på citerad person, titel etc',
                'type' => 'input',
                'name' => 'quoted'
            ]
        ]);

        return $config;
    }
}
