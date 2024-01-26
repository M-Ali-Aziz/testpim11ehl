<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;
use Pimcore\Model\WebsiteSetting;

class NewsBlock extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Nyheter (cards)';
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
                'label' => 'Filtrera på webbplats',
                'type' => 'select',
                'name' => 'webbplats',
                'config' => [
                    'width' => 250,
                    'store' => $this->getNewsStore($newsClassDefinition, [['', 'Alla']], 'Webb')
                ]
            ],
            [
                'label' => 'Filtrera på kategori',
                'type' => 'select',
                'name' => 'category',
                'config' => [
                    'width' => 250,
                    'store' => $this->getNewsStore($newsClassDefinition, [['', 'Alla']], 'Category')
                ]
            ],
            [
                'label' => 'Filtrera på Ämnesområde',
                'type' => 'multiselect',
                'name' => 'subject',
                'config' => [
                    'width' => 250,
                    'store' => $this->getNewsStore($newsClassDefinition, [], 'Subject')
                ]
            ],
            [
                'label' => 'Filtrera på Ämnen, övriga',
                'type' => 'multiselect',
                'name' => 'subSubject',
                'config' => [
                    'width' => 250,
                    'store' => $this->getNewsStore($newsClassDefinition, [], 'SubSubject')
                ]
            ],
            [
                'label' => 'Filtrera på Staff pages',
                'type' => 'multiselect',
                'name' => 'staff',
                'config' => [
                    'width' => 250,
                    'store' => $this->getNewsStore($newsClassDefinition, [], 'Staff')
                ]
            ],
            [
                'label' => 'Bakgrundsfärg',
                'type' => 'select',
                'name' => 'color',
                'config' => [
                    'width' => 250,
                    'store' => [
                        ['', 'Vit'],
                        ['bg-sky-50', 'Himmel 50%'],
                        ['bg-flower-50', 'Blomma 50%'],
                        ['bg-copper-50', 'Koppar 50%'],
                        ['bg-plaster-50', 'Puts 50 %'],
                        ['bg-stone-50', 'Sten 50%']
                    ]
                ]
            ]
        ]);

        if ($info->getParam('landingpage')) {
            $config->addItem([
                'label' => 'Visa antal nyheter',
                'type' => 'select',
                'name' => 'newsLimit',
                'config' => [
                    'width' => 250,
                    'store' => [
                        ['', 'Visa som vanligt, fem nyheter'],
                        ['4', 'Visa enbart fyra nyheter i en rad']
                    ]
                ]
            ]);
            $config->addItem([
                'label' => 'Visa INTE bilder',
                'type' => 'checkbox',
                'name' => 'showImage'
            ]);
        }

        return $config;
    }

    // Other methods defined above!!!
    public function action(Info $info)
    {
        parent::action($info);

        // Get property values
        $language   = $info->getDocument()->getProperty('language');
        $webbplats  = $this->getDocumentEditable($info->getDocument(), 'select', 'webbplats')->getData();
        $category  = $this->getDocumentEditable($info->getDocument(), 'select', 'category')->getData();
        $subject = $this->getDocumentEditable($info->getDocument(), 'multiselect', 'subject')->getData();
        $subSubject = $this->getDocumentEditable($info->getDocument(), 'multiselect', 'subSubject')->getData();
        $staff = $this->getDocumentEditable($info->getDocument(), 'multiselect', 'staff')->getData();
        $landingPage  = $info->getParam('landingpage');
        $newsLimit  = (int) $this->getDocumentEditable($info->getDocument(), 'select', 'newsLimit')->getData();
        $baseUri = $info->getParam('baseuri') !== '/' ?: '';
        $uri = $baseUri . ($language == 'sv') ? '/nyheter/' : '/news/';

        // Condition
        $condition   = strtoupper($language) . " = 1 AND " .
            "Webb LIKE '%" . $webbplats . "%' AND " .
            "Category LIKE '%" . $category . "%'";
        if ($subject) {
            foreach ($subject as $s) {
                $condition .= " AND Subject LIKE '%" . $s . "%'";
            }
        }
        if ($subSubject) {
            foreach ($subSubject as $s) {
                $condition .= " AND SubSubject LIKE '%" . $s . "%'";
            }
        }
        if ($staff) {
            foreach ($staff as $s) {
                $condition .= " AND Staff LIKE '%" . $s . "%'";
            }
        }

        $match = str_replace(',', '|', WebsiteSetting::getByName('newsSiteStartpage')->getData());
        if($info->getParam('startsite') && strlen($match) && preg_match('/('.$match.')/',$webbplats)) {
            $condition .= " AND Startpage = 1";
        }

        $newsTop     = ($info->getParam('newsTop')) ? 1 : 0;
        $itemsPerRow = ($info->getParam('itemsPerRow')) ?: 3;
        $limit       = $itemsPerRow + $newsTop;

        // Set limit if landingPage && newsLimit is set
        $limit = ($landingPage && $newsLimit) ? $newsLimit : $limit;

        // Listing
        $newsList = new DataObject\News\Listing();
        $newsList->setOrderKey('o_creationDate');
        $newsList->setOrder('desc');
        $newsList->setLimit($limit);
        $newsList->setCondition($condition);

        // NewsList array sorted by Ettan
        $newsListEttanTrue = [];
        foreach ($newsList as $news) { 
            if ($news->getEttan() == true) { array_push($newsListEttanTrue, $news); }
        }
        $newsListEttanTrue = array_slice($newsListEttanTrue, 0, 1);
        $newsListArr = array_merge($newsListEttanTrue, array_diff($newsList->getObjects(), $newsListEttanTrue));

        $info->setParam('uri', $uri);
        $info->setParam('newsList', $newsListArr);
    }
}
