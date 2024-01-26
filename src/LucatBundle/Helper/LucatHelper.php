<?php
namespace LucatBundle\Helper;

use \Pimcore\Db;
use \Pimcore\Model\DataObject;

class LucatHelper
{
    public static function getPerRole($atts)
    {
        extract($atts);

        $db = Db::get();

        $per_table = 'object_' . DataObject\LucatPerson::classId();
        $role_table = 'object_localized_' . DataObject\LucatRoll::classId() . '_sv';
        $org_table = 'object_localized_' . DataObject\LucatOrganisation::classId() . '_sv';
        $querySelect = '';
        foreach($fields as $f) {
            $querySelect .=  $f . ' AS "' . $f . '",';
        }
        $querySelect = substr($querySelect, 0, -1);

        $query = "SELECT DISTINCT $querySelect FROM $role_table AS role 
            INNER JOIN $per_table AS per ON role.luEduPersonGUID = per.guid 
            INNER JOIN $org_table AS org ON role.departmentNumber = org.departmentNumber 
            WHERE per.displayName LIKE '$filter'
            AND per.Roller IS NOT NULL
            AND per.luMail IS NOT NULL
            ORDER BY $orderBy, role.primaryContactInfo $order";

        if( ! is_null($offset) && ! is_null($limit)) {
            $query .= " LIMIT $offset,$limit";
        }

        $data = $db->fetchAll($query);

        $query = "SELECT count(*) as totalCount FROM $role_table AS role 
            INNER JOIN $per_table AS per ON role.luEduPersonGUID = per.guid 
            INNER JOIN $org_table AS org ON role.departmentNumber = org.departmentNumber 
            WHERE per.displayName LIKE '$filter'
            AND per.Roller IS NOT NULL
            AND per.luMail IS NOT NULL
            ORDER BY $orderBy, role.primaryContactInfo $order";

        $totalCount = $db->fetchAll($query);
        $totalCount = (int) $totalCount[0]['totalCount'];

        // Filter/delete duplicate from $data and use role.luMail as unique_key
        $filteredData = [];
        $dMail = [];
        foreach ($data as $d) {
            if ( ! in_array($d['per.luMail'], $dMail)) {
                $dMail[] = $d['per.luMail'];
                $filteredData[] = $d;
            }
        }
        
        return ['data' => $filteredData, 'totalCount' => $totalCount];
    }  
}