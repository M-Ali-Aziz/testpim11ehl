<?php
namespace LucrisBundle\Model;

use LucrisBundle\Model\JSONParser;
use \Pimcore\Tool\Frontend;
use \Pimcore\Model\DataObject;

/**
 * Lucris AbstractProvider
 *
 * This is the class that all other Lucris Model classes extends.
 * This provides methods, functions and properties needed for other models
 * to sync Lucris Data for EHL.
 *
 * @copyright  Copyright (c) 2019 Ekonomihögskolan (http://ehl.lu.se)
 * @author Mohammed Ali
 */
class AbstractProvider
{
    /**
     * Lucris Config Path
     * @var string
     */
    protected $lucrisConfigPath = PIMCORE_PRIVATE_VAR . '/bundles/LucrisBundle/lucris_config.php';

    /**
     * Lucris configs
     * @var array
     */
    protected $lucrisConfig = [];
    
    /**
     * Constractor - get lucris config file
     */
    public function __construct()
    {
        $lucrisConfigPath = $this->lucrisConfigPath;
        if(file_exists($lucrisConfigPath)) {
            $this->lucrisConfig = require $lucrisConfigPath;
        }
        else {
            // Add log to lucris.log
            \Pimcore\Log\Simple::log("lucris", "LUCRIS ERROR: Failed to get lucris config file " . __FILE__ . " Line: " . __LINE__);
            // print massage
            print ("LUCRIS ERROR: Failed to get lucris config file" . "\n");
            // Exception
            throw new \Exception("LUCRIS ERROR: Failed to get lucris config file" . "\n");
        }
    }

    /**
     * Get lucris config file
     * @return array
     */
    protected function getLucrisConfig()
    {
        return $this->lucrisConfig;
    }


    /**
     * Get ParentId from Pimcore Website Settings
     * @param string
     * @return string
    */
    protected function getParentId($configName)
    {
        $parentId = Frontend::getWebsiteConfig()->$configName;

        if ($parentId) {
            return $parentId;
        }
        else {
            // Add log to lucris.log
            \Pimcore\Log\Simple::log("lucris", "LUCRIS ERROR: Failed to get ParentId for: $configName, from Website Settings! " . __FILE__ . " Line: " . __LINE__);
            // print massage
            print ("LUCRIS ERROR: Failed to get ParentId for: $configName, from Website Settings!" . "\n");
            // Exception
            throw new \Exception("LUCRIS ERROR: Failed to get ParentId for: $configName, from Website Settings!" . "\n");
        }
    }

    /**
     * Remove old data - organisation(s), person(s)
     * @param string
     */
    protected function removeOldData($objName)
    {
        // 3600secs = 1 hours * 60 mins * 60 secs
        $last1hours = time() - (3600);

        if ($objName == 'organisation') {
            // Get LucrisOrganisation
            $lucrisObj = new DataObject\LucrisOrganisation\Listing();
        }
        else {
            // Get LucrisPerson
            $lucrisObj = new DataObject\LucrisPerson\Listing();  
        }

        $lucrisObj->setCondition("o_modificationDate < ?", $last1hours);
        $lucrisObj->load();

        if ($lucrisObj) {
            foreach ($lucrisObj as $obj) {
                // Remove
                $obj->delete();
            }
        }
    }
}