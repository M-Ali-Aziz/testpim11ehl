<?php

namespace AppBundle\Twig\Extension;

use AppBundle\Services\CustomNavigationService;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Page;
use Pimcore\Model\Document\Link;
use Pimcore\Model\Document\Hardlink;
use Pimcore\Navigation\Container;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CustomNavigationExtension extends AbstractExtension
{
    private CustomNavigationService $navigationService;

    public function __construct(CustomNavigationService $navigationService)
    {

        $this->navigationService = $navigationService;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('ehl_main_menu_list', [$this, 'creatMainMenuList']),
            new TwigFunction('ehl_nav_children_list', [$this, 'creatChildrenList']),
            new TwigFunction('ehl_nav_get_a_tag', [$this, 'getATag']),
            new TwigFunction('ehl_nav_left', [$this, 'getNavLeft']),
            new TwigFunction('ehl_breadcrumbs', [$this, 'getBreadcrumbs']),
        ];
    }

    /**
     * @param Page|Link $navStartNode
     */
    public function creatMainMenuList(Page $document, $navStartNode, Container $navigation): string
    {
        return $this->navigationService->creatMainMenuList($document, $navStartNode, $navigation);
    }

    /**
     * Create a menu hierarchy of multiple levels
     * @param Hardlink|Link|Page $child
     * @throws \Exception
     */
    public function creatChildrenList(Document $document, $child, string $idPrefix = '', string $children = ''): string
    {
        return $this->navigationService->creatChildrenList($document, $child, $idPrefix, $children);
    }

    /**
     * @param Hardlink|Link|Page $navStartNode
     * @throws \Exception
     */
    public function getATag(Document $document, $navStartNode, $idPrefix = ''): string
    {
        return $this->navigationService->getATag($document, $navStartNode, $idPrefix);
    }

    public function getNavLeft(Container $container): string
    {
        return $this->navigationService->getNavLeft($container);
    }

    /**
     * @param bool|object $breadcrumbs
     */
    public function getBreadcrumbs(Document $document, $breadcrumbs): string
    {
        return $this->navigationService->getBreadcrumbs($document, $breadcrumbs);
    }
}
