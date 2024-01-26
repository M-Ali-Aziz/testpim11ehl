<?php

namespace LucatBundle\Model;

use PDO;
use Pimcore\Model\DataObject;
use Pimcore\Config;
use Pimcore\Db;

/**
 * Synchronize LucatRoll with LucatOpen
 */
class RollProvider extends AbstractProvider
{
    /**
     * Synchronize Lucat Roll
     * @throws \Exception
     */
    public function SynchronizeLucatRoll()
    {
        // Get lucatRollParentId
        $parentId = $this->getParentId('lucatRollParentId');

        // Set published
        $published = 1;

        // Get the valid languages
        $config = Config::getSystemConfiguration();
        $l = explode(',', $config['general']['valid_languages']);

        // Connect to Pimcore DB
        $db = Db::get();

        // Get Uids
        $uids = $this->getUids();
        $uids = array_map(function($uid) { return("'" . $uid['uid'] . "'"); }, $uids);
        $uids = implode(',', $uids);

        // Get lucatOpen
        $lucatopen = $this->getLucatOpen();

        // Fetch all Roles
        $sql = "SELECT "
            . "pa.uid, "
            . "pa.luEduPersonGUID, "
            . "por.guid AS porguid, "
            . "p.guid AS pguid, "
            . "por.*, "
            . "ro.*, "
            . "ou.departmentNumber " 
            . "FROM luEduPersonAccount AS pa "
            . "INNER JOIN luEduPerson AS p "
            . "ON pa.luEduPersonGUID = p.guid "
            . "INNER JOIN luEduPersonOrgRole AS por "
            . "ON por.luEduPersonGUID = p.guid "
            . "INNER JOIN luEduOrgRole AS ro "
            . "ON ro.guid = por.luEduOrgRoleGUID "
            . "INNER JOIN luEduOrgUnit AS ou "
            . "ON ou.guid = ro.luEduOrgUnitGUID "
            . "WHERE pa.uid IN ($uids)";

        $statement = $lucatopen->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Save/Update Lucat Roll
        foreach ($result as $lucatOpenRoll) {
            // Check if Roll already exists
            $query = sprintf('SELECT o_id FROM objects WHERE o_parentId=%s AND o_key="%s" LIMIT 0,1', $parentId, $lucatOpenRoll['porguid']);
            $oIdExisting = $db->fetchAll($query);
            $o_id = (int) $oIdExisting[0]['o_id'];

            if ($o_id) {
                // Update the Object
                $lucatRollObj = DataObject\LucatRoll::getById($o_id);

                $values = [
                    'guid' => $lucatOpenRoll['porguid'],
                    'uid' => $lucatOpenRoll['uid'],
                    'departmentNumber' => $lucatOpenRoll['departmentNumber'],
                    'luEduOrgRoleGUID' => $lucatOpenRoll['luEduOrgRoleGUID'],
                    'luEduPersonGUID' => $lucatOpenRoll['luEduPersonGUID'],
                    'mobile' => $lucatOpenRoll['mobile'],
                    'telephoneNumber' => $lucatOpenRoll['telephoneNumber'],
                    'roleType' => $lucatOpenRoll['luEduOrgRoleType'],
                    'primaryContactInfo' => (($lucatOpenRoll['luEduPersonOrgRolePrimaryContactInfo'] == 'True') ? 1 : 0),
                    'leaveOfAbsence' => (($lucatOpenRoll['luEduPersonOrgRoleLeaveOfAbsence'] == 'True') ? 1 : 0),
                    'hideFromWeb' => (($lucatOpenRoll['luEduPersonOrgRoleHideFromWeb'] == 'True') ? 1 : 0),
                    'room' => $lucatOpenRoll['roomNumber']
                ];

                $lucatRollObj->setValues($values);
                $lucatRollObj->setDisplayName($lucatOpenRoll['displayName'], $l[0]);
                $lucatRollObj->setDisplayName($lucatOpenRoll['luEduOrgRoleNameEn'], $l[1]);

                // Disable versioning for the current process
                \Pimcore\Model\Version::disable();

                $lucatRollObj->save();  
            }
            else {
                // Save new Object
                $lucatRollObj = new DataObject\LucatRoll();

                $values = [
                    'o_parentId' => $parentId,
                    'o_key' => $lucatOpenRoll['porguid'],
                    'o_published' => $published,
                    'guid' => $lucatOpenRoll['porguid'],
                    'uid' => $lucatOpenRoll['uid'],
                    'departmentNumber' => $lucatOpenRoll['departmentNumber'],
                    'luEduOrgRoleGUID' => $lucatOpenRoll['luEduOrgRoleGUID'],
                    'luEduPersonGUID' => $lucatOpenRoll['luEduPersonGUID'],
                    'mobile' => $lucatOpenRoll['mobile'],
                    'telephoneNumber' => $lucatOpenRoll['telephoneNumber'],
                    'roleType' => $lucatOpenRoll['luEduOrgRoleType'],
                    'primaryContactInfo' => (($lucatOpenRoll['luEduPersonOrgRolePrimaryContactInfo'] == 'True') ? 1 : 0),
                    'leaveOfAbsence' => (($lucatOpenRoll['luEduPersonOrgRoleLeaveOfAbsence'] == 'True') ? 1 : 0),
                    'hideFromWeb' => (($lucatOpenRoll['luEduPersonOrgRoleHideFromWeb'] == 'True') ? 1 : 0),
                    'room' => $lucatOpenRoll['roomNumber']
                ];

                $lucatRollObj->setValues($values);
                $lucatRollObj->setDisplayName($lucatOpenRoll['displayName'], $l[0]);
                $lucatRollObj->setDisplayName($lucatOpenRoll['luEduOrgRoleNameEn'], $l[1]);

                // Disable versioning for the current process
                \Pimcore\Model\Version::disable();

                $lucatRollObj->save();
            }
        }

        // Remove old roll(s)
        $this->removeOldData('roll');
    }
}
