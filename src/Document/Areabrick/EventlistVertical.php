<?php

namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Editable\Area\Info;
use \Pimcore\Model\DataObject;

class EventlistVertical extends AbstractTemplateAreabrick
{
    /**
     * @inheritdoc
     */
    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_GLOBAL;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Kalendarium';
    }

    /**
     * @inheritdoc
     */
    public function getVersion()
    {
        return '1.0';
    }

    /**
     * @inheritdoc
     */
    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/icon/calendar_view_day.png';
    }

    public function hasEditTemplate()
    {
        return true;
    }

    // BuildStatement method
    protected function buildStatement($conditions)
    {
        $statement = "";

        $list = array();
        foreach($conditions as $i => $value) {
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
        //get webbplats property from area brick
        $webbplats = $this->getDocumentTag($info->getDocument(), 'select', 'webbplats')->getData();

        //get kategori property from area brick
        $kategori = $this->getDocumentTag($info->getDocument(), 'select', 'kategori')->getData();

        //get color property from area brick
        $color = $this->getDocumentTag($info->getDocument(), 'select', 'kategori')->getData();
        if(empty($color)) $color = 'bg_beige';

        //get language property from document
        $language = $info->getDocument()->getProperty('language');

        try {
            //fetch events feed as events list object
            $limit = $info->getParam('itemsPerRow') ?: 3;
            $eventList = new DataObject\Events\Listing();
            $eventList->setOrderKey('Start');
            $eventList->setOrder('asc');

            //set conditions for filtering
            $params = array();
            $conditions = array();
            $eventListArr = [];

            array_push($conditions, "TO_DAYS(FROM_UNIXTIME(End)) >= TO_DAYS(NOW())");

            if($kategori) {
                array_push($conditions, "Category LIKE ?");
                array_push($params, "%".$kategori."%");
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

            $eventList = ($eventList) ? $eventList : null;
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
        $info->setParam('color', $color);
        $info->setParam('language', $language);
    }
}
