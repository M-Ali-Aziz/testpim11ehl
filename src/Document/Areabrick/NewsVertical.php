<?php

namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\DataObject;
use Pimcore\Model\WebsiteSetting;

class NewsVertical extends AbstractTemplateAreabrick
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
        return 'Nyheter (Vertical)';
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
        return '/bundles/pimcoreadmin/img/icon/newspaper.png';
    }

    public function hasEditTemplate()
    {
        return true;
    }

    // Other methods defined above!!!
    // Action method
    public function action(Info $info)
    {
        // get property values
        $language   = $info->getDocument()->getProperty('language');
        $webbplats  = $this->getDocumentEditable($info->getDocument(), 'select', 'webbplats')->getData();

        // condition
        $condition   = strtoupper($language) . " = 1 AND " .
                        "Webb LIKE '%" . $webbplats . "%'";

        $match = str_replace(',', '|', WebsiteSetting::getByName('newsSiteStartpage')->getData());
        if($info->getParam('startsite') && strlen($match) && preg_match('/('.$match.')/',$webbplats)) {
            $condition .= " AND Startpage = 1";
        }

        $newsTop     = $info->getParam('newsTop') ? 1 : 0;
        $itemsPerRow = $info->getParam('itemsPerRow') ?: 3;
        $limit       = $itemsPerRow + $newsTop;

        // listing
        $newsList = new DataObject\News\Listing();
        $newsList->setOrderKey('o_creationDate');
        $newsList->setOrder('desc');
        $newsList->setLimit($limit);
        $newsList->setCondition($condition);

        // Assign params to view
        if (!empty($info->getParams())){
            foreach ($info->getParams() as $key => $value) {
                $info->setParam($key, $value);
            }
        }

        $info->setParam('newsList', $newsList);
        $info->setParam('color', $this->getDocumentEditable($info->getDocument(), 'select', 'color')->getData() ?: 'bg_beige');
        $info->setParam('sammanfattning', (int)$this->getDocumentEditable($info->getDocument(), 'select', 'sammanfattning')->getData());
    }
}
