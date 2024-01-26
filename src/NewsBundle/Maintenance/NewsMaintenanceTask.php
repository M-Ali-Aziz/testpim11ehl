<?php
namespace NewsBundle\Maintenance;
  
use Pimcore\Maintenance\TaskInterface;
use Pimcore\Model\DataObject;

/**
 * This is the class that contain the MaintenanceJob function for NewsBundle.
 */
class NewsMaintenanceTask implements TaskInterface{
     
    public function execute()
    {
        $time = time() - (1 * 24 * 60 * 60);

        $list = new DataObject\News\Listing();
        $list->setUnpublished(true);
        $list->setCondition(sprintf(
            "o_key LIKE '%s' AND o_modificationDate < %s", 'untitled%', $time));

        $list->load();
        foreach($list as $untitled) {
            // Remove untitled news older than one day
            $untitled->delete();
        }
    }
}