<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
* Default Controller
*
* The default controller should mainly be used for pages
* that do not use layout (e.g. snippets).
*/
class DefaultController extends BaseController
{
    /**
     * @Template
     */
    public function defaultAction(Request $request): array
    {
        return [
            'header' => header("HTTP/1.0 404 Not Found"),
            'server_request_uri' => $_SERVER['REQUEST_URI'],
            'server_server_admin' => $_SERVER['SERVER_ADMIN'],
        ];
    }

    /**
    * @Template
    */
    public function adminAction(Request $request): RedirectResponse
    {
        return $this->redirect('/admin/login');
    }
}
