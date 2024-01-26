<?php

namespace AppBundle\Twig\Extension;

use Pimcore\Config;
use Pimcore\Model\Asset;
use Pimcore\Model\Document;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Pimcore\Twig\Extension\Templating\HeadMeta;

class SocialMediaMetaExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('ehl_social_meta', [$this, 'meta']),
        ];
    }

    public function meta(HeadMeta $headMeta, Document $document, array $customWebsiteConfig): HeadMeta
    {
        $language = $document->getProperty('language');
        $config = Config::getWebsiteConfig();
        $website = $customWebsiteConfig;

        // og:description
        $ogDescription = $document->getEditable('lead') ?
            $document->getEditable('lead')->getValue() : '';

        // Image
        $image = null;
        $imageId = null;
        if ($document->getEditables()) {
            foreach ($document->getEditables() as $obj) {
                if (is_a($obj, 'Pimcore\Model\Document\Editable\Image')) {
                    $imageId = $obj->getId();
                }
            }

            if ($imageId) {
                $image = Asset::getById($imageId);
                $image = ($image) ? 'https://' . $_SERVER['HTTP_HOST'] . $image->getFullPath() : false;
            }
        }

        if (!$image) {
            $logoDomain = ($language == 'sv') ? 'ehl' : 'lusem';
            $image = 'https://' . $_SERVER['HTTP_HOST'] . '/static/toolkit/images/logo/logo_' . $logoDomain . '@2x' . '.png';
        }

        // Assign twitter metas
        $twitter = [
            'card'          => 'summary',
            'site'          => $config->get('twitter_site'),
            'title'         => $document->getTitle(),
            'description'   => substr($document->getDescription(), 0,200),
            'creator'       => $config->get('twitter_site'),
            'image:src'     => $image
        ];

        // Assign open graph facebook metas
        $opengraph = [
            'og:title'       => $document->getTitle(),
            'og:description' => $ogDescription,
            'og:type'        => 'website',
            'og:url'         => 'https://' . $_SERVER['HTTP_HOST'] . $document->getFullPath(),
            'og:image'       => $image,
            'og:site_name'   => $website['name'],
            'fb:app_id'      => $config->get('fb_app_id'),
            'fb:profile_id'  => $config->get('fb_profile_id')
        ];

        /* Twitter Card data
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@Lunduni_LUSEM" />
        <meta name="twitter:title" content="Start" />
        <meta name="twitter:creator" content="@Lunduni_LUSEM" />
        <meta name="twitter:image:src" content="https://ehl.lu.se/images/ehl/690x460/istock-829075370.jpg" />
        ...
        */

        if($twitter){
            foreach($twitter as $name => $content) {
                if($content) {
                    $headMeta->setName('twitter:'.$name, $content);
                }
            }
        }

        /* Open Graph data
        <meta property="og:title" content="Start" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://ehl.lu.se/" />
        <meta property="og:image" content="https://ehl.lu.se/images/ehl/690x460/istock-829075370.jpg" />
        <meta property="og:site_name" content="Ekonomihögskolan vid Lunds universitet" />
        ...
        */
        if($opengraph){
            foreach($opengraph as $property => $content) {
                if($content){
                    $headMeta->setProperty($property, $content);
                }
            }
        }

        return $headMeta;
    }
}
