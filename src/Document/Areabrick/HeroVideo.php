<?php

namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;

class HeroVideo extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName()
    {
        return 'Hero video';
    }

    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/film.svg';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(500);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'label' => 'Text och länk (drag-and-drop eller fullständig URL) *',
                'type' => 'link',
                'name' => 'link'
            ],
            [
                'label' => 'Stillbild från Assets (drag-and-drop) *',
                'type' => 'relation',
                'name' => 'image',
                'config' => [
                    "types" => ["asset"],
                    "subtypes" => [
                        "asset" => ["image"]
                    ],
                ]
            ],
            [
                'label' => 'WEBM-video från Assets (drag-and-drop) *',
                'type' => 'relation',
                'name' => 'webm',
                'config' => [
                    "types" => ["asset"],
                    "subtypes" => [
                        "asset" => ["video"]
                    ],
                ],
            ],
            [
                'label' => 'OGG-video från Assets (drag-and-drop)',
                'type' => 'relation',
                'name' => 'ogg',
                'config' => [
                    "types" => ["asset"],
                    "subtypes" => [
                        "asset" => ["video"]
                    ],
                ]
            ],
            [
                'label' => 'MP4-video från Assets (drag-and-drop) *',
                'type' => 'relation',
                'name' => 'mp4',
                'config' => [
                    "types" => ["asset"],
                    "subtypes" => [
                        "asset" => ["video"]
                    ],
                ]
            ],
            [
                'label' => '3GP-video från Assets (drag-and-drop)',
                'type' => 'relation',
                'name' => '3gp',
                'config' => [
                    "types" => ["asset"],
                    "subtypes" => [
                        "asset" => ["video"]
                    ],
                ]
            ]
        ]);

        return $config;
    }
}
