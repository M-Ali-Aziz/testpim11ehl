<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;

class EventsBlock extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName()
    {
        return 'Kalender';
    }

    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/calendar.svg';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $eventClassDefinition = ClassDefinition::getByName('Events');

        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(500);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'label' => 'Filtrera på webbplats',
                'type' => 'select',
                'name' => 'webbplats',
                'config' => [
                    'width' => 250,
                    'store' => $this->getStore($eventClassDefinition, [['', 'Alla']], 'Webb')
                ]
            ],
            [
                'label' => 'Filtrera på kategori',
                'type' => 'select',
                'name' => 'category',
                'config' => [
                    'width' => 250,
                    'store' => $this->getStore($eventClassDefinition, [['', 'Alla']], 'Category')
                ]
            ],
            [
                'label' => 'Filtrera på serie',
                'type' => 'select',
                'name' => 'serie',
                'config' => [
                    'width' => 250,
                    'store' => $this->getStore($eventClassDefinition, [['', 'Alla']], 'Serie')
                ]
            ],
            [
                'label' => 'Bakgrundsfärg från grafiska profilen',
                'type' => 'select',
                'name' => 'color',
                'config' => [
                    'width' => 250,
                    'store' => [
                        ['', 'Vit'],
                        ['bg-bronze', 'Lejonbrons'],
                        ['bg-blue', 'Kungsblå'],
                        ['bg-dark', 'Mörkgrå'],
                        ['bg-sky-50', 'Himmel 50%'],
                        ['bg-sky-25', 'Himmel 25%'],
                        ['bg-flower-50', 'Blomma 50%'],
                        ['bg-flower-25', 'Blomma 25%'],
                        ['bg-copper-50', 'Koppar 50%'],
                        ['bg-copper-25', 'Koppar 25%'],
                        ['bg-plaster-50', 'Puts 50%'],
                        ['bg-plaster-25', 'Puts 25%'],
                        ['bg-stone-50', 'Sten 50%'],
                        ['bg-stone-25', 'Sten 25%']
                    ]
                ]
            ],
            [
                'label' => 'Visa antal händelser',
                'type' => 'select',
                'name' => 'limit',
                'config' => [
                    'width' => 250,
                    'store' => [
                        ['2', '2'],
                        ['4', '4'],
                        ['6', '6'],
                        ['8', '8']
                    ]
                ]
            ]
        ]);

        return $config;
    }

    public function getStore(ClassDefinition $eventClassDefinition, array $store, string $fieldName): array
    {
        foreach($eventClassDefinition->getFieldDefinitions()[$fieldName]->options as $o) {
            $store[] = [$o['value'], $o['key']];
        }

        return $store;
    }

    protected function buildStatement(array $conditions): string
    {
        $statement = "";

        $list = array();
        foreach($conditions as $value) {
            if ($value) {
                array_push($list, trim($value));
            }
        }

        foreach($list as $i => $value) {
            $statement .= $value;
            if ($list[$i+1]) $statement .= " AND ";
        }

        return $statement;
    }

    // Other methods defined above!!!
    // Action method
    public function action(Info $info)
    {
        parent::action($info);

        // Get property values
        $language = $info->getDocument()->getProperty('language');
        $webbplats  = $this->getDocumentEditable($info->getDocument(), 'select', 'webbplats')->getData();
        $kategori = $this->getDocumentEditable($info->getDocument(), 'select', 'kategori')->getData();
        $serie = $this->getDocumentEditable($info->getDocument(), 'select', 'serie')->getData();
        $limit = $this->getDocumentEditable($info->getDocument(), 'select', 'limit')->getData();
        $baseUri = $info->getParam('baseuri') !== '/' ?: '';
        $uri = $baseUri . ($language == 'sv') ? '/kalendarium/' : '/calendar/';
        if(empty($limit)) $limit = 6;

        try {
            // Fetch events feed as events list object
            $eventList = new DataObject\Events\Listing();
            $eventList->setOrderKey('Start');
            $eventList->setOrder('asc');

            // Set conditions for filtering
            $params = [];
            $conditions = [];
            $eventListArr = [];

            array_push($conditions, "TO_DAYS(FROM_UNIXTIME(End)) >= TO_DAYS(NOW())");

            if($kategori) {
                array_push($conditions, "Category LIKE ?");
                array_push($params, "%".$kategori."%");
            }

            if($serie) {
                array_push($conditions, "Serie LIKE ?");
                array_push($params, "%".$serie."%");
            }

            if ($language == 'en'){
                array_push($conditions, "EN = 1");
            }
            if ($language == 'sv'){
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
        }
        catch(\Exception $e) {
            $eventList = null;
        }

        $info->setParam('uri', $uri);
        $info->setParam('eventList', $eventList);
        $info->setParam('language', $language);
    }
}
