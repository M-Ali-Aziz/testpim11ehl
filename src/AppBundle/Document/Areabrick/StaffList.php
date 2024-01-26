<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;
use Pimcore\Tool;
use Pimcore\Translation\Translator;

class StaffList extends AbstractAreabrick implements EditableDialogBoxInterface
{
    protected Translator $translator;

    public ?string $departmentNumber = null;
    public ?array $allStaffList = null;
    public ?array $staffList = null;
    public array $specialRoles = [
        'purchasing manager', 'directory administrator', 'registrar',
        'parking permit manager', 'health and safety representative',
    ];

    public function getName(): string
    {
        return 'Lista medarbetare';
    }

    public function getIcon(): ?string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/targetgroup.svg';
    }

    /**
     * @throws \Exception
     */
    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $this->action($info);

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
                    'store' => $this->getDepartments(),
                ]
            ],
            [
                'label' => 'Roller',
                'type' => 'select',
                'name' => 'roles',
                'config' => [
                    'width' => 300,
                    'store' => $this->getRoles(),
                ]
            ],
            [
                'label' => 'Visa avdelningar',
                'type' => 'checkbox',
                'name' => 'sections',
            ],
            [
                'label' => 'Visa övriga roller',
                'type' => 'checkbox',
                'name' => 'specialRole',
            ],
        ]);

        return $config;
    }

    /**
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
            if ($dep->getOrgType() === 'Institution') {
                $depArr[] = [$dep->getDepartmentNumber(), $dep->getName()];
            }
        }

        return $depArr;
    }

    public function setDepartmentNumber(string $departmentNumber): void
    {
        $this->departmentNumber = $departmentNumber;
    }

    public function getDepartmentNumber(): ?string
    {
        return $this->departmentNumber;
    }

    public function setStaffList(?array $staffList = null, ?array $roles = null): void
    {
        if ($staffList) {
            $this->staffList = $staffList;
        } else {
            $departmentNumber = $this->getDepartmentNumber();
            if ($departmentNumber) {
                $attr = [];
                $staffs = new DataObject\LucatPerson\Listing();
                $query = '';

                $org = DataObject\LucatOrganisation::getByDepartmentNumber(
                    $departmentNumber, ['limit' => 1, 'unpublished' => true]);

                if (is_object($org)) {
                    $attr['Organisationer'] = $org->getId();
                }

                foreach ($attr as $column => $value) {
                    if (strlen($value)) {
                        if (strlen($query) > 0) {
                            $query .= " AND ";
                        }
                        $query .= "$column LIKE '%$value%'";
                    }
                }

                if (strlen($query) == 0) {
                    return;
                }

                // Filtering by roll fields
                $r = new DataObject\LucatRoll;
                $p = new DataObject\LucatPerson;
                $query .= " AND EXISTS (SELECT oo_id FROM object_" . $r->getClassId() .
                    " WHERE object_" . $p->getClassId() . ".Roller LIKE CONCAT('%', object_" .
                    $r->getClassId() . ".oo_id, '%') AND hideFromWeb = 0 AND departmentNumber = '$departmentNumber')";

                $staffs->setCondition($query);
                $staffs->setOrderKey(['surName', 'givenName'], true);
                $staffs->setOrder('asc');

                $staffList = ($staffs->load()) ? $staffs->getObjects() : null;

                if ($staffList && $roles) {
                    foreach ($staffList as $staff) {
                        foreach ($staff->getRoller() as $role) {
                            if (in_array($role->getDisplayName(), $roles) && $role->getDepartmentNumber() == $departmentNumber) {
                                $staffListFilter[] = $staff;
                            }
                        }
                    }

                    $staffList = $staffListFilter ? array_values(array_unique($staffListFilter, SORT_REGULAR)) : null;
                }

                $this->staffList = $staffList;
            } else {
                $this->staffList = null;
            }
        }
    }

    public function getStaffList(): ?array
    {
        return $this->staffList;
    }

    /**
     * @throws \Exception
     */
    public function getSectionList(): array
    {
        $departmentNumber = $this->getDepartmentNumber();
        $sectionList = [];
        $sections = DataObject\LucatOrganisation::getList([
            "orderKey" => "name",
            "order" => "asc"
        ]);
        $sections->setCondition('ParentDepartmentNumber= ?', $departmentNumber);
        $sections->load();
        if ($sections->getObjects()) {
            foreach ($sections->getObjects() as $section) {
                $sectionList[] = $section;
            }
        }

        return $sectionList;
    }

    /**
     * @throws \Exception
     */
    public function getRoles(): array
    {
        $rolesArray = [['all', 'Alla']];
        $staffList = $this->getStaffList();
        if ($staffList) {
            $rolesArray = [];
            // Array of DepartmentNumber and all sections
            $depNrArr = [$this->getDepartmentNumber()];
            foreach ($this->getSectionList() as $section) {
                $depNrArr[] = $section->getDepartmentNumber();
            }

            foreach ($staffList as $staff) {
                $staffFilterRolesArray = $this->filterRoles($staff->getRoller(), $depNrArr);
                if ($staffFilterRolesArray) {
                    foreach ($staffFilterRolesArray as $role) {
                        $rolesArray[] = [$role->getDisplayName(), $role->getDisplayName()];
                    }
                }
            }

            $rolesArray = array_values(array_unique($rolesArray, SORT_REGULAR));
            array_multisort($rolesArray, SORT_ASC);

            array_unshift($rolesArray, ['all', 'Alla']);

            return $rolesArray;
        }

        return $rolesArray;
    }

    public function filterRoles(array $staffRoles, array $depNrArr): ?array
    {
        return array_filter($staffRoles, function ($r) use ($depNrArr) {
            // Temporarily ignore roles
            $ignoreRoles = $this->specialRoles;

            return (
                $r->getRoleType() != 'custom' &&
                $r->getHideFromWeb() != TRUE &&
                $r->getLeaveOfAbsence() != TRUE &&
                in_array($r->getDepartmentNumber(), $depNrArr) &&
                !in_array($r->getDisplayName('en'), $ignoreRoles)
            );
        });
    }

    public function getSpecialRoleStaffList(): ?array
    {
        $specialRoles = $this->specialRoles;
        $departmentNumber = $this->getDepartmentNumber();
        $staffList = $this->allStaffList;
        $roles = [];

        foreach ($staffList as $staff) {
            foreach ($staff->getRoller() as $key => $role) {
                if (in_array($role->getDisplayName('en'), $specialRoles)) {
                    if ($departmentNumber) {
                        if ($role->getDepartmentNumber() == $departmentNumber) {
                            $person = DataObject\LucatPerson::getByUid($role->getUid(), [
                                'limit' => 1, 'unpublished' => true]);

                            $roles[ucfirst($role->getDisplayName())][$key]['uid'] = $role->getUid();
                            $roles[ucfirst($role->getDisplayName())][$key]['name'] = $person->getDisplayName();
                        }
                    } else {
                        $person = DataObject\LucatPerson::getByUid($role->getUid(), [
                            'limit' => 1, 'unpublished' => true]);

                        $roles[ucfirst($role->getDisplayName())][$key]['uid'] = $role->getUid();
                        $roles[ucfirst($role->getDisplayName())][$key]['name'] = $person->getDisplayName();
                    }
                }
            }
        }

        if ($roles) ksort($roles);
        return ($roles) ?? null;
    }

    // Other methods defined above!!!
    /**
     * @throws \Exception
     */
    public function action(Info $info)
    {
        parent::action($info);

        $departmentNumber = $this->getDocumentEditable($info->getDocument(), 'select', 'department')->getValue();
        $roles = $this->getDocumentEditable($info->getDocument(), 'multiselect', 'roles')->getValue();
        $sections = $this->getDocumentEditable($info->getDocument(), 'checkbox', 'sections')->getValue();
        $specialRole = $this->getDocumentEditable($info->getDocument(), 'checkbox', 'specialRole')->getValue();
        $href = Tool::getHostUrl() . $info->getDocument()->getFullPath() . '/';

        if ($departmentNumber) {
            // Set data to the object
            $this->setDepartmentNumber($departmentNumber);
            $this->setStaffList();
            $this->allStaffList = $this->getStaffList();

            if ($roles && !in_array('all', $roles)) {
                // Set new StaffList filtered by roles
                $this->setStaffList(null, $roles);
            }

            if ($sections) {
                // Get Section List
                $sectionList = $this->getSectionList();
            }

            if ($specialRole) {
                // Get Staff with special Role
                $specialRoleStaffList = $this->getSpecialRoleStaffList();
            }
        }

        // Set Params to view
        $info->setParam('departmentNumber', $this->getDepartmentNumber() ?? null);
        $info->setParam('staffList', $this->getStaffList() ?? null);
        $info->setParam('departments', $sectionList ?? null);
        $info->setParam('specialStaffList', $specialRoleStaffList ?? null);
        $info->setParam('href', $href);
    }
}
