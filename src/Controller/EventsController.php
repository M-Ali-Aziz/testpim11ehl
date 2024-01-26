<?php

namespace AppBundle\Controller;

use Pimcore\Config;
use Pimcore\Log\Simple;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Model\DataObject;

class EventsController extends BaseController
{
    /**
     * @Template
     * @throws \Exception
     */
    public function detailAction(Request $request)
    {
        try {
            $language = $request->getLocale();
            $website = $this->getWebsiteConfig($this->document, $request->getLocale());


            // Get params from the request/url
            $key = $request->get('key');

            // Get events object by key
            $events = new DataObject\Events\Listing();
            $events->setCondition("o_key = " . $events->quote($key));
            $events->load();
            $event = $events->getObjects()[0];

            if ($event) {
                // Get lokal object by id
                $lokal = DataObject\Lokal::getById($event->getVenue());

                // Image
                if($event->getImage1() !== NULL) {
                    $image = 'https://' . $_SERVER['HTTP_HOST'] . $event->getImage1('Opengraph');
                }
                else {
                    $logoDomain = ($language == 'sv') ? 'ehl' : 'lusem';
                    $image = 'https://' . $_SERVER['HTTP_HOST'] . '/static/toolkit/images/logo/logo_'
                        . $logoDomain . '@2x' . '.png';
                }
            }
            else {
                throw new \Exception('Event object not found.');
            }
        }
        catch(\Exception $e) {
            $event = null;
            // Write a log to debug.log
            Simple::log('debug', $e->getMessage() . ' ' . __FILE__ . " Line: " . __LINE__);

            throw new \Exception($e->getMessage());
        }

        return [
            'event' => $event,
            'title' => $event->getRubrik(),
            'editHeadTitle' => true,
            'google' => Config::getSystemConfiguration()['services']['google'],
            'lokal' => $lokal ?? '',
            'coordinate' => $lokal ? $lokal->getLatitud() . ',' . $lokal->getLongitud() : '',
            'breadcrumbs' => $event,
            // Twitter metas
            'twitter' => [
                'card'          => 'summary',
                'site'          => Config::getWebsiteConfig()->twitter_site,
                'creator'       => Config::getWebsiteConfig()->twitter_site
            ],
            // Open graph Facebook metas
            'opengraph' => [
                'og:title'       => $event->getRubrik(),
                'og:description' => $event->getIngress(),
                'og:type'        => 'article',
                'og:url'         => 'https://' . $_SERVER['HTTP_HOST'] . $this->document->getFullPath() . '/' . $key,
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
        try {
            // Get event object by id
            $id = $request->get('id');
            $event = DataObject\Events::getById($id);

            // Get lokal object by id
            $lokal = DataObject\Lokal::getById($event->getVenue());
        }
        catch(\Exception $e) {
            $event = null;
        }

        return [
            'language' => $request->getLocale(),
            'event' => $event ?: null,
            'google' => $event ? Config::getSystemConfiguration()['services']['google'] : null,
            'lokal' => $lokal ?: null,
            'coordinate' => $lokal ? $lokal->getLatitud() . ',' . $lokal->getLongitud() : null,
        ];
    }
}
