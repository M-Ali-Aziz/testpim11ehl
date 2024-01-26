<?php

namespace UniversityBundle\Controller;

use \AppBundle\Website\Controller\Page;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;

/**
* University Controller
*
* @package University
* @category UniversityBundle
* @author Mohammed Ali
* @version 1.0
*/
class UniversityController extends Page
{
    /**
     * @Route("/partner-universities" , name="partner-universities")
     */
    public function universityAction(Request $request)
    {
        // Use Partner_universities Document type
        $this->view->partner_universities = TRUE;

        // Use breadcrumbs
        $this->view->breadcrumbs = TRUE;
    }
}