<?php

namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;

class NewsSubsite extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Nyheter (subsite)';
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
                'label' => 'Filtrera på webbplats',
                'type' => 'select',
                'name' => 'webbplats',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($newsClassDefinition, [['', 'Alla']], 'Webb'),
                ],
            ],
            [
                'label' => 'Filtrera på kategori',
                'type' => 'select',
                'name' => 'category',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($newsClassDefinition, [['', 'Alla']], 'Category'),
                ],
            ],
            [
                'label' => 'Filtrera på Ämnesområde',
                'type' => 'multiselect',
                'name' => 'subject',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($newsClassDefinition, [], 'Subject'),
                ],
            ],
            [
                'label' => 'Filtrera på Ämnen, övriga',
                'type' => 'multiselect',
                'name' => 'subSubject',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($newsClassDefinition, [], 'SubSubject'),
                ],
            ],
            [
                'label' => 'Filtrera på Staff pages',
                'type' => 'multiselect',
                'name' => 'staff',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($newsClassDefinition, [], 'Staff'),
                ],
            ],
            [
                'label' => 'Bakgrundsfärg',
                'type' => 'select',
                'name' => 'color',
                'config' => [
                    'width' => 300,
                    'store' => [
                        ['nav-block-sky-50 nav-block-fade-sky-50', 'Himmel 50 %'],
                        ['nav-block-flower-50 nav-block-fade-flower-50', 'Blomma 50 %'],
                        ['nav-block-copper-50 nav-block-fade-copper-50', 'Koppar 50 %'],
                        ['nav-block-plaster-50 nav-block-fade-plaster-50', 'Puts 50 %'],
                        ['nav-block-stone-50 nav-block-fade-stone-50', 'Sten 50 %'],
                    ],
                ],
            ],
            [
                'label' => 'Utvisning på Kommunikationsavdelningen',
                'type' => 'checkbox',
                'name' => 'ehl',
            ],
            [
                'label' => 'Visa ut bilder',
                'type' => 'checkbox',
                'name' => 'showImage',
            ],
        ]);

        return $config;
    }

    // Other methods defined above!!!
    public function action(Info $info)
    {
        parent::action($info);

        // Get property values
        $webbplats  = $this->getDocumentEditable($info->getDocument(), 'select', 'webbplats')->getData();
        $category  = $this->getDocumentEditable($info->getDocument(), 'select', 'category')->getData();
        $subject = $this->getDocumentEditable($info->getDocument(), 'multiselect', 'subject')->getData();
        $subSubject = $this->getDocumentEditable($info->getDocument(), 'multiselect', 'subSubject')->getData();
        $staff = $this->getDocumentEditable($info->getDocument(), 'multiselect', 'staff')->getData();
        $ehl = $this->getDocumentEditable($info->getDocument(), 'checkbox', 'ehl')->getData();
        $color = $this->getDocumentEditable($info->getDocument(), 'select', 'color')->getData();
        $showImage = $this->getDocumentEditable($info->getDocument(), 'checkbox', 'showImage')->getData();
        $limit = 3;
        $baseUri = $info->getParam('baseuri') !== '/' ?: '';
        $uri = $baseUri . ($this->language == 'sv') ? '/nyheter/' : '/news/';

        // Condition
        $condition   = strtoupper($this->language) . " = 1 AND " .
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
        if ($ehl) {
            $condition .= " AND EHL = 1";
        }

        $newsList = new DataObject\News\Listing();
        $newsList->setLocale($this->language);
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

        // ShowImage
        if ($showImage) {
            foreach ($newsList as $n) {
                if (!$n->getImage1()) {
                    $showImage = false;
                }
            }
        }

        $info->setParam('newsList', $newsListArr);
        $info->setParam('uri', $uri);
        $info->setParam('color', $color);
        $info->setParam('showImage', $showImage);
    }
}
