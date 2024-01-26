<?php

namespace AppBundle\Controller;

use Pimcore\Config;
use Pimcore\Log\Simple;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pimcore\Model\Element\Tag;
use Pimcore\Model\DataObject;

class NewsController extends BaseController
{
    /**
     * @Template
     * @return array|Response
     * @throws \Exception
     */
    public function detailAction(Request $request, $validateForFrontend = TRUE)
    {
        try
        {
            $language = $request->getLocale();
            $website = $this->getWebsiteConfig($this->document, $request->getLocale());
            $paramId = explode('/', $request->get('id'));
            $id = is_array($paramId) ? $paramId[0] : $paramId;
            $condition = is_numeric($id) ? "o_id = ".$id : "o_key = '".$id."'";

            // Create news list
            $list = new DataObject\News\Listing();
            if($validateForFrontend) {
                $condition .= " AND " . strtoupper($language) . " = 1";
            }
            else {
                $list->setUnpublished(true);
            }

            // Set conditions from earlier and load news
            $list->setCondition($condition);
            $results = $list->load();
            $object = $results[0];

            if($object) {
                // Checking for valid subdomain or web-filter
                if($validateForFrontend) {
                    $webb = is_array($object->getWebb()) ? $object->getWebb() : array();
                    $validWebb = array_filter($webb, function($w) use ($website) {
                        return ($w == $website['subdomain'] || strstr($website['newsFilter'], $w));
                    });
                    if(!$validWebb) {
                        throw new \Exception('News object not found. ');
                    }
                }

                $tags = Tag::getTagsForElement($object->getType(), $object->getId());

                // Image
                if($object->getImage1() !== NULL) {
                    $image = 'https://' . $_SERVER['HTTP_HOST'] . $object->getImage1('Opengraph');
                }
                else {
                    $logoDomain = ($language == 'sv') ? 'ehl' : 'lusem';
                    $image = 'https://' . $_SERVER['HTTP_HOST'] . '/static/toolkit/images/logo/logo_'
                        . $logoDomain . '@2x' . '.png';
                }
            }
            else {
                throw new \Exception('News object not found.');
            }
        }
        catch(\Exception $e) {
            $object = null;
            // Write a log to debug.log
            Simple::log('debug', $e->getMessage() . ' ' . __FILE__ . " Line: " . __LINE__);

            throw new \Exception($e->getMessage());
        }

        return [
            'news' => $object,
            'title' => $object->getRubrik(),
            'editHeadTitle' => true,
            'tags' => $tags ?? '',
            'news_locale' => $object->getRubrik($language) ? $language : FALSE,
            'breadcrumbs' => $object,
            // Twitter metas
            'twitter' => [
                'card'          => 'summary',
                'site'          => Config::getWebsiteConfig()->twitter_site,
                'creator'       => Config::getWebsiteConfig()->twitter_site
            ],
            // Open graph Facebook metas
            'opengraph' => [
                'og:title'       => $object->getRubrik(),
                'og:description' => $object->getIngress(),
                'og:type'        => 'article',
                'og:url'         => 'https://' . $_SERVER['HTTP_HOST'] . $this->document->getFullPath() . '/' . $id,
                'og:image'       => $image ?? '',
                'og:site_name'   => $website['name']
            ],
        ];
    }

    /**
     * @Template
    */
    public function previewAction(Request $request)
    {
        // Language
        $language = $request->getLocale();

        try {
            // Get news object by id
            $id = $request->get('id');
            $news = DataObject\News::getById($id);

        }
        catch(\Exception $e) {
            $news = null;
        }

        return [
            'language' => $language,
            'news' => $news ?: null,
            'title' => $news ? $news->getRubrik() : null,
            'news_locale' => !$news ? null : ($news->getRubrik($language) ? $language : null),
        ];
    }
}
