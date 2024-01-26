<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Log\Simple;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;

class Rss extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'RSS-flöde';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(500);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'label' => 'Rubrik',
                'type' => 'input',
                'name' => 'heading',
            ],
            [
                'label' => 'Länk till RSS-flöde',
                'type' => 'input',
                'name' => 'rss',
            ],
            [
                'label' => 'Antal poster som ska visas (0-20) (default = 10)',
                'type' => 'numeric',
                'name' => 'limit',
                'config' => [
                    'minValue' => 0,
                    'maxValue' => 20,
                ]
            ],
            [
                'label' => 'Rubrik på länk till webbplats för mer nyheter',
                'type' => 'input',
                'name' => 'linkHeading'
            ],
            [
                'label' => 'Länk till webbplats för mer nyheter (https://...)',
                'type' => 'input',
                'name' => 'linkUrl',
            ],
            [
                'type' => 'fieldset',
                'title' => 'Som standard visas det ut en kort beskrivning under varje nyhet.
                            Ändra standardvisning genom att klicka i ett alternativ nedan.',
                'items' => [
                    [
                        'label' => 'Visa lång beskrivning för varje post',
                        'type' => 'checkbox',
                        'name' => 'descriptionLong',
                    ],
                    [
                        'label' => 'Visa inte någon beskrivning',
                        'type' => 'checkbox',
                        'name' => 'descriptionNone',
                    ],
                    [
                        'label' => 'Paginering',
                        'type' => 'checkbox',
                        'name' => 'pagination',
                    ],
                ],
            ],
        ]);

        return $config;
    }

    // Other methods defined above!!!
    public function action(Info $info)
    {
        parent::action($info);

        if ($this->getDocumentEditable($info->getDocument(), 'input', 'rss')->isEmpty()) {
            return;
        }

        // Set conditions
        $heading = $this->getDocumentEditable($info->getDocument(), 'input', 'heading')->getData();
        $rss = $this->getDocumentEditable($info->getDocument(), 'input', 'rss')->getData();
        $brickName = $info->getEditable()->getName();
        $page = $info->getRequest()->get('page');
        $limit = $this->getDocumentEditable($info->getDocument(), 'numeric', 'limit')->getData() ?
            $this->getDocumentEditable($info->getDocument(), 'numeric', 'limit')->getData() : 10;
        $pagination = $this->getDocumentEditable($info->getDocument(), 'checkbox', 'pagination')->getData();

        // Rss feed
        try {
            // Load rss feed
            $rssFeed = (array)@simplexml_load_file($rss);
        } catch (\Exception $e) {
            // Ops something went wrong
            $rssFeed = NULL;
            // Write a log to debug.log
            Simple::log('debug', $e->getMessage() . ' ' . __FILE__ . " Line: " . __LINE__);
        }

        // Convert rssFeed Object to rssFeedArray
        $rssFeedArray = [];
        $i = 0;
        foreach ($rssFeed['channel']->item as $item) {
            $title = (string)$item->title;
            $description = (string)$item->description;
            $link = (string)$item->link;
            $pubDate = (string)$item->pubDate;
            $creator = (string)$item->xpath('//dc:creator')[$i];
            $i++;

            $rssFeedArray[] = [
                'title' => $title,
                'description' => $description,
                'link' => $link,
                'pubDate' => $pubDate,
                'creator' => $creator
            ];
        }

        // Set limit if no pagination
        if (!$pagination) {
            $rssFeedArray = array_slice($rssFeedArray, 0, $limit);
        }

        // Paginator
        if ($pagination) {
            $paginator = new Paginator(new ArrayAdapter($rssFeedArray));
        }
        if ($paginator) {
            $paginator->setCurrentPageNumber($page);
            $paginator->setItemCountPerPage($limit);
            $paginator->setPageRange(5);

            // Make paginator available in view
            $info->setParam('paginator', $paginator);
        } else {
            // Make paginator available in view
            $info->setParam('paginator', null);
        }

        // Assign params to view
        $info->setParam('heading', $heading);
        $info->setParam('brickName', $brickName);
        $info->setParam('rssFeed', $rssFeed);
        $info->setParam('rssFeedArray', $rssFeedArray);
        $info->setParam('pagination', $pagination);
    }
}
