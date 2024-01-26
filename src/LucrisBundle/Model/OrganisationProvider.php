<?php
namespace LucrisBundle\Model;

use LucrisBundle\Model\JSONParser;
use Pimcore\Model\DataObject;
use Pimcore\Db;

/**
 * This class Synchronize Lucris Organisations with JSONParser/Pure
 * and creating a Pimcore DataObject in LucrisOrganiation Object.
 *
 * @link https://lucris.lub.lu.se/ws/api/513 - Pure api webserver
 * @copyright  Copyright (c) 2019 Ekonomihögskolan (http://ehl.lu.se).
 * @author Mohammed Ali
 */
class OrganisationProvider extends AbstractProvider
{   
    /**
     * The number of results per page.
     * @var integer
    */    
    private $size = 50;

    /**
     * The offset into the total result set where items should be returned from.
     * Default = 0
     * @var integer
     */
    private $offset = 0;

    /**
     * Synchronize Lucris Organisation from Pure Rest api to Pimcore DataObject
     */
    public function SynchronizeLucrisOrganisation()
    {
        // Get lucris configurations
        $lc = $this->getLucrisConfig();

        // URL - Lucris/Pure REST api - Get EHL unit and all underlying organisations
        $url = $lc['base_url'] . '/' . $lc['organisation']['uuid'] . '/hierarchy'.
            '?size='.$this->size . '&offset='.$this->offset . '&apiKey='.$lc['api_key'];

        // JSONParser
        $parser = new JSONParser($url);
        if ($parser->validResult()) {
            while ($parser->getCount() > $this->offset) {
                // URL - Lucris/Pure REST api - Get EHL unit and all underlying organisations
                $url = $lc['base_url'] . '/' . $lc['organisation']['uuid'] . '/hierarchy'.
                    '?size='.$this->size . '&offset='.$this->offset . '&apiKey='.$lc['api_key'];

                try {
                    $parser2 = new JSONParser($url);
                    // Map organisations
                    $parser2->mapOrganisationData();
                    // Get organisations
                    $organisations = $parser2->getOrganisationItems();
                    // Run createLucrisOrganisationObject()
                    $this->createLucrisOrganisationObject($organisations);
                    // Set offset
                    $this->offset += $this->size;
                } catch (\Exception $e) {
                    // Add log to lucris.log
                    \Pimcore\Log\Simple::log("lucris", "LUCRIS ERROR: Failed to get Organisations! " . __FILE__ . " Line: " . __LINE__);
                    // Return error message
                    print "LUCRIS ERROR: " . $e->getMessage() . "\n";
                }
            }
        }
        else {
            // Add log to lucris.log
            \Pimcore\Log\Simple::log("lucris", "LUCRIS ERROR: Failed to fetch url! " . __FILE__ . " Line: " . __LINE__);
            // Exception
            throw new \Exception("LUCRIS ERROR: Failed to fetch url!" . "\n");
        }
    }

    /**
     * Create a Pimcore DataObject of Lucris Organisations (LucrisOrganisation DataObject).
     * @param array - all Organisations that needs to be created,updated,deleted and saved
     */
    protected function createLucrisOrganisationObject($organisations){
        if ($organisations) {
            // Get LucrisOrganisation Folder ID
            $parentId = $this->getParentId('lucrisOrgParentId');
            $published = 1;

            // Get the valid languages
            $config = \Pimcore\Config::getSystemConfiguration();
            $languages = explode(',', $config['general']['valid_languages']);

            // Connenct to Pimcore DB
            $db = Db::get();

            foreach ($organisations as $org) {
                // PortalURL
                $portalUrl_sv = $org['portalUrl']['sv'];
                $portalUrl_en = $org['portalUrl']['en'];

                // Check if the organisation allredy exists 
                $query = sprintf('SELECT o_id FROM objects WHERE o_parentId=%s AND o_key="%s" LIMIT 0,1', $parentId, $org['sourceId']);
                $oIdExisting = $db->fetchAll($query);
                // Get o_id
                $o_id = (int) $oIdExisting[0]['o_id'];

                if ($o_id) {
                    // Update organisation data
                    $lucrisOrganisationObject = DataObject\LucrisOrganisation::getById($o_id);

                    $values = [
                        'uuid' => $org['uuid'],
                        'sourceId' => $org['sourceId']
                    ];
                    $lucrisOrganisationObject->setValues($values);
                    $lucrisOrganisationObject->setName($org['name']['sv'], $languages[0]);
                    $lucrisOrganisationObject->setName($org['name']['en'], $languages[1]);
                    $lucrisOrganisationObject->setPortalUrl($portalUrl_sv, $languages[0]);
                    $lucrisOrganisationObject->setPortalUrl($portalUrl_en, $languages[1]);

                    // Disable versioning for the current process
                    \Pimcore\Model\Version::disable();

                    $lucrisOrganisationObject->save();
                }
                else {
                    // Create new organisation and save it to LucrisOrganisation Object
                    $lucrisOrganisationObject = new DataObject\LucrisOrganisation();

                    $values = [
                        'o_parentId' => $parentId,
                        'o_key' => $org['sourceId'],
                        'o_published' => $published,
                        'uuid' => $org['uuid'],
                        'sourceId' => $org['sourceId']
                    ];
                    $lucrisOrganisationObject->setValues($values);
                    $lucrisOrganisationObject->setName($org['name']['sv'], $languages[0]);
                    $lucrisOrganisationObject->setName($org['name']['en'], $languages[1]);
                    $lucrisOrganisationObject->setPortalUrl($portalUrl_sv, $languages[0]);
                    $lucrisOrganisationObject->setPortalUrl($portalUrl_en, $languages[1]);

                    // Disable versioning for the current process
                    \Pimcore\Model\Version::disable();

                    $lucrisOrganisationObject->save();
                }
            }
        }

        // Delete old organisation(s)
        $this->removeOldData('organisation');
    } 
}