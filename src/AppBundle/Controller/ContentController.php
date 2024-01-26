<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends BaseController
{
    /**
     * @Template
     */
    public function defaultAction(Request $request)
    {
        return ['breadcrumbs' => true];
    }

    /**
     * @Template
     */
    public function startAction(Request $request)
    {
        return ['startsite' => true];
    }

    /**
     * @Template
     */
    public function tabsAction(Request $request)
    {
        return [
            'tabs' => true,
            'breadcrumbs' => true,
        ];
    }

    /**
     * @Template
     */
    public function landingAction(Request $request)
    {
        return ['landing' => true];
    }

    /**
     * @Template
     */
    public function subsiteAction(Request $request)
    {
        return [
            'subsite' => true,
            'breadcrumbs' => true,
        ];
    }

    /**
     * @Template
     */
    public function solrAction(Request $request)
    {
        return [
            'solr' => true,
            'breadcrumbs' => true,
        ];
    }

    /**
     * @Template
     */
    public function errorAction(Request $request)
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
        $response->headers->set('HTTP/1.1', '404 Not Found', true);
        $response->send();

        return [];
    }
}
