<?php
namespace LucrisBundle\Maintenance;
  
use Pimcore\Maintenance\TaskInterface;
use LucrisBundle\Model;

/**
 * This is the class that contains the MaintenanceJob function for Lucris Sync.
 */
class LucrisMaintenanceTask implements TaskInterface{
     
    public function execute()
    {
        // Connenct to Pimcore DB
        $db = \Pimcore\Db::get();
        $className = 'LucrisPerson';

        // - (1 day; 24 hours; 60 mins; 60 secs)
        $last24hours = time() - (86400);

        // Get last modification date from Pimcore DB
        $query = sprintf("SELECT o_modificationDate FROM objects WHERE o_className LIKE '%%%s%%' LIMIT 0,1", $className);
        $o_modificationDate = $db->fetchAll($query);
        // Get modificationDate
        $modificationDate = (int) $o_modificationDate[0]['o_modificationDate'];

        // If Lucris data not synced since last 24 hours
        if ($modificationDate < $last24hours) {
            // Sync Lucris
            try {
                // Sync Lucris Organisation
                $syncOrganisation = new Model\OrganisationProvider();
                $syncOrganisation->SynchronizeLucrisOrganisation();

                // Sync Lucris Person
                $syncPerson = new Model\PersonProvider();
                $syncPerson->SynchronizeLucrisPerson();

                // Add log to lucris.log
                \Pimcore\Log\Simple::log("lucris", "lucris.INFO: Successfully synced Lucris(onlucrisMaintenance). " . __FILE__ . " Line: " . __LINE__);

            } catch (Exception $e) {
                // Add log to lucris.log
                \Pimcore\Log\Simple::log("lucris", "lucris.ERROR: " . $e->getMessage() . " " . __FILE__ . " Line: " . __LINE__);

                echo $e->getMessage();   
            }
        } else {
            // Add log to lucris.log
            \Pimcore\Log\Simple::log("lucris", "lucris.INFO: Failed to sync Lucris. Lucris was uppdated in last 24h! " . __FILE__ . " Line: " . __LINE__);
        }
    }
}