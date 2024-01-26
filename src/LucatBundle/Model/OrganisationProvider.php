<?php

namespace LucatBundle\Model;

use PDO;
use Pimcore\Model\DataObject;
use Pimcore\Config;
use Pimcore\Db;

/**
 * Synchronize LucatOrganisations with LucatOpen
 */
class OrganisationProvider extends AbstractProvider
{
    /**
     * Synchronize Lucat Organisation
     * @throws \Exception
     */
    public function SynchronizeLucatOrganisation()
    {
        // Get lucatOpen
        $lucatopen = $this->getLucatOpen();

        // Prepare departmentNumbers
        $organisations = $this->getOrganisations();
        $departmentNumbers = array_map(function($org) { return("'" . $org . "'"); }, $organisations);
        $departmentNumbers = implode(',', $departmentNumbers);

        // Get lucatOrgParentId
        $parentId = $this->getParentId('lucatOrgParentId');

        // Set published
        $published = 1;

        // Get the valid languages
        $config = Config::getSystemConfiguration();
        $l = explode(',', $config['general']['valid_languages']);

        // Connect to Pimcore DB
        $db = Db::get();

        // Fetch all organisations
        $sql = "SELECT * "
            . "FROM luEduOrgUnit "
            . "WHERE departmentNumber IN ($departmentNumbers)";
            
        $statement = $lucatopen->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Save/Update Lucat Organisations
        foreach ($result as $lucatOpenOrg) {
            // Check if organisation already exists
            $query = sprintf('SELECT o_id FROM objects WHERE o_parentId=%s AND o_key="%s" LIMIT 0,1', $parentId, $lucatOpenOrg['departmentNumber']);
            $oIdExisting = $db->fetchAll($query);
            $o_id = (int) $oIdExisting[0]['o_id'];

            // Modify data - postalAddress
            // Ex: "Box 7080$220 07$Lund" -> "Box 7080, 220 07 Lund"
            $postalAddress = $lucatOpenOrg['postalAddress'];
            if ($postalAddress) {
                $postalAddress = substr_replace($postalAddress,
                    ',',
                    strpos($postalAddress, '$'), 0);
                $postalAddress = str_replace('$', ' ', $postalAddress);
            }

            // Modify data - luEduOrgUnitGpsC
            // Ex: "<55.70954800000001, 13.213698000000022>" -> "55.70954800000001, 13.213698000000022"
            $luEduOrgUnitGpsC = trim($lucatOpenOrg['luEduOrgUnitGpsC'], '<\>');

            if ($o_id) {
                // Update the Object
                $lucatOrgObj = DataObject\LucatOrganisation::getById($o_id);

                $values = [
                    'guid' => $lucatOpenOrg['guid'],
                    'departmentNumber' => $lucatOpenOrg['departmentNumber'],
                    'ParentDepartmentNumber' => $lucatOpenOrg['ParentDepartmentNumber'],
                    'orgType' => $lucatOpenOrg['luEduOrgType'],
                    'postalAdress' => $postalAddress,
                    'street' => $lucatOpenOrg['street'],
                    'postOfficeBox' => $lucatOpenOrg['postOfficeBox'],
                    'location' => $lucatOpenOrg['l'],
                    'telephoneNumber' => $lucatOpenOrg['telephoneNumber'],
                    'vxNumber' => $lucatOpenOrg['luEduOrgUnitVxNumber'],
                    'gpsC' => $luEduOrgUnitGpsC,
                    'domain' => $lucatOpenOrg['luEduOrgUnitDomain'],
                    'internalAdress' => $lucatOpenOrg['street'],
                ];

                $lucatOrgObj->setValues($values);
                $lucatOrgObj->setName($lucatOpenOrg['displayName'], $l[0]);
                $lucatOrgObj->setName($lucatOpenOrg['luEduOrgOuEN'], $l[1]);
                $lucatOrgObj->setDescription($lucatOpenOrg['description'], $l[0]);
                $lucatOrgObj->setDescription($lucatOpenOrg['luEduOrgUnitResearchDescriptionEN'], $l[1]);
                $lucatOrgObj->setEducationDescription($lucatOpenOrg['luEduOrgUnitEducationDescription'], $l[0]);
                $lucatOrgObj->setEducationDescription($lucatOpenOrg['luEduOrgUnitEducationDescriptionEN'], $l[1]);
                $lucatOrgObj->setEducationUri($lucatOpenOrg['luEduOrgUnitEducationDescriptionURI'], $l[0]);
                $lucatOrgObj->setEducationUri($lucatOpenOrg['luEduOrgUnitEducationDescriptionURIEN'], $l[1]);
                $lucatOrgObj->setResearchDescription($lucatOpenOrg['luEduOrgUnitResearchDescription'], $l[0]);
                $lucatOrgObj->setResearchDescription($lucatOpenOrg['luEduOrgUnitResearchDescriptionEN'], $l[1]);
                $lucatOrgObj->setUrl($lucatOpenOrg['luEduOrgUnitHomePageURI'], $l[0]);
                $lucatOrgObj->setUrl($lucatOpenOrg['luEduOrgUnitHomePageURIEN'], $l[1]);
                $lucatOrgObj->setResearchUri($lucatOpenOrg['luEduOrgUnitResearchDescriptionURI'], $l[0]);
                $lucatOrgObj->setResearchUri($lucatOpenOrg['luEduOrgUnitResearchDescriptionURIEN'], $l[1]);

                // Disable versioning for the current process
                \Pimcore\Model\Version::disable();

                $lucatOrgObj->save(); 
            }
            else {
                // Save new Object
                $lucatOrgObj = new DataObject\LucatOrganisation();

                $values = [
                    'o_parentId' => $parentId,
                    'o_key' => $lucatOpenOrg['departmentNumber'],
                    'o_published' => $published,
                    'guid' => $lucatOpenOrg['guid'],
                    'departmentNumber' => $lucatOpenOrg['departmentNumber'],
                    'ParentDepartmentNumber' => $lucatOpenOrg['ParentDepartmentNumber'],
                    'orgType' => $lucatOpenOrg['luEduOrgType'],
                    'postalAdress' => $postalAddress,
                    'street' => $lucatOpenOrg['street'],
                    'postOfficeBox' => $lucatOpenOrg['postOfficeBox'],
                    'location' => $lucatOpenOrg['l'],
                    'telephoneNumber' => $lucatOpenOrg['telephoneNumber'],
                    'vxNumber' => $lucatOpenOrg['luEduOrgUnitVxNumber'],
                    'gpsC' => $luEduOrgUnitGpsC,
                    'domain' => $lucatOpenOrg['luEduOrgUnitDomain'],
                    'internalAdress' => $lucatOpenOrg['street'],
                ];

                $lucatOrgObj->setValues($values);
                $lucatOrgObj->setName($lucatOpenOrg['displayName'], $l[0]);
                $lucatOrgObj->setName($lucatOpenOrg['luEduOrgOuEN'], $l[1]);
                $lucatOrgObj->setDescription($lucatOpenOrg['description'], $l[0]);
                $lucatOrgObj->setDescription($lucatOpenOrg['luEduOrgUnitResearchDescriptionEN'], $l[1]);
                $lucatOrgObj->setEducationDescription($lucatOpenOrg['luEduOrgUnitEducationDescription'], $l[0]);
                $lucatOrgObj->setEducationDescription($lucatOpenOrg['luEduOrgUnitEducationDescriptionEN'], $l[1]);
                $lucatOrgObj->setEducationUri($lucatOpenOrg['luEduOrgUnitEducationDescriptionURI'], $l[0]);
                $lucatOrgObj->setEducationUri($lucatOpenOrg['luEduOrgUnitEducationDescriptionURIEN'], $l[1]);
                $lucatOrgObj->setResearchDescription($lucatOpenOrg['luEduOrgUnitResearchDescription'], $l[0]);
                $lucatOrgObj->setResearchDescription($lucatOpenOrg['luEduOrgUnitResearchDescriptionEN'], $l[1]);
                $lucatOrgObj->setUrl($lucatOpenOrg['luEduOrgUnitHomePageURI'], $l[0]);
                $lucatOrgObj->setUrl($lucatOpenOrg['luEduOrgUnitHomePageURIEN'], $l[1]);
                $lucatOrgObj->setResearchUri($lucatOpenOrg['luEduOrgUnitResearchDescriptionURI'], $l[0]);
                $lucatOrgObj->setResearchUri($lucatOpenOrg['luEduOrgUnitResearchDescriptionURIEN'], $l[1]);

                // Disable versioning for the current process
                \Pimcore\Model\Version::disable();

                $lucatOrgObj->save();
            }
        }

        // Remove old organisation(s)
        $this->removeOldData('organisation');
    } 
}
