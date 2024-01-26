<?php

namespace App\Document\Areabrick;

use Pimcore\Config;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;

class AddressInfo extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Adressuppgifter';
    }

    public function getIcon(): ?string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/marker.svg';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(500);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'label' => 'Institution',
                'type' => 'select',
                'name' => 'department',
                'config' => [
                    'width' => 300,
                    'store' => $this->getDepartments()
                ],
            ],
        ]);

        return $config;
    }

    /**
     * Get Departments
     * @throws \Exception
     */
    public function getDepartments(): array
    {
        $departments = DataObject\LucatOrganisation::getList([
            "orderKey" => "departmentNumber",
            "order" => "asc"
        ]);

        $depArr = [['v1000017', 'Ekonomihögskolan']];
        foreach ($departments as $dep) {
            if ($dep->getOrgType() === 'Institution' ||
                $dep->getOrgType() === 'Bibliotek' ||
                $dep->getOrgType() === 'Fakultetskansli'
            ){
                $depArr[] = [$dep->getDepartmentNumber(), $dep->getName()];
            }
        }

        return $depArr;
    }

    // Other methods defined above!!!
    /**
     * @throws \Exception
     */
    public function action(Info $info)
    {
        parent::action($info);

        // Get DepartmentNumber
        $departmentNumber = $this->getDocumentEditable($info->getDocument(), 'select', 'department')->getValue();

        if ($departmentNumber) {
            // Get Organisation
            $organisation = DataObject\LucatOrganisation::getByDepartmentNumber(
                $departmentNumber, ['limit' => 1, 'unpublished' => true]
            );

            // Get Portal-url
            $portalUrl = DataObject\LucrisOrganisation::getBySourceId(
                $departmentNumber, ['limit' => 1, 'unpublished' => true]
            );
            $portalUrl = ($portalUrl) ? $portalUrl->getPortalUrl() : null;

            if ($organisation) {
                // Get GPS-coordinates
                $google = Config::getSystemConfiguration()['services']['google'];
            }
        }

        // Set Params to view
        $info->setParam('organisation', ($organisation) ?? null);
        $info->setParam('portalUrl', ($portalUrl) ?? null);
        $info->setParam('google', ($google) ?? null);
    }
}
