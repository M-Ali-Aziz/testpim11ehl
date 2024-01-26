<?php

namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;
use Pimcore\Model\WebsiteSetting;

class NewsMain extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Nyheter (Main)';
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
                    'store' => $this->getNewsStore($newsClassDefinition, [], 'Webb'),
                ],
            ],
            [
                'label' => 'Filtrera på Kärnverksamhet',
                'type' => 'select',
                'name' => 'category',
                'config' => [
                    'width' => 300,
                    'store' => $this->getNewsStore($newsClassDefinition, [['', '--------']], 'Category'),
                    'defaultValue' => '',
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
                    ],
                ],
            ],
            [
                'label' => 'Utvisning på Kommunikationsavdelningen',
                'type' => 'checkbox',
                'name' => 'ehl'
            ],
            [
                'label' => 'Paging/nyhetsarkiv: alla nyheter visas ut med paginering',
                'type' => 'checkbox',
                'name' => 'paging'
            ],
        ]);

        return $config;
    }

    // Other methods defined above!!!
    public function action(Info $info)
    {
        parent::action($info);

        // Get property values
        $limit = ($limit = $this->getDocumentEditable($info->getDocument(), 'select', 'limit')
            ->getData()) ? $limit : 10;
        $webbplats = $this->getDocumentEditable($info->getDocument(), 'select', 'webbplats')->getData();
        $category = $this->getDocumentEditable($info->getDocument(), 'select', 'category')->getData();
        $subject = $this->getDocumentEditable($info->getDocument(), 'multiselect', 'subject')->getData();
        $subSubject = $this->getDocumentEditable($info->getDocument(), 'multiselect', 'subSubject')->getData();
        $staff = $this->getDocumentEditable($info->getDocument(), 'multiselect', 'staff')->getData();
        $ehl = $this->getDocumentEditable($info->getDocument(), 'checkbox', 'ehl')->getData();
        $baseUri = $info->getParam('baseuri') !== '/' ?: '';
        $uri = $baseUri . ($this->language == 'sv') ? '/nyheter/' : '/news/';
        $paging = $this->getDocumentEditable($info->getDocument(), 'checkbox', 'paging')->getData();
        /* @var \Knp\Component\Pager\PaginatorInterface|null $paginator */
        $paginator = $info->getParam('paginator');
        $page = $info->getRequest()->get('page', 1);

        // Condition
        $condition = strtoupper($this->language) . " = 1 AND " .
            "Webb LIKE '%" . $webbplats . "%'";
        if ($category) {
            $condition .= " AND Category LIKE '%" . $category . "%'";
        }
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

        $match = str_replace(',', '|', WebsiteSetting::getByName('newsSiteStartpage')->getData());
        if ($info->getParam('startsite') && strlen($match) && preg_match('/(' . $match . ')/', $webbplats)) {
            $condition .= " AND Startpage = 1";
        }

        // Listing
        $newsList = new DataObject\News\Listing();
        $newsList->setOrderKey('o_creationDate');
        $newsList->setOrder('desc');
        $newsList->setLimit($limit);
        $newsList->setCondition($condition);

        /* TODO Fix pagination */
        // Pagination
        if ($paging && $paginator) {
            $paginator = $paginator->paginate($newsList, $page, $limit);
        }
        else {
            $paging = false;
            $paginator = null;
        }

        // Assign params to view
        $info->setParam('newsList', $newsList);
        $info->setParam('uri', $uri);
        $info->setParam('paging', $paging);
        $info->setParam('paginator', $paginator);
        $info->setParam('paginationVariables', $paginator ? $paginator->getPaginationData() : null);
    }
}
