<?php

namespace UniversityBundle\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Db;
use Pimcore\Model\Webservice\JsonEncoder;
use Pimcore\Tool\Session;
use Pimcore\Model\DataObject;
use Pimcore\Tool\Frontend;
use Pimcore\File;

class AjaxController extends FrontendController
{
    /**
     * @Route("/university/ajax/get-users")
     */
    public function getUsersAction () {
        $db = Db::get();
        
        $sql = 'SELECT id,name,firstname,lastname FROM users WHERE password IS NOT NULL';
        $users = $db->fetchAll($sql);

        JsonEncoder::encode($users);
    }

    /**
     * Get grid-data
     *
     * @Route("/university/ajax/get")
     * @return JSON
     */
    public function getAction(Request $request)
    {
        try {
            $offset     = $request->get('start');
            $limit      = $request->get('limit');
            $sort       = json_decode($request->get('sort'))[0];
            $order      = isset($sort->direction) ? $sort->direction : 'DESC';
            $orderBy    = isset($sort->property) ? $sort->property : 'o_creationDate';
            $fields     = $request->get('fields');
            $filter     = '%' . $request->get('filter') . '%';
            $session = Session::getReadOnly();
            $user = $session->user;

            // List University Object
            $list = DataObject\University::getList([
                "offset" => $offset,
                "limit" => $limit,
                "orderKey" => $orderBy,
                "order" => $order,
                "unpublished" => true
            ]);

            $list->setCondition($request->get('searchFields')[0] . ' LIKE ' . $list->quote($filter));
            $list->load();

            $totalCount = (int) $list->getTotalCount();
        }
        catch(\Exception $e)
        {
            JsonEncoder::encode(array(
                'message' => $e->getMessage(),
                'id' => null,
                'success' => false,
                'total' => 0
            ));
        }
        
        $result = Array();

        // loop our result
        foreach($list as $o) {
           // only keeping the fields we want
           $row = array_intersect_key( $o->getObjectVars(), array_flip($fields));
           
           // go trough our datarow to check if date object
           foreach($row as $key => $value) {
               if($value instanceOf \Carbon\Carbon) {
                   $row[$key] = $value->format('Y-m-d G:i');
               }
           }

           $result[] = $row;
       }

        JsonEncoder::encode(array(
            'data' => $result,
            'total' => $totalCount,
            'success' => true
        ));

    }

    /**
     * Create a custom Pimcore Class DataObject
     *
     * @Route("/university/ajax/create-object")
     * @return JSON
     */
    public function createObjectAction (Request $request) {

        try {
            $user = (int) $request->get('userId');
            $parentId = Frontend::getWebsiteConfig()->universityParentId;

            // Create a new object
            $universityObject = new DataObject\University();
            $universityObject->setKey(File::getValidFilename('untitled'));
            $universityObject->setParentId($parentId);
            $universityObject->setUserOwner($user);
            $universityObject->setUniversity("Untitled");
            $universityObject->save();

            JsonEncoder::encode(array(
                'id' => $universityObject->getId(),
                'success' => true
            ));
        }
        catch(\Exception $e)
        {
            JsonEncoder::encode(array(
                'message' => $e->getMessage(),
                'id' => null,
                'success' => false
            ));
        }
    }
}
