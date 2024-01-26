<?php

namespace AppBundle\Services;

use Carbon\Carbon;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;
use Pimcore\Log\Simple;
use Pimcore\Model\Site;
use Pimcore\Model\User;
use Pimcore\Tool;
use Pimcore\Translation\Translator;

class CustomWebsiteService
{
    protected Translator $translator;

    /**
     * Returns website DataObject configuration
     * @throws \Exception
     */
    public function getConfig(?Document $document, string $language): array
    {
        // Loading website object...
        // first we are checking for an object on the website property of current document
        // if not found, we try to figure out what object to use (by domain-name).
        $website = $this->getWebsiteObject($document);

        if(!is_object($website)) {
            // Write a log to debug.log
            Simple::log('debug', 'No website object found' . ' ' . __FILE__ . " Line: " . __LINE__);

            // Get the default configuration
            return $this->getDefaultConfiguration($language);
        }

        try
        {
            $config_params = ['languages' => []];

            foreach(Tool::getValidLanguages() as $l)
            {
                if(!$website->getLocaleExists($l)) {
                    continue;
                }

                // Getting siteInfo uri
                $href = $website->getSiteInfo() ? $website->getSiteInfo()[0]->getElement() : null;
                $siteInfoPage = $website->getSiteInfo() ? Document::getById($href->getId()) : null;
                $siteInfo = (is_object($href)) ? [
                        'label' => $siteInfoPage->getTitle(),
                        'uri'   => $siteInfoPage->getFullPath()
                    ] : null
                ;

                // Setting website config parameters
                $config_params['languages'][$l] = $lang_config_params = [
                    'canonicaldomainname' => $this->getCanonicalDomainName(),
                    'domainname' => $website->getDomainName(),
                    'newsFilter' => $website->getNewsFilter(),
                    'subdomain' => $website->getSubdomain(),
                    'baseuri' => $website->getBaseUri($l),
                    'title' => $website->getMain_Title($l),
                    'subtitle' => $website->getMain_Sub_Title($l),
                    'name' => $website->getContact_Information_Name($l),
                    'mail' => $website->getContact_Information_Mail($l),
                    'phone' => $website->getContact_Information_Phone($l),
                    'adress' => $website->getContact_Information_Address($l),
                    'departmentnumber' => $website->getDepartmentNumber(),
                    'locale' => $language,
                    'siteInfo' => $siteInfo
                ];

                // Checking if current language-config-parameters are the active one
                // if so, then we want these values to be in the root of config-param
                if($l == $language) {
                    $config_params = array_merge($config_params, $lang_config_params);
                }
            }
        }
        catch(\Exception $e)
        {
            // Write a log to debug.log
            Simple::log('debug', $e->getMessage() . ' ' . __FILE__ . " Line: " . __LINE__);

            // Get default configuration
            return $this->getDefaultConfiguration($language);
        }

        return $config_params;
    }

    /**
     * @throws \Exception
     */
    public function getWebsiteObject(?Document $document): DataObject\Website
    {
        return ($document) ? $document->getProperty('website') :
            DataObject\Website::getByDomainName($this->getCanonicalDomainName(), ['limit' => 1]);
    }

    /**
     * Returns the canonical domain name for a domain name
     * @throws \Exception
     */
    private function getCanonicalDomainName(): string
    {
        // Edit mode does not use site request, so we need to
        // figure out the site's domain from the real path
        if (Site::isSiteRequest()) {
            $site = Site::getCurrentSite();
            $domains = $site->getDomains();
            $server_name = $domains[0];
        }
        else {
            $server_name = $this->getSiteDomain();
            if (!$server_name) $server_name = "ehl.lu.se";
        }

        // Strip www component from domain name
        if (str_starts_with($server_name, 'www')) {
            $server_name = substr($server_name, strpos($server_name, '.') + 1);
        }

        return $server_name;
    }

    /**
     * Returns domain component from document real path.
     * This function is used to extract the domain name for requests in edit mode.
     */
    private function getSiteDomain(): ?string
    {
        $websiteDataObject = $this->getWebsiteDataObjectlisting();
        foreach ($websiteDataObject as $w) {
            if ($_SERVER['HTTP_HOST'] && str_contains($_SERVER['HTTP_HOST'], $w->getDomainName())) {
                return $w->getDomainName();
            }
        }

        return null;
    }

    /**
     *  Get Website DataObject Listing
     */
    private function getWebsiteDataObjectlisting(): DataObject\Website\Listing
    {
        return new DataObject\Website\Listing();
    }

    /**
     * Returns default website DataObject configuration.
     */
    private function getDefaultConfiguration(string $language): array
    {
        // Setting default website config parameters
        $config_params = [
            'canonicaldomainname' => 'ehl.lu.se',
            'domainname' => 'www.ehl.lu.se',
            'subdomain' => 'ehl',
            'baseuri' => '/',
            'title' => 'Ekonomihögskolan',
            'subtitle' => 'Lunds universitet',
            'departmentnumber' => 'v1000017',
            'locale' => 'sv'
        ];

        if ($language == 'en') {
            $config_params = [
                'canonicaldomainname' => 'lusem.lu.se',
                'domainname' => 'www.lusem.lu.se',
                'subdomain' => 'lusem',
                'baseuri' => '/',
                'title' => 'School of Economics and Management',
                'subtitle' => 'Lund University',
                'locale' => 'en'
            ];
        }

        return $config_params;
    }

    public function getSearchUrl(array $websiteConfig, string $language): string
    {
        // Add dev/test to $subDomain depending on the current environment
        $subDomain = $websiteConfig['subdomain'];
        if ($_SERVER["SERVER_NAME"] && str_contains($_SERVER["SERVER_NAME"], 'dev')) {
            $subDomain = 'dev.' . $subDomain;
        } elseif ($_SERVER["SERVER_NAME"] && str_contains($_SERVER["SERVER_NAME"], 'test')) {
            $subDomain = 'test.' . $subDomain;
        }

        // SearchUrl
        return (((str_contains($subDomain, 'ehl')) || (str_contains($subDomain, 'lusem'))) ?
                '//' . $subDomain :
                (($language == 'en') ? 'https://www.lunduniversity' : 'https://www')) . '.lu.se/search';

    }

    public function getThisSiteInOtherLang(?Document $document, string $language): ?array
    {
        if ($document->getProperty('thisSiteInOtherLang')) {
            $otherDoc = $document->getProperty('thisSiteInOtherLang');
            return ($otherDoc->getParentId()) ?
                [
                    'path' => $otherDoc->getFullPath(),
                    'lang' => ($language === 'sv') ? 'en' : 'sv'
                ] :
                null;
        }

        return null;
    }

    public function getPageManager(Document $document): string
    {
        $uid = $document->getProperty('pageManager');
        $user = User::getByName($uid);

        if($user) {
            // Get page content manager mail
            $pageManager = $user->getEmail();
            $mail = $user->getEmail();
        }
        else {
            // If user does not exist use webmaster
            $pageManager =  $this->translator->trans('Webmaster');
            $mail = $_SERVER['SERVER_ADMIN'];
        }

        return '<a href="mailto:' . $mail . '">' . $pageManager . '</a>';
    }

    public function getPageLastUpdated(Document $document): string
    {
        return Carbon::parse($document->getModificationDate())->format('Y-m-d');
    }

    public function getSummary(string  $text, int $length = 255, string $endWith = '...'): string
    {
        if ($text) {
            $summary = mb_substr($text, 0, $length, 'utf-8');
            if(mb_strlen($summary, 'utf-8') < mb_strlen($text, 'utf-8')) {
                $summary .= $endWith;
            }

            return (strlen($summary) > strlen($endWith)) ? $summary : '';
        }

        return '';
    }
}
