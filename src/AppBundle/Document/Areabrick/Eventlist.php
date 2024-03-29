<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;

class Eventlist extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Kalender';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/calendar.svg';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $eventsClassDefinition = ClassDefinition::getByName('Events');

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
                'label' => 'Filtrera på webbplats',
                'type' => 'select',
                'name' => 'webbplats',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($eventsClassDefinition, [['', 'Alla']], 'Webb'),
                ],
            ],
            [
                'label' => 'Filtrera på serie',
                'type' => 'select',
                'name' => 'serie',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($eventsClassDefinition, [['', 'Alla']], 'Serie'),
                ],
            ],
            [
                'label' => 'Filtrera på kategori',
                'type' => 'select',
                'name' => 'kategori',
                'config' => [
                    'width' => 300,
                    'store' => [
                        ['', 'Alla'],
                        ['Disputation', 'Disputation'],
                        ['Föreläsning', 'Föreläsning'],
                        ['Gästföreläsning', 'Gästföreläsning'],
                        ['Konferens', 'Konferens'],
                        ['Kurs', 'Kurs'],
                        ['Mässa', 'Mässa'],
                        ['RP-seminarium', 'RP-seminarium'],
                        ['Seminarium', 'Seminarium'],
                        ['Slutseminarium', 'Slutseminarium'],
                        ['Workshop', 'Workshop'],
                        ['Övrigt', 'Övrigt'],
                    ],
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
                'label' => 'Antal händelser som ska visas',
                'type' => 'select',
                'name' => 'limit',
                'config' => [
                    'width' => 300,
                    'store' => [
                        ['3', '3'],
                        ['4', '4'],
                        ['5', '5'],
                        ['10', '10'],
                        ['20', '20'],
                        ['30', '30'],
                        ['50', '50'],
                        ['100', '100'],
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

        if ($info->getDocument()->getProperty('version') == 0) {
            $config->addItem([
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
            ]);
        }

        return $config;
    }

    // BuildStatement method
    protected function buildStatement($conditions): string
    {
        $statement = "";

        $list = array();
        foreach ($conditions as $value) {
            if ($value) {
                array_push($list, trim($value));
            }
        }

        foreach ($list as $i => $value) {
            $statement .= $value;
            if ($list[$i + 1]) $statement .= " AND ";
        }

        return $statement;
    }

    // Other methods defined above!!!
    public function action(Info $info)
    {
        parent::action($info);

        // Get properties from area brick
        $serie = $this->getDocumentEditable($info->getDocument(), 'select', 'serie')->getData();
        $webbplats = $this->getDocumentEditable($info->getDocument(), 'select', 'webbplats')->getData();
        $kategori = $this->getDocumentEditable($info->getDocument(), 'select', 'kategori')->getData();
        $color = $this->getDocumentEditable($info->getDocument(), 'select', 'color')->getData() ?: 'bg_beige';
        $heading = $this->getDocumentEditable($info->getDocument(), 'input', 'heading')->getData();
        $limit = $this->getDocumentEditable($info->getDocument(), 'select', 'limit')->getData() ?: 10;
        $sammanfattning = (int)$this->getDocumentEditable(
            $info->getDocument(), 'select', 'sammanfattning')->getData();
        $baseUri = $info->getParam('baseuri') !== '/' ?: '';
        $uri = $baseUri . ($this->language == 'sv') ? '/kalendarium/' : '/calendar/';

        try {
            // Fetch events feed as events list object
            $eventList = new DataObject\Events\Listing();
            $eventList->setOrderKey('Start');
            $eventList->setOrder('asc');

            // Set conditions for filtering
            $params = array();
            $conditions = array();
            $eventListArr = [];

            array_push($conditions, "TO_DAYS(FROM_UNIXTIME(End)) >= TO_DAYS(NOW())");

            if ($serie) {
                array_push($conditions, "Serie LIKE ?");
                array_push($params, "%" . $serie . "%");
            }

            if ($kategori) {
                array_push($conditions, "Category LIKE ?");
                array_push($params, "%" . $kategori . "%");
            }

            if ($this->language == 'en') {
                array_push($conditions, "EN = 1");
            }
            if ($this->language == 'sv') {
                array_push($conditions, "SV = 1");
            }

            $statement = $this->buildStatement($conditions);

            if ($statement) $eventList->setCondition($statement, $params);

            if ($eventList && $webbplats) {
                foreach ($eventList as $event) {
                    foreach ($event->getWebb() as $webb) {
                        if ($webb === $webbplats) {
                            $eventListArr[] = $event;
                        }
                    }
                }

                $eventListArr = ($limit) ? array_slice($eventListArr, 0, $limit) : $eventListArr;
                $eventList = $eventListArr;
            }

            $eventList = ($eventList) ?: null;
        } catch (\Exception $e) {
            $eventList = null;
        }

        $info->setParam('eventList', $eventList);
        $info->setParam('color', $color);
        $info->setParam('heading', $heading);
        $info->setParam('sammanfattning', $sammanfattning);
        $info->setParam('uri', $uri);
    }
}
