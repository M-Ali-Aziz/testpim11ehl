<?php

namespace AppBundle\Controller;

use Pimcore\Tool;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Model\DataObject;

class StaffController extends BaseController
{
    /**
     * @Template
     * @return array|Response
     * @throws \Exception
     */
    public function detailAction(Request $request)
    {
        $website = $this->getWebsiteConfig($this->document, $request->getLocale());
        $departmentNumber = (is_string($website['departmentnumber'])) ? $website['departmentnumber'] : null;
        $uid = (string) $request->get('id');

        if ($departmentNumber == 'v1000017') {
            $departmentNumber = null; // Disable filter on main website
        } elseif ($departmentNumber != null) {
            // An array of $departmentNumber and its children
            $departmentNumbers = $this->getDepertmentNumbers($departmentNumber);
            array_unshift($departmentNumbers, $departmentNumber);
            $departmentNumber = $departmentNumbers;
        }

        // Get person(s)
        $staffList = $this->getStaffListing($departmentNumber, ['uid' => $uid]);

        if(!$staffList || count($staffList) > 1 ) {
            return $this->redirectError($this->document);
        }

        /* @var DataObject\LucatPerson $employee */
        $employee = $staffList[0];

        // Get person(s) with special roles
        $employeeSpecialRole = $this->getSpecialStaffListing($staffList);

        // Get main department name
        $mainDepartment = $this->getMainDepartment($departmentNumber, $uid);

        return [
            'employee' => $employee,
            'employeeSpecialRole' => $employeeSpecialRole,
            'breadcrumbs' => $employee,
            'mainDepartment' => $mainDepartment,
            'editHeadTitle' => true,
            'title' => $employee->getDisplayName(),
        ];
    }

    /**
     * @Template
     * @return array|Response
     * @throws \Exception
     */
    public function listAction(Request $request)
    {
        $domainsException = ['ehl', 'lusem', 'staff'];
        $website = $this->getWebsiteConfig($this->document, $request->getLocale());
        $instIdParam = (string) $request->get('instid');
        $departmentNumberParam = (string) $request->get('id');
        $departmentNumber = (string) $website['departmentnumber'];

        // An array of $departmentNumber and its children
        if ($instIdParam) {
            $departmentArr = $this->getDepertmentNumbers($instIdParam);
            array_unshift($departmentArr, $instIdParam);

            if (in_array($website['subdomain'], $domainsException) &&
                !in_array($departmentNumberParam, $departmentArr)) {
                throw new \Exception('Incorrect department number for this sub site!');
            }
        } else {
            $departmentArr = $this->getDepertmentNumbers($departmentNumber);
            array_unshift($departmentArr, $departmentNumber);

            if (!in_array($website['subdomain'], $domainsException) &&
                !in_array($departmentNumberParam, $departmentArr)) {
                throw new \Exception('Incorrect department number!');
            }
        }

        if ($departmentNumberParam) {
            // Get Organisation
            $organisation = DataObject\LucatOrganisation::getByDepartmentNumber(
                $departmentNumberParam, ['limit' => 1, 'unpublished' => true]
            );

            if ($organisation) {
                // Get person(s)
                $staffList = $this->getStaffListing($departmentNumberParam);

                // Get person(s) with special roles
                if ($staffList) {
                    $specialStaffList = $this->getSpecialStaffListing($staffList, $departmentNumberParam);
                }

                // Get Portal-url
                $portalUrl = DataObject\LucrisOrganisation::getBySourceId(
                    $departmentNumberParam, ['limit' => 1, 'unpublished' => true]
                );
                $portalUrl = ($portalUrl) ? $portalUrl->getPortalUrl() : null;

                // Get department(s)
                $departmentArr = [];
                $departments = new DataObject\LucatOrganisation\Listing();
                $departments->setOrderKey('name');
                $departments->setCondition('ParentDepartmentNumber= ?', $departmentNumberParam);
                $departments->load();
                if ($departments->getObjects()) {
                    foreach ($departments->getObjects() as $department) {
                        $departmentArr[] = $department;
                    }
                }

                // Get GPS-coordinates
                $google = \Pimcore\Config::getSystemConfiguration()['services']['google'];
                $gpsC = $organisation->getGpsC();
            } else {
                $organisation = null;
                return $this->redirectError($this->document);
            }
        }

        return [
            'organisation' => $organisation ?? null,
            'portalUrl' => $portalUrl ?? null,
            'staffList' => $staffList ?? null,
            'specialStaffList' => $specialStaffList ?? null,
            'departments' => $departmentArr ?? null,
            'google' => $google ?? null,
            'gpsC' => $gpsC ?? null,
            'href' => Tool::getHostUrl() . $this->document->getFullPath() . '/',
            'baseUri' => ($website['baseuri'] !== '/') ?: '',
            'baseUriSpecial' => $website['baseuri'] == '/' ? '/' : $website['baseuri'] . '/',
            'title' => $organisation ? $organisation->getName() : null,
            'editHeadTitle' => true,
            'breadcrumbs' => $organisation ?: null,
        ];
    }

    /**
     * @Template
     * @throws \Exception
     */
    public function searchAction(Request $request): array
    {
        $website = $this->getWebsiteConfig($this->document, $request->getLocale());
        $departmentNumber = (is_string($website['departmentnumber'])) ? $website['departmentnumber'] : null;
        $query = filter_var($request->get('q'), FILTER_SANITIZE_STRING);

        if ($departmentNumber == 'v1000017') {
            $departmentNumber = null; // Disable filter on main website
        } elseif ($departmentNumber != null) {
            // An array of $departmentNumber and its children
            $departmentNumbers = $this->getDepertmentNumbers($departmentNumber);
            array_unshift($departmentNumbers, $departmentNumber);
            $departmentNumber = $departmentNumbers;
        }

        $staffList = $query ? $this->getStaffListing($departmentNumber, ['displayName' => $query]) : null;

        return [
            'query' => $query,
            'staffList' => $staffList,
            'breadcrumbs' => true,
        ];
    }

    /**
     * Get Main Department from LucatOrganisation DataObject
     * @param string|array $departmentNumber
     */
    private function getMainDepartment($departmentNumber = null, string $uid): DataObject\LucatOrganisation
    {
        if (is_array($departmentNumber)) {
            $departmentNumber = $departmentNumber[0];
            $org = DataObject\LucatOrganisation::getByDepartmentNumber(
                $departmentNumber, ['limit' => 1, 'unpublished' => true]
            );
        } else {
            $person = DataObject\LucatPerson::getByUid($uid,['limit' => 1, 'unpublished' => true]);
            $personOrg = $person->getOrganisationer()[0];
            $departmentNumber = $personOrg->getDepartmentNumber();
            $parentDepartmentNumber = $personOrg->getParentDepartmentNumber();
            $org = DataObject\LucatOrganisation::getByDepartmentNumber(
                $departmentNumber, ['limit' => 1, 'unpublished' => true]
            );

            if ($parentDepartmentNumber != 'v1000017' && $parentDepartmentNumber != 'v1000000') {
                while ($parentDepartmentNumber != 'v1000017') {
                    $org = DataObject\LucatOrganisation::getByDepartmentNumber(
                        $parentDepartmentNumber, ['limit' => 1, 'unpublished' => true]
                    );

                    $parentDepartmentNumber = $org->getParentDepartmentNumber();
                }
            }
        }

        return $org;
    }

    /**
     * Get Department Numbers from LucatOrganisation
     * Get only the children of passed $departmentNumber
     */
    private function getDepertmentNumbers(string $departmentNumber, array &$dpArr = []): array
    {
        $departments = Dataobject\LucatOrganisation::getByParentDepartmentNumber($departmentNumber);
        foreach ($departments as $department) {
            $dpArr[] = $department->getDepartmentNumber();
            $this->getDepertmentNumbers($department->getDepartmentNumber(), $dpArr);
        }

        return $dpArr;
    }

    /**
     * @param null|array|string $departmentNumber
     */
    private function getStaffListing($departmentNumber = null, array $attr = []): ?array
    {
        $list = new DataObject\LucatPerson\Listing();
        $query = '';

        /* @var DataObject\LucatOrganisation|null $org */
        $org = is_string($departmentNumber)
            ? DataObject\LucatOrganisation::getByDepartmentNumber($departmentNumber, ['limit' => 1,'unpublished' => true])
            : null;

        if($org) {
            $attr['Organisationer'] = $org->getId();
        }

        foreach($attr as $column => $value) {
            if(strlen($value)) {
                if(strlen($query)>0) {
                    $query .= " AND ";
                }
                $query .= "$column LIKE '%$value%'";
            }
        }

        if(strlen($query) == 0) {
            return null;
        }

        // Filtering by roll fields
        $r = new DataObject\LucatRoll;
        $p = new DataObject\LucatPerson;
        $query .= " AND EXISTS (SELECT oo_id FROM object_" . $r->getClassId() .
                  " WHERE object_" . $p->getClassId() . ".Roller LIKE CONCAT('%', object_" . $r->getClassId() . ".oo_id, '%') AND hideFromWeb = 0)";

        if($departmentNumber && !is_array($departmentNumber)) {
            $query = substr($query,0,-1) . " AND departmentNumber = '$departmentNumber')";
        }

        $list->setCondition($query);
        $list->setOrderKey(['surName','givenName'], true);
        $list = $list->load();

        // Filtering by role
        if ($list && $departmentNumber && is_array($departmentNumber)) {
            $staffList = [];
            foreach ($list as $p) {
                $addPerson = false;
                if ($p->getRoller()) {
                    foreach ($p->getRoller() as $r) {
                        if (in_array($r->getDepartmentNumber(), $departmentNumber) && !$r->getHideFromWeb()){
                            $addPerson = true;
                        }
                    }
                }
                if ($addPerson) { $staffList[] = $p; }
            }
            $list = $staffList;
        }

        return ($list) ?: null;
    }

    /**
     * Returns a list of staff members with special roles
     * @param DataObject\LucatPerson[] $staffList
     */
    private function getSpecialStaffListing(array $staffList, ?string $orgId = null): ?array
    {
        // Special roles
        $specialRoles = ['purchasing manager', 'directory administrator', 'registrar', 'parking permit manager',
            'health and safety representative'];
        $roles = [];

        foreach ($staffList as $staff) {
            foreach ($staff->getRoller() as $key => $role) {
                if (in_array($role->getDisplayName('en'), $specialRoles)) {
                    if ($orgId) {
                        if ($role->getDepartmentNumber() == $orgId) {
                            $person = DataObject\LucatPerson::getByUid($role->getUid(),[
                                'limit' => 1, 'unpublished' => true]);

                            $roles[ucfirst($role->getDisplayName())][$key]['uid'] = $role->getUid();
                            $roles[ucfirst($role->getDisplayName())][$key]['name'] = $person->getDisplayName();
                        }
                    } else {
                        $person = DataObject\LucatPerson::getByUid($role->getUid(),[
                            'limit' => 1, 'unpublished' => true]);

                        $roles[ucfirst($role->getDisplayName())][$key]['uid'] = $role->getUid();
                        $roles[ucfirst($role->getDisplayName())][$key]['name'] = $person->getDisplayName();
                    }
                }
            }
        }

        if ($roles) ksort($roles);
        return $roles;
    }
}
