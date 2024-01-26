<?php

namespace LucatBundle\Model;

use PDO;
use PDOException;
use Exception;
use Pimcore\Config;
use Pimcore\Log\Simple;
use Pimcore\Model\DataObject;

class AbstractProvider
{
    /**
     * Lucat Config Path
     * @var string
     */
    protected $lucatConfigPath = PIMCORE_PRIVATE_VAR . '/bundles/LucatBundle/lucat_config.php';

    /**
     * Lucat configs
     * @var array
     */
    protected $lucatConfig = [];

    /**
     * Lucat organisations
     * @var array
     */
    private $organisations = [];

    /**
     * Constractor - get lucat config file
     * @throws Exception
     */
    public function __construct()
    {
        // Set Lucat Config Path
        $lucatConfigPath = $this->lucatConfigPath;
        if(file_exists($lucatConfigPath)) {
            $this->lucatConfig = require $lucatConfigPath;
        }
        else {
            // Add log to lucat.log
            Simple::log("lucat", "LUCAT ERROR: Failed to get lucat config file " . __FILE__ . " Line: " . __LINE__);
            // Print massage
            print ("LUCAT ERROR: Failed to get lucat config file" . "\n");
            // Exception
            throw new Exception("LUCAT ERROR: Failed to get lucat config file" . "\n");
        }

        // Set Organisation
        $this->setOrganisations();
    }

    /**
     * Get lucris config file
     * @return array
     */
    protected function getLucatConfigFile(): array
    {
        return $this->lucatConfig;
    }

    /**
     * Connect to LucatOpen
     * @return PDO object
     * @throws Exception
     */
    protected function getLucatOpen(): PDO
    {
        // Get lucat config file
        $lucatConfigFile = $this->getLucatConfigFile();

        try {
            $hostname = $lucatConfigFile['hostname'];
            $port = $lucatConfigFile['port'];
            $dbname = $lucatConfigFile['dbname'];
            $username = $lucatConfigFile['username'];
            $password = $lucatConfigFile['password'];

            return new PDO ("dblib:host=$hostname:$port;dbname=$dbname","$username","$password");

        } catch (PDOException $e) {
            // Add log to lucat.log
            Simple::log("lucat", "LUCAT ERROR: Failed to connect to LucatOpen: " . $e->getMessage() . " " . __FILE__ . " Line: " . __LINE__);

            throw new Exception("LUCAT ERROR: Failed to connect to LucatOpen: " . $e->getMessage() . "\n");
        }
    }

    /**
     * Get ParentId from Pimcore Website Settings
     * @throws Exception
     */
    protected function getParentId($configName): string
    {
        $parentId = Config::getWebsiteConfig()->get($configName);

        if ($parentId) {
            // Set ParentId
            return $parentId;
        }
        else {
            // Add log to lucat.log
            Simple::log("lucat", "LUCAT ERROR: Failed to get ParentId for: $configName, from Website Settings! " . __FILE__ . " Line: " . __LINE__);

            // Exception
            throw new Exception("LUCAT ERROR: Failed to get ParentId for: $configName, from Website Settings!" . "\n");
        }
    }

    /**
     * Get all EHL person-uides from LucatOpen
     * @return array
     * @throws Exception
     */
    protected function getUids(): array
    {
        // Get departmentNumbers
        $organisations = $this->getOrganisations();
        $departmentNumbers = array_map(function($org) { return("'" . $org . "'"); }, $organisations);
        $departmentNumbers = implode(',', $departmentNumbers);

        // Get lucatOpen
        $lucatopen = $this->getLucatOpen();

        $sql = "SELECT "
            . "pa.uid "
            . "FROM luEduOrgUnit AS ou "
            . "INNER JOIN luEduOrgRole AS ro "
            . "ON ou.guid = ro.luEduOrgUnitGUID "
            . "INNER JOIN luEduPersonOrgRole AS por "
            . "ON ro.guid = por.luEduOrgRoleGUID "
            . "INNER JOIN luEduPersonAccount AS pa "
            . "ON por.luEduPersonGUID = pa.luEduPersonGUID "
            . "WHERE pa.employeeType NOT LIKE ('%Student%') "
            . "AND ou.departmentNumber IN ($departmentNumbers)";

        $statement = $lucatopen->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all EHL Organisations
     * @return array
    */
    protected function getOrganisations(): array
    {
        return $this->organisations;
    }

    /**
     * Set all EHL departmentNumber from LucatOpen
     * @throws Exception
     */
    protected function setOrganisations()
    {
        // Get lucat config file
        $lucatConfigFile = $this->getLucatConfigFile();

        // Prepare departmentNumber
        $EHL_departmentNumber = $lucatConfigFile['organisation'];

        // Ignored Organisations (array)
        $ignoredOrganisations = $lucatConfigFile['ignoredOrganisations'];

        if ($EHL_departmentNumber) {
            // Connect to lucatOpen
            $lucatopen = $this->getLucatOpen();

            // Add EHL_departmentNumber to Organisations
            $this->organisations[] = $EHL_departmentNumber;

            // Get all EHL departmentNumber from LucatOpen
            $sql = "SELECT departmentNumber "
                . "FROM luEduOrgUnit "
                . "WHERE ParentDepartmentNumber='" . $EHL_departmentNumber . "'";

            $statement = $lucatopen->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $org) {
                if (!in_array($org['departmentNumber'], $ignoredOrganisations)) {
                    $this->organisations[] = $org['departmentNumber'];
                    $this->pushOrg($org['departmentNumber'], $ignoredOrganisations);
                }
            }
        }
        else {
            // Add log to lucat.log
            Simple::log("lucat", "LUCAT ERROR: Failed to get lucat organisation departmentnumber. Please check lucat_config file " . __FILE__ . " Line: " . __LINE__);
            // Exception
            throw new Exception("LUCAT ERROR: Failed to get lucat organisation departmentnumber. Please check lucat_config file" . "\n");
        }
    }

    /**
     * Recursive function to get EHL departmentNumber from LucatOpen
     * and push to $organisations
     * @param string
     * @throws Exception
     */
    private function pushOrg($org, array $ignoredOrganisations)
    {
        // Connect to lucatOpen
        $lucatopen = $this->getLucatOpen();

        $sql = "SELECT departmentNumber "
            . "FROM luEduOrgUnit "
            . "WHERE ParentDepartmentNumber='" . $org . "'";

        $statement = $lucatopen->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            foreach ($result as $d) {
                if (!in_array($d['departmentNumber'], $ignoredOrganisations)) {
                    $this->organisations[] = $d['departmentNumber'];
                    $this->pushOrg($d['departmentNumber'], $ignoredOrganisations);
                }
            }
        }
    }

    /**
     * Remove old data - organisation(s), person(s), roll(s)
     * @param string
     * @throws Exception
     */
    protected function removeOldData($objName)
    {
        // 3600secs = 1 hour * 60 min * 60 sec
        $last1hours = time() - (3600);

        $lucatObj = null;
        if ($objName == 'organisation') {
            // Get LucatOrganisation
            $lucatObj = new DataObject\LucatOrganisation\Listing();
        }
        elseif ($objName == 'person') {
            // Get LucatPerson
            $lucatObj = new DataObject\LucatPerson\Listing();
        }
        elseif ($objName == 'roll') {
            // Get LucatRoll
            $lucatObj = new DataObject\LucatRoll\Listing();   
        }

        if ($lucatObj) {
            $lucatObj->setCondition("o_modificationDate < ?", $last1hours);

            if ($lucatObj->load()) {
                foreach ($lucatObj as $obj) {
                    // Remove
                    $obj->delete();
                }
            }
        }
    }
}
