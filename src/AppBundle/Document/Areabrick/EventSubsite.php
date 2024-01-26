<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;

class EventSubsite extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Kalender (subsite)';
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
                'label' => 'Filtrera på webbplats',
                'type' => 'select',
                'name' => 'webbplats',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($eventsClassDefinition, [['', 'Alla']], 'Webb'),
                ],
            ],
            [
                'label' => 'Filtrera på kategori',
                'type' => 'select',
                'name' => 'kategori',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($eventsClassDefinition, [['', 'Alla']], 'Category'),
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
                'label' => 'Antal händelser som ska visas',
                'type' => 'select',
                'name' => 'limit',
                'config' => [
                    'width' => 300,
                    'store' => [
                        ['2', '2'],
                        ['3', '3'],
                        ['4', '4'],
                        ['5', '5'],
                        ['6', '6'],
                        ['7', '7'],
                        ['8', '8'],
                    ],
                ],
            ],
        ]);

        return $config;
    }

    // BuildStatement method
    protected function buildStatement(array $conditions): string
    {
        $statement = "";

        $list = [];
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
    public function action(Info $info)
    {
        parent::action($info);

        // Get property from area brick
        $webbplats = $this->getDocumentEditable($info->getDocument(), 'select', 'webbplats')->getData();
        $kategori = $this->getDocumentEditable($info->getDocument(), 'select', 'kategori')->getData();
        $serie = $this->getDocumentEditable($info->getDocument(), 'select', 'serie')->getData();
        $limit = $this->getDocumentEditable($info->getDocument(), 'select', 'limit')->getData() ?: 6;
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

            if($kategori) {
                array_push($conditions, "Category LIKE ?");
                array_push($params, "%".$kategori."%");
            }

            if($serie) {
                array_push($conditions, "Serie LIKE ?");
                array_push($params, "%".$serie."%");
            }

            if ($this->language == 'en'){
                array_push($conditions, "EN = 1");
            }
            if ($this->language == 'sv'){
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

            $eventList = (!$eventListArr && $limit) ? $eventList->setLimit($limit) : $eventList;

            $eventList = ($eventList) ?: null;
        }
        catch(\Exception $e) {
            $eventList = null;
        }

        // Assign params to view
        if (!empty($info->getParams())){
            foreach ($info->getParams() as $key => $value) {
                $info->setParam($key, $value);
            }
        }

        $info->setParam('eventList', $eventList);
        $info->setParam('uri', $uri);
    }
}
