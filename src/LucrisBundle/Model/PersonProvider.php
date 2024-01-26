<?php
namespace LucrisBundle\Model;

use LucrisBundle\Model\JSONParser;
use Pimcore\Model\DataObject;
use Pimcore\Model\Asset;
use Pimcore\Db;

/**
* This class gets all Person/Researchers at EHL/LUSEM from Lucris/Pure
* and creating a Pimcore DataObject of Person/Researchers in LucrisPerson DataObject.
*
* @link https://lucris.lub.lu.se/ws/api/513 - Pure api webservice.
* @link https://pimcore.com/docs/latest/Objects/index.html - Pimcore Objects Docs.
* @copyright  Copyright (c) 2019 Ekonomihögskolan (http://ehl.lu.se).
* @author Mohammed Ali
*/
class PersonProvider extends AbstractProvider
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
     * Synchronize Lucris Person from Pure Rest api to Pimcore DataObject
     */
    public function SynchronizeLucrisPerson()
    {
        // Get lucris configurations
        $lc = $this->getLucrisConfig();

        // Get LucrisOrganisations DataObject
        $organisations = new DataObject\LucrisOrganisation\Listing();
        foreach ($organisations as $org) {
            // Set offset to default
            $this->offset = 0;

            // URL - Lucris/Pure REST api - Lists persons on an organizational unit (EHL)
            $url = $lc['base_url'] . '/' . $org->getUuid() . '/persons'.
                '?size='.$this->size .'&offset='.$this->offset. '&apiKey='.$lc['api_key'];

            // JSONParser
            $parser = new JSONParser($url);
            if ($parser->validResult()) {
                while ($parser->getCount() > $this->offset) {
                    // URL - Lucris/Pure REST api - Lists persons on an organizational unit (EHL)
                    $url = $lc['base_url'] . '/' . $org->getUuid() . '/persons'.
                        '?size='.$this->size .'&offset='.$this->offset. '&apiKey='.$lc['api_key'];
                    try {
                        $parser2 = new JSONParser($url);
                        $parser2->mapPersonData();
                        // Get persons
                        $persons = $parser2->getPersonItems();
                        // Run createLucrisPersonObject()
                        $this->createLucrisPersonObject($persons);
                        // Set offset
                        $this->offset += $this->size;
                    } catch (\Exception $e) {
                        // Add log to lucris.log
                        \Pimcore\Log\Simple::log("lucris", "LUCRIS ERROR: Failed to get Persons! " . __FILE__ . " Line: " . __LINE__);
                        // Return error message
                        print "LUCRIS ERROR: " . $e->getMessage() . "\n";
                    }
                }
            }
            else {
                // Add log to lucris.log
                \Pimcore\Log\Simple::log("lucris", "LUCRIS WARNING: No person found! " . __FILE__ . " Line: " . __LINE__);
            }
        }
    }

    /**
     * Create a Pimcore DataObject of Person/Researchers (LucrisPerson DataObject).
     * @param array $persons - all Persons/Researchers that needs to be created,updated,deleted and saved
     */
    protected function createLucrisPersonObject($persons)
    {
        if ($persons) {
            // Get LucrisPerson Folder ID
            $parentId = $this->getParentId('lucrisPersonParentId');
            $published = 1;

            // Get the valid languages
            $config = \Pimcore\Config::getSystemConfiguration();
            $languages = explode(',', $config['general']['valid_languages']);

            // Connect to Pimcore DB
            $db = Db::get();

            foreach ($persons as $person) {
                // Get person photo from Asset
                $photo = NULL;
                if (file_exists(PIMCORE_PROJECT_ROOT . "/web/var/assets" . "/images/staff/" . $person['uid'] . ".jpg")) {
                    $photo = Asset\Image::getByPath("/images/staff/" . $person['uid'] . ".jpg");
                }

                // Organisation
                $organisation = [];
                foreach ($person['org']['sourceId'] as $sourceId) {
                    $path = "/Lucris/lucrisOrganisation/" . $sourceId;
                    $organisation[] = DataObject::getByPath($path);
                }

                // UKÄ(area)
                $UKA_sv = NULL;
                $UKA_en = NULL;
                if ($person['uka']['sv']) { $UKA_sv = implode(',', $person['uka']['sv']); }
                if ($person['uka']['en']) { $UKA_en = implode(',', $person['uka']['en']); }

                // Keyword (freetext)
                $keyword_sv = NULL;
                $keyword_en = NULL;
                if ($person['keyword']['sv']) { $keyword_sv = implode(',', $person['keyword']['sv']); }
                if ($person['keyword']['en']) { $keyword_en = implode(',', $person['keyword']['en']); }

                // Check if the person alredy exists 
                $query1 = sprintf('SELECT o_id FROM objects WHERE o_parentId=%s AND o_key="%s" LIMIT 0,1', $parentId, $person['uid']);
                $oIdExisting = $db->fetchAll($query1);
                // Get o_id
                $o_id = (int) $oIdExisting[0]['o_id'];

                if ($o_id) {
                    // Update person data
                    $lucrisPersonObject = DataObject\LucrisPerson::getById($o_id);

                    $values = [
                        'uuid' => $person['uuid'],
                        'uid' => $person['uid'],
                        'name' => $person['name'],
                        'firstName' => $person['firstName'],
                        'lastName' => $person['lastName'],
                        'photo' => $photo,
                        'organisation' => $organisation,
                        'visibility' => $person['visibility'],
                        'modified' => $person['modified']
                    ];
                    
                    $lucrisPersonObject->setValues($values);
                    $lucrisPersonObject->setUka($UKA_sv, $languages[0]);
                    $lucrisPersonObject->setUka($UKA_en, $languages[1]);
                    $lucrisPersonObject->setKeyword($keyword_sv, $languages[0]);
                    $lucrisPersonObject->setKeyword($keyword_en, $languages[1]);
                    $lucrisPersonObject->setPortalUrl($person['portalUrl']['sv'], $languages[0]);
                    $lucrisPersonObject->setPortalUrl($person['portalUrl']['en'], $languages[1]);

                    // Disable versioning for the current process
                    \Pimcore\Model\Version::disable();

                    $lucrisPersonObject->save();
                }
                else{
                    // Create new person and save it to LucrisPerson Object
                    $lucrisPersonObject = new DataObject\LucrisPerson();

                    $values = [
                        'o_parentId' => $parentId,
                        'o_key' => $person['uid'],
                        'o_published' => $published,
                        'uuid' => $person['uuid'],
                        'uid' => $person['uid'],
                        'name' => $person['name'],
                        'firstName' => $person['firstName'],
                        'lastName' => $person['lastName'],
                        'photo' => $photo,
                        'organisation' => $organisation,
                        'visibility' => $person['visibility'],
                        'modified' => $person['modified']
                    ];
                    $lucrisPersonObject->setValues($values);
                    $lucrisPersonObject->setUka($UKA_sv, $languages[0]);
                    $lucrisPersonObject->setUka($UKA_en, $languages[1]);
                    $lucrisPersonObject->setKeyword($keyword_sv, $languages[0]);
                    $lucrisPersonObject->setKeyword($keyword_en, $languages[1]);
                    $lucrisPersonObject->setPortalUrl($person['portalUrl']['sv'], $languages[0]);
                    $lucrisPersonObject->setPortalUrl($person['portalUrl']['en'], $languages[1]);

                    // Disable versioning for the current process
                    \Pimcore\Model\Version::disable();

                    $lucrisPersonObject->save();
                }
            }
        }

        // Delete old Person(s)
        $this->removeOldData('person');
    }
}