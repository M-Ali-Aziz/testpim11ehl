<?php

namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;

class TogglePortrait extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Porträtt (accordion)';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/accordion.svg';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(500);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'label' => 'Bakgrundsfärg',
                'type' => 'select',
                'name' => 'color',
                'config' => [
                    'width' => 250,
                    'store' => [
                        ['bg-sky-50', 'Himmel 50 %'],
                        ['bg-sky-25', 'Himmel 25 %'],
                        ['bg-copper-50', 'Koppar 50 %'],
                        ['bg-copper-25', 'Koppar 25 %'],
                        ['bg-flower-50', 'Blomma 50 %'],
                        ['bg-flower-25', 'Blomma 25 %'],
                        ['bg-plaster-50', 'Puts 50 %'],
                        ['bg-plaster-25', 'Puts 25 %'],
                        ['bg-stone-50', 'Sten 50 %'],
                        ['bg-stone-25', 'Sten 25 %']
                    ]
                ]
            ],
            [
                'label' => 'Bild från Assets (drag-and-drop)',
                'type' => 'image',
                'name' => 'image',
                'config' => [
                    'width' => 550,
                    'hidetext' => true
                ]
            ],
        ]);

        return $config;
    }
}
