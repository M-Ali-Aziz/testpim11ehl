<?php

namespace AppBundle\Twig\Extension;

use AppBundle\Services\CustomWebsiteService;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CustomWebsiteExtension extends AbstractExtension
{
    private CustomWebsiteService $websiteService;

    public function __construct(CustomWebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('ehl_custom_website_config', [$this, 'getConfig']),
            new TwigFunction('ehl_custom_website_object', [$this, 'getObject']),
            new TwigFunction('ehl_search_url', [$this, 'getSearchUrl']),
            new TwigFunction('ehl_web_other_lang', [$this, 'getThisSiteInOtherLang']),
            new TwigFunction('ehl_page_manager', [$this, 'getPageManager']),
            new TwigFunction('ehl_page_last_updated', [$this, 'getPageLastUpdated']),
            new TwigFunction('ehl_summary', [$this, 'getSummary']),
        ];
    }

    /**
     * @throws \Exception
     */
    public function getConfig(?Document $document, string $language): array
    {
        return $this->websiteService->getConfig($document, $language);
    }

    /**
     * @throws \Exception
     */
    public function getObject(?Document $document): DataObject\Website
    {
        return $this->websiteService->getWebsiteObject($document);
    }

    public function getSearchUrl(array $websiteConfig, string $language): string
    {
        return $this->websiteService->getSearchUrl($websiteConfig, $language);
    }

    public function getThisSiteInOtherLang(?Document $document, string $language): ?array
    {
        return $this->websiteService->getThisSiteInOtherLang($document, $language);
    }

    public function getPageManager(Document $document): string
    {
        return $this->websiteService->getPageManager($document);
    }

    public function getPageLastUpdated(Document $document): string
    {
        return $this->websiteService->getPageLastUpdated($document);
    }

    public function getSummary(string  $text, int $length = 255, string $endWith = '...'): string
    {
        return $this->websiteService->getSummary($text, $length, $endWith);
    }
}
