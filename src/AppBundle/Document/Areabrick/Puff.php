<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;

class Puff extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Puff';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/button.svg';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $bootstrap = $info->getDocument()->getProperty('bootstrap');

        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(500);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'label' => 'Rubrik',
                'type' => 'input',
                'name' => 'promo_title',
                'config' => [
                    'width' => 300,
                ],
            ],
            [
                'label' => 'Undertext (kan uteslutas)',
                'type' => 'input',
                'name' => 'promo_lead',
                'config' => [
                    'width' => 300,
                ],
            ],
            [
                'label' => 'Intern länk inom den egna webbplatsen (drag-and-drop)',
                'type' => 'relation',
                'name' => 'promo_href',
                'config' => [
                    'width' => 400,
                ],
            ],
            [
                'label' => 'Extern länk utanför den egna webbplatsen (ange fullständig URL)',
                'type' => 'input',
                'name' => 'promo_link',
                'config' => [
                    'width' => 300,
                ],
            ],
            [
                'label' => 'För bild- eller videopuff: bild från Assets (drag-and-drop)',
                'type' => 'relation',
                'name' => 'promo_image',
                'config' => [
                    'width' => 400,
                    'types' => ['asset'],
                    'subtypes' => [
                        'asset' => ['image'],
                    ],
                ],
            ],
        ]);

        if ($bootstrap) {
            $config->addItem([
                'label' => 'Typ av puff',
                'type' => 'select',
                'name' => 'puff',
                'config' => [
                    'width' => 300,
                    'store' => [
                        ['promo_txt_large', 'Textpuff'],
                        ['promo_img', 'Bildpuff'],
                    ],
                ],
            ]);
            $config->addItem([
                'label' => 'Bakgrundsfärg',
                'type' => 'select',
                'name' => 'color',
                'config' => [
                    'width' => 300,
                    'store' => [
                        ['nav-block-sky-50 nav-block-fade-sky-50', 'Himmel 50 %'],
                        ['nav-block-copper-50 nav-block-fade-copper-50', 'Koppar 50 %'],
                        ['nav-block-flower-50 nav-block-fade-flower-50', 'Blomma 50 %'],
                        ['nav-block-plaster-50 nav-block-fade-plaster-50', 'Puts 50 %'],
                    ]
                ],
            ]);
        }
        else {
            $config->addItem([
                'label' => 'Typ av puff',
                'type' => 'select',
                'name' => 'puff',
                'config' => [
                    'width' => 300,
                    'store' => [
                        ['promo_txt_small promo_mini', 'Minipuff'],
                        ['promo_txt_small', 'Liten textpuff'],
                        ['promo_txt_large', 'Stor textpuff'],
                        ['promo_img', 'Bildpuff'],
                        ['promo_video', 'Videopuff'],
                    ],
                ],
            ]);
            $config->addItem([
                'label' => 'Bakgrundsfärg',
                'type' => 'select',
                'name' => 'color',
                'config' => [
                    'width' => 300,
                    'store' => [
                        ['bg_blue', 'Blå'],
                        ['bg_pink', 'Rosa'],
                        ['bg_green', 'Grön'],
                        ['bg_beige', 'Beige'],
                        ['bg_yellow', 'Gul'],
                        ['bg_white', 'Vit'],
                    ],
                ],
            ]);
        }

        return $config;
    }
}
