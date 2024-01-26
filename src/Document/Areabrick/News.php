<?php

namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;
use Pimcore\Model\WebsiteSetting;

class News extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Nyheter';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/news.svg';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $newsClassDefinition = ClassDefinition::getByName('News');

        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(500);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'label' => 'Rubrik',
                'type' => 'input',
                'name' => 'heading',
                'config' => [
                    'width' => 300,
                ],
            ],
            [
                'label' => 'Kort sammanfattning: antal tecken',
                'type' => 'select',
                'name' => 'sammanfattning',
                'config' => [
                    'width' => 300,
                    'store' => [
                        ['0', 'Dölj'],
                        ['90', 'Förkortad'],
                        ['255', 'Hela'],
                    ],
                ],
            ],
            [
                'label' => 'Filtrera på webbplats',
                'type' => 'select',
                'name' => 'webbplats',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($newsClassDefinition, [], 'Webb')
                ]
            ],
            [
                'label' => 'Antal nyheter som ska visas',
                'type' => 'select',
                'name' => 'limit',
                'config' => [
                    'width' => 300,
                    'store' => [
                        ['3', '3'],
                        ['4', '4'],
                        ['5', '5'],
                        ['8', '8'],
                        ['10', '10'],
                        ['15', '15'],
                        ['20', '20'],
                        ['25', '25'],
                        ['201', '201'],
                    ],
                ],
            ],
            [
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
                        ['bg_white', 'Vit'],
                    ],
                ],
            ],
            [
                'label' => 'Länk till fler nyheter',
                'type' => 'relation',
                'name' => 'link',
                'config' => [
                    'width' => 400,
                    'types' => ['document'],
                    'subtypes' => [
                        'document' => ['page'],
                    ],
                ],
            ],
        ]);

        return $config;
    }

    // Other methods defined above!!!
    /**
     * @throws \Exception
     */
    public function action(Info $info)
    {
        parent::action($info);

        // Get property values
        $language = $info->getDocument()->getProperty('language');
        $heading = $this->getDocumentEditable($info->getDocument(), 'input', 'heading')->getData();
        $sammanfattning = (int) $this->getDocumentEditable($info->getDocument(), 'select', 'sammanfattning')
            ->getData();
        $webbplats  = $this->getDocumentEditable($info->getDocument(), 'select', 'webbplats')->getData();
        $color  = $this->getDocumentEditable($info->getDocument(), 'select', 'color')->getData();
        $limit  = $this->getDocumentEditable($info->getDocument(), 'select', 'limit')
            ->getData() ?: 10;
        $link = $this->getDocumentEditable($info->getDocument(), 'relation', 'link')->getFullPath();
        $baseUri = $info->getParam('baseuri') !== '/' ?: '';
        $uri = $baseUri . ($language == 'sv') ? '/nyheter/' : '/news/';

        // Condition
        $condition = strtoupper($language) . " = 1 AND " .
            "Webb LIKE '%" . $webbplats . "%'";

        $match = str_replace(',', '|',WebsiteSetting::getByName('newsSiteStartpage')->getData());
        if ($info->getParam('startsite') && strlen($match)
            && preg_match('/(' . $match . ')/', $webbplats)) {
            $condition .= " AND Startpage = 1";
        }

        // Listing
        $newsList = new DataObject\News\Listing();
        $newsList->setOrderKey('o_creationDate');
        $newsList->setOrder('desc');
        $newsList->setLimit($limit);
        $newsList->setCondition($condition);

        // Assign params to view
        $info->setParam('newsList', $newsList);
        $info->setParam('heading', $heading);
        $info->setParam('sammanfattning', $sammanfattning);
        $info->setParam('color', $color);
        $info->setParam('link', $link);
        $info->setParam('uri', $uri);
    }
}
