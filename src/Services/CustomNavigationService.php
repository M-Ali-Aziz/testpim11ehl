<?php

namespace AppBundle\Services;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Page;
use Pimcore\Model\Document\Link;
use Pimcore\Model\Document\Hardlink;
use Pimcore\Translation\Translator;
use Pimcore\Twig\Extension\Templating\Navigation;
use Pimcore\Twig\Extension\NavigationExtension;
use Pimcore\Navigation\Container;
use Pimcore\Navigation\Page\Document as PimNavDoc;
use RecursiveIteratorIterator;

class CustomNavigationService
{
    private NavigationExtension $navigationExtension;
    private array $pageTypes = ['page', 'link', 'hardlink'];
    protected Translator $translator;

    public function __construct(Navigation $navigation,Translator $translator)
    {
        $this->navigationExtension = new NavigationExtension($navigation);
        $this->translator = $translator;
    }

    /**
     * @param Page|Link $navStartNode
     */
    public function creatMainMenuList(Page $document, $navStartNode, Container $navigation): string
    {
        $liTag = '';
        $liClass = 'nav-item dropdown dropdown-hover';
        $aHref = '/' . $navStartNode->getKey();
        foreach ($navigation as $page) {
            /* @var $page PimNavDoc */
            if ($page->getActive(true)) {
                $liClass = 'nav-item dropdown dropdown-hover active';
            }
        }
        if ($document->getId() ==  $navStartNode->getId()) {
            $liClass = 'nav-item dropdown dropdown-hover active';
        }

        $liTag .='
            <li class="' . $liClass . '">
            <a href="' . $aHref . '" class="nav-link text-nowrap dropdown-toggle"' . ' id="dropdown-' . $navStartNode->getKey() . '" aria-haspopup="true">' . $navStartNode->getProperty("navigation_name") . '</a>
            <div class="dropdown-menu font-size-base" aria-labelledby="dropdown-' . $navStartNode->getKey() . '">
        ';

        foreach ($navigation as $page) {
            /* @var $page PimNavDoc */
            if (!$page->isVisible()) { continue; }
            if ($page->getActive(true)){ $active = ' active'; }else{$active = '';}
            $liTag .='
                <a class="dropdown-item' . $active . '" href="' . $page->getHref() .'">' . $page->getLabel() .'</a>
            ';
        }

        $liTag .='</div></li>';

        return $liTag;
    }

    /**
     * Create a menu hierarchy of multiple levels
     * @param Hardlink|Link|Page $child
     * @throws \Exception
     */
    public function creatChildrenList(Document $document, $child, string $idPrefix = '', string &$children = ''): string
    {
        $children .= '
            <ul class="' . $this->getUlClass($document, $child) . '" id="'. $idPrefix . 'mobile-' .
            $child->getKey() . '-' . $child->getId() . '">
        ';

        foreach ($child->getChildren() as $child2) {
            if (in_array($child2->getType(), $this->pageTypes)) {
                $children .= '<li class="mobile-nav-item">';
                if (!$child2->getProperty('navigation_exclude')) {
                    $children .= '<div class="mobile-nav-container">';
                    $children .= $this->getAtag($document, $child2, $idPrefix);
                    $children .= '</div>';

                    if ($child2->getChildren()) {
                        $children .= $this->creatChildrenList($document, $child2, $idPrefix);
                    }
                }

                $children .= '</li>';
            }
        }

        $children .= '</ul>';

        return $children;
    }


    /**
     * @param Hardlink|Link|Page $navStartNode
     * @throws \Exception
     */
    private function getUlClass(Document $document, $navStartNode): string
    {
        $mainNavigation = $this->getMainNavigation($document, $navStartNode);

        $ulClass = 'mobile-nav collapse';
        foreach ($mainNavigation as $p) {
            if ( $p->getActive(true) || ($document->getId() == $navStartNode->getId()) ) {
                $ulClass = 'mobile-nav collapse show';
            }
        }

        return $ulClass;
    }

    /**
     * @param Hardlink|Link|Page $navStartNode
     * @throws \Exception
     */
    public function getATag(Document $document, $navStartNode, $idPrefix = ''): string
    {
        $mainNavigation = $this->getMainNavigation($document, $navStartNode);

        $aTag = '';
        $aCollapsed = 'collapsed';
        $hasChild = false;

        if ($navStartNode->getChildren()) {
            foreach ($navStartNode->getChildren() as $child) {
                if ($child->getType() == 'page' || $child->getType() == 'link' || $child->getType() == 'hardlink') {
                    $hasChild = true;
                }
            }
        }

        if (!$hasChild) {
            if ($document->getId() == (($navStartNode->getType() == 'hardlink') ? $navStartNode->getSourceId() : $navStartNode->getId())) {
                $aTag = '<span class="nav-link active">' .
                    $navStartNode->getProperty('navigation_name') .
                    '</span>';
            } else {
                $aTag = '<a href="' . (($navStartNode->getType() == 'hardlink') ? $navStartNode->getPath().$navStartNode->getKey()  : $navStartNode->getHref()) . '" class="nav-link">' .
                    $navStartNode->getProperty('navigation_name') .
                    '</a>';
            }
        } else {
            foreach ($mainNavigation as $p) {
                if ($p->getActive(true)) {
                    $aCollapsed = '';
                }
            }

            if ($document->getId() == (($navStartNode->getType() == 'hardlink') ? $navStartNode->getSourceId() : $navStartNode->getId())) {
                $aCollapsed = '';

                $aTag = '<span class="nav-link active">' .
                    $navStartNode->getProperty('navigation_name') .
                    '</span>';
            } else {
                $aTag = '<a href="' . (($navStartNode->getType() == 'hardlink') ? $navStartNode->getPath().$navStartNode->getKey()  : $navStartNode->getHref()) . '" class="nav-link">' .
                    $navStartNode->getProperty('navigation_name') .
                    '</a>';
            }

            $aTag .= '
                <a href="#' . $idPrefix . 'mobile-' . $navStartNode->getKey() . '-' . $navStartNode->getId() .
                '" class="mobile-nav-toggle ' . $aCollapsed . '"' .
                ' data-target="#' . $idPrefix . 'mobile-' . $navStartNode->getKey() . '-' . $navStartNode->getId() .
                '" data-toggle="collapse" aria-expanded="false"' .
                ' aria-controls="' . $idPrefix . 'mobile-' . $navStartNode->getKey() . '-' . $navStartNode->getId() . '">' .
                '<span class="collapse-show">
                    <i class="fal fa-plus-circle"></i>
                </span>
                <span class="collapse-hide">
                    <i class="fal fa-minus-circle"></i>
                </span>' .
                '</a>';
        }

        return $aTag;
    }

    /**
     * @param Hardlink|Link|Page $navStartNode
     * @throws \Exception
     */
    private function getMainNavigation(Document $document, $navStartNode): Container
    {
        $navigation = $this->navigationExtension;
        return $navigation->buildNavigation($document, $navStartNode);
    }

    /* ----- Nav Left ->->-> */
    public function getNavLeft(Container $container): string
    {
        $html = '';
        $minDepth = 0;

        // Create recursive iterator
        $iterator = new RecursiveIteratorIterator($container, RecursiveIteratorIterator::SELF_FIRST);
        $prevDepth = -1;

        // Iterate container
        foreach ($iterator as $page) {
            $depth = $iterator->getDepth();

            if ($depth < $minDepth) {
                // Page is below minDepth
                continue;
            } else {
                if ($this->isVisible($page)) {
                    if ($depth > $prevDepth) {
                        // Start new ul tag
                        switch($depth) {
                            case 0:
                                $html .= PHP_EOL . '<ul class="nav-accordion nav-collapse nav-undecorated">' . PHP_EOL;
                                break;
                            default:
                                $ulClass = 'nav-accordion collapse';
                                if ($page->getParent()->getActive(true)) $ulClass .= ' show';
                                $html .= PHP_EOL . '<ul class="' . "$ulClass" . '">' . PHP_EOL;
                                break;
                        }
                    } else if ($prevDepth > $depth) {
                        // Close li/ul tags until we're at current depth
                        for ($i = $prevDepth; $i > $depth; $i--) {
                            $html .= '</ul>' . PHP_EOL;
                            $html .= '</li>' . PHP_EOL;
                        }
                        // Close previous li tag
                        // $html .= '</li>' . PHP_EOL;
                    } else {
                        // Close previous li tag
                        $html .= '</li>' . PHP_EOL;
                    }

                    $html .= '<li>'. $this->navLeftGetATag($page);

                    // store as previous depth for next iteration
                    $prevDepth = $depth;
                }
            }
        }

        if ($html) {
            // done iterating container; close open ul/li tags
            for ($i = $prevDepth+1; $i > 0; $i--) {
                // $html .= '</li>'. PHP_EOL . '</li><!-- END -->' . PHP_EOL;
                if ($i == 1) $html .= '</ul>' . PHP_EOL;
            }
            $html .= '</ul>' . PHP_EOL;
        }

        // Render the left-nav menu
        return $html;
    }

    /**
     * @param Hardlink|Link|Page $page
     */
    private function isVisible($page): bool
    {
        $result = true;
        if (!$page->getVisible()) {
            $result = false;
            $pages = $page->getPages();
            if ($pages) {
                foreach($pages as $child) {
                    $child->setVisible(false);
                }
            }
        }

        /* Exclude from navigation is not inherited. */
        $parent = $page->getParent();

        if (is_a($parent, 'Pimcore\Navigation\Page\Document')) {
            if (!$parent->getVisible()) {
                $result = false;
            }
        }

        return $result;
    }

    /**
     * @param Hardlink|Link|Page $page
     */
    private function navLeftGetATag($page): string
    {
        // Is Staff Page
        $checkStaffPage = Document::getById($page->getDocumentId());
        $isStaffPage = $checkStaffPage && $checkStaffPage->getProperty('staff') == 'true';

        // Has Pages
        $hasPages = $page->hasPages();
        if ($hasPages) {
            $hasPages = false;
            foreach ($page->getPages() as $p) {
                if($p->getVisible(true)) {
                    $hasPages = true;
                }
            }
        }

        $aTag = '';
        if (!$hasPages) {
            $aClass = "nav-link";
            if (is_a($page->getParent(), 'Pimcore\Navigation\Page\Document') &&
                $page->getParent()->getActive(true) && $isStaffPage) {
                $aClass = "nav-link bg-stone-25";
            }
            if ($page->getActive(true)) $aClass = "nav-link active";
            if ($page->getActive(true) && $isStaffPage) $aClass = "nav-link bg-stone-25 active";

            $aTag= '<a href="' . $page->getHref() . '" class="'. $aClass . '">' .
                $page->getLabel() .
                '</a>';
        } else {
            $aClass = "nav-link collapse collapsed";
            $chevronClass = "fal fa-chevron-right";
            if ($page->getActive(true)) {
                $aClass = "nav-link collapse active";
                $chevronClass = "fal fa-chevron-down";
            }
            if ($page->getActive(true) && $isStaffPage) $aClass = "nav-link collapse bg-stone-25 active";
            if ($page->getPages()) {
                foreach ($page->getPages() as $p) {
                    if($p->getActive(true)) $aClass = "nav-link collapse";
                    if($p->getActive(true) && $isStaffPage) $aClass = "nav-link collapse bg-stone-25";
                }
            }

            $aTag = '<a href="' . $page->getHref() . '" class="'. $aClass . '">' .
                '<div class="float-right ml-2"><i class="' . $chevronClass . '"></i></div>' .
                $page->getLabel() .
                '</a>';
        }

        return $aTag;
    }/* <-<-<- Nav Left ----- */

    /* ----- Breadcrumbs ->->-> */
    /**
     * @param bool|object $breadcrumbs
     */
    public function getBreadcrumbs(Document $document, $breadcrumbs): string
    {
        $doc = $document;
        $arrayBreadcrumb = [];

        if(is_object($breadcrumbs))
        {
            if ($breadcrumbs->getClassName() === 'LucatOrganisation') {
                $arrayBreadcrumb[] = '<li class="breadcrumb-item active" aria-current="page">Organisation</li>';
            } elseif($breadcrumbs->getClassName() === 'LucatPerson') {
                $arrayBreadcrumb[] = '<li class="breadcrumb-item active" aria-current="page">'.$this->translator->trans('faculty-and-staff').'</li>';
            } else {
                $arrayBreadcrumb[] = '<li class="breadcrumb-item active" aria-current="page">'.$breadcrumbs->getRubrik().'</li>';
            }
        }

        $i = 0;
        while ($doc !== null) {
            $i++;
            if($doc->getId() !== 1 && $doc instanceof \Pimcore\Model\Document\Page &&
                get_class($doc) !== 'Pimcore\Model\Document\Hardlink\Wrapper\Page') {
                if($i == 1 && ! is_object($breadcrumbs)) {
                    $arrayBreadcrumb[] = '<li class="breadcrumb-item active" aria-current="page">'.$doc->getProperty("navigation_name").'</li>';
                }else{
                    $arrayBreadcrumb[] = '<li class="breadcrumb-item"><a href="'.$doc->getFullPath().'">'.$doc->getProperty("navigation_name").'</a></li>';
                }
                $doc = $doc->getParent();
            } elseif ($doc->getId() !== 1 && $doc instanceof \Pimcore\Model\Document\Link) {
                if($i == 1 && ! is_object($breadcrumbs)) {
                    $arrayBreadcrumb[] = '<li class="breadcrumb-item active" aria-current="page">'.$doc->getProperty("navigation_name").'</li>';
                }else{
                    $arrayBreadcrumb[] = '<li class="breadcrumb-item"><a href="'.$doc->getHref().'">'.$doc->getProperty("navigation_name").'</a></li>';
                }
                $doc = $doc->getParent();
            } elseif ($doc->getId() !== 1 && get_class($doc) == 'Pimcore\Model\Document\Hardlink\Wrapper\Page') {
                if($i == 1 && ! is_object($breadcrumbs)) {
                    $arrayBreadcrumb[] = '<li class="breadcrumb-item active" aria-current="page">'.$doc->getProperty("navigation_name").'</li>';
                }else{
                    $arrayBreadcrumb[] = '<li class="breadcrumb-item"><a href="'.$doc->getFullPath().'">'.$doc->getProperty("navigation_name").'</a></li>';
                }
                $doc = $doc->gethardLinkSource()->getParent();
            } else {
                $doc = null;
            }
        }

        $arrayBreadcrumb = array_reverse($arrayBreadcrumb);
        $arrayBreadcrumb[0] = '<li class="breadcrumb-item"><a href="/">Start</a></li>';

        return join($arrayBreadcrumb);
    }/* <-<-<- Breadcrumbs ----- */
}
