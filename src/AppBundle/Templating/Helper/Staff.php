<?php

declare(strict_types=1);

/**
 *  TODO: 
 *
 *  - make use of partial 
 *  @see http://stackoverflow.com/a/2390151
 * 
 *  - Check if person is correct class object. 
 *
 * @author Jimmi Elofsson <hi@jimmi.eu>, M. Ali
 *
 */

namespace AppBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use \Pimcore\Model\DataObject;

class Staff extends Helper
{
    private $staff = array();
    private $view;

    /**
    * @inheritDoc
    */
    public function getName()
    {
        return 'staff';
    }

    public function __invoke($view, $staff = array())
    {
        $this->view = $view;
        $this->staff = $staff;

        return $this;
    }

    public function StaffList($attr = array())
    {
        $result = '';
        
        foreach($this->staff as $s) {
            $result .= $this->StaffDetail($s, $attr);
        }

        return $result;
    }

    /**
     *
     * Staff Detail
     *
     * Will setup content and render a detailed view of 
     * a staff member (person) that are passed to this function
     *
     * @param object    $person
     * @param array     $attr 
     */
    public function StaffDetail($person, $attr = array())
    {
        // Check if the person is leave of absence(Tjänstledig)
        $LeaveOfAbsence = $this->getLeaveOfAbsence($person);
        $pdata['LeaveOfAbsence'] = $LeaveOfAbsence;

        // If no rolles ignore person
        if (is_array($this->getRolesByPerson($person, $attr['department'])) &&
        !count($this->getRolesByPerson($person, $attr['department']))) {
            return;
        }

        if( ! isset($attr['heading']) || $attr['heading']) {
            $pdata['heading'] = $person->getDisplayName();
        }

        if($person->getLuMail()) {
            $pdata['mail'] = $person->getLuMail();
        }

        if($attr['moreinfo']) {
            $pdata['moreinfo'] = $this->view->baseUri . strtolower($this->view->translate('contact')) . '/' . $person->getUid();
        }

        if($attr['newlucat'] && $attr['isAreaBrick']) {
            $pdata['staffmoreinfo'] = \Pimcore\Tool::getHostUrl() . '/' .
                strtolower($this->view->translate('contact')) . '/' . $person->getUid();
        } elseif ($attr['newlucat']) {
            $pdata['staffmoreinfo'] = $this->view->baseUri . strtolower($this->view->translate('contact')) . '/' . $person->getUid();
        }

        if( ! isset($attr['room']) || $attr['room']) {
            $pdata['room'] = $this->StaffRoom($person);
        }

        // Get Staff Portal Url - Lucris
        if ($person->getUid() && !$attr['moreinfo']) {
            $pdata['portalUrl'] = $this->StaffPortalUrl($person, $attr);   
        }

        $pdata['website'] = ! isset($attr['website']) || $attr['website'] ? $person->getWebsite() : false;
        $pdata['image'] = $this->StaffImage($person, $attr);
        $pdata['roles'] = $this->StaffRoles($person, $attr, $LeaveOfAbsence);
        $pdata['phone'] = $this->StaffPhone($person);
        $pdata['person'] = $person;
        $pdata['view'] = (! isset($attr['view'])) 
            ? 'Staff/partialPersonContactDetails.html.php' : $attr['view'];

        // View Parameters
        $parameters = array_merge($attr, $pdata);
        unset($parameters['view']);

        // rendering partial
        return $this->view->template($pdata['view'], $parameters);
    }

    public function getLeaveOfAbsence($person)
    {
        $LeaveOfAbsence = false;
        foreach ($person->getRoller() as $roll) {
            if ($roll->getLeaveOfAbsence() == true) {
                $LeaveOfAbsence = true;
            }
        }

        return $LeaveOfAbsence;
    }

    public function StaffPortalUrl($person, $attr){
        try {
            // List LucrisPerson Object
            $lucrisPersonObject = new DataObject\LucrisPerson\Listing();
            $lucrisPersonObject->setLocale($this->view->language);
            $lucrisPersonObject->setCondition("uid LIKE ?", $person->getUid());
            $lucrisPersonObject->load();
            // Get PortalUrl
            foreach ($lucrisPersonObject as $staff) {
                return $staff->getportalUrl();
            } 
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }

    public function StaffPhone($person)
    {
        $mobiles = [];
        $phones = [];
        $phoneNumber = '';

        if( ! $this->getRoles($person)) {
            return NULL;
        }

        foreach($this->getRoles($person) as $r)
        {
            if($r->getMobile() && ! in_array($r->getMobile(), $mobiles)) 
            {
                $mobiles[] = $r->getMobile();
            }

            if($r->getTelephoneNumber() && ! in_array($r->getTelephoneNumber(), $phones)) 
            {
                $phones[] = $r->getTelephoneNumber();
            }
        }

        if(is_array($phones)) 
        {
            foreach($phones as $p)
            {
                $phoneNumber .= $this->view->phoneNumber($p) . ', ';
            }
        }

        if(is_array($mobiles)) 
        {
            foreach($mobiles as $m)
            {
                $phoneNumber .= $this->view->phoneNumber($m) . ', ';
            }
        }

        return ($phoneNumber) ? substr($phoneNumber, 0, -2) : NULL;
    }

    public function StaffRoom($person)
    {
        $room = NULL;

        if(is_array($this->getRolesByPerson($person)))
        {

            foreach($this->getRolesByPerson($person) as $r)
            {
                if($r->primary)
                {
                    $room = $r->room;
                }
            }
        }

        return $room;   
    }

    public function StaffRoles($person, $attr, $LeaveOfAbsence)
    {
        if(is_array($this->getRolesByPerson($person, $attr['department']))) {
            $roles = '';
            $rolesNameOrg = [];

            if( ! isset($attr['roleinfo']) || $attr['roleinfo']) {
                foreach ($this->getRolesByPerson($person) as $role) {
                    if ($role) {
                        $rolesNameOrg[$role->departmentNumber]['roleName'][] = $role->roleName;
                        $rolesNameOrg[$role->departmentNumber]['orgName'] = $role->orgName;
                        $rolesNameOrg[$role->departmentNumber]['departmentNumber'] = $role->departmentNumber;
                        $rolesNameOrg[$role->departmentNumber]['parentOrgName'] = $role->parentOrgName;
                    }
                }

                foreach($rolesNameOrg as $r) {
                    if ($LeaveOfAbsence) {
                        $roles .= implode(', ', $r['roleName']) . ' ' . '(' . strtolower($this->view->translate('LeaveOfAbsence')) . '), ' .$r['parentOrgName']. '<br>';
                    }
                    else{
                        $roles .= implode(', ', $r['roleName']) . ', ' . $r['orgName'] .'<br>';
                    }
                }
            }
            else {
                $rolesArr = [];
                foreach($this->getRolesByPerson($person, $attr['department']) as $r) {
                    if ($r->roleName && !in_array($r->roleName, $rolesArr)) {
                        $rolesArr[] = $r->roleName;
                        $roles .= mb_strtolower($r->roleName) . ', ';
                    }
                }
                
                $roles = ucfirst($roles);
                $roles = substr($roles,0,-2);
                if ($LeaveOfAbsence) {
                    $roles .=  ' ' . '(' . strtolower($this->view->translate('LeaveOfAbsence')) . ')';
                }
            }

            return $roles;
        }

        return NULL;
    }

    public function StaffImage ($person, $attr)
    {
        $img = file_exists(PIMCORE_WEB_ROOT . "/var/assets/images/staff/" . $person->getUid() . '.jpg');

        return ($img && !isset($attr['image']) || $attr['image']) ? true : false;
    }

    private function getRolesByPerson($person, $departmentnumber=false)
    {
        if(!is_object($person)) {
            return NULL;
        }

        $roles = array();
        $organisations = $person->getOrganisationer();

        if(!$departmentnumber) {
            // getting departmentnumber from all 
            // organisations connected with the person
            $departmentnumber = array_map(function($org) {

                return $org->getDepartmentNumber();
            }, $person->getOrganisationer());
        }
        else if(!is_array($departmentnumber)) {
            $departmentnumber = array($departmentnumber);
        }

        // filter roles by departmentnumbers
        $roles = array_filter($this->getRoles($person), function($r) use ($departmentnumber) {
            return (in_array($r->getDepartmentNumber(), $departmentnumber));
        });

        $roles = array_map(function($r) use ($organisations) {

            foreach($organisations as $o)  {
                if($o->getDepartmentNumber() == $r->getDepartmentNumber()) {
                    // Get organisation name with full ParentName path
                    $orgName = $this->getOrgName($o);
                    
                    // Get organisation Parent Name
                    $parentOrgName = DataObject\LucatOrganisation::getByDepartmentNumber($o->getParentDepartmentNumber(), ['limit' =>1, 'unpublished' => true]);
                    $parentOrgName = ($parentOrgName) ? $parentOrgName->getName() : null;

                    return (object) array(
                        'roleName' => ucfirst($r->getDisplayName($this->view->language)),
                        'parentOrgName' => $parentOrgName,
                        'orgName' => $orgName,
                        'orgBaseUri' => $this->baseUri,
                        'departmentNumber' => $r->getDepartmentNumber($this->view->language),
                        'primary' => $r->getPrimaryContactInfo(),
                        'room' => $r->getRoom()
                    );
                }
            }

            return NULL; 
        }, $roles);

        return $roles;
    }

    private function getRoles($person, $include_custom_roles = FALSE)
    {
        if(!is_object($person)) {
            return NULL;
        }

        $rolesArr = $person->getRoller();
        
        if($include_custom_roles) {
            return $rolesArr;
        }

        return array_filter($rolesArr, function($r) {
            // Temorarily ignore roles
            $ignoreRoles = ['purchasing manager', 'directory administrator', 'registrar', 'parking permit manager', 'health and safety representative'];

            return (
                $r->getRoleType()!='custom' &&
                $r->getHideFromWeb()!=TRUE &&
                $r->getLeaveOfAbsence != TRUE &&
                !in_array($r->getDisplayName('en'), $ignoreRoles)
            );
        });
    }

    private function getOrgName($organisation)
    {   
        $departmentNumber = $organisation->getDepartmentNumber();
        $uri = preg_replace('/(kontakt|contact)(.*)/i', '$1', $_SERVER['REQUEST_URI']) .
            '/' . $this->baseUri . $departmentNumber;
        $orgName = [];

        if ($organisation->getParentDepartmentNumber() != 'v1000017' ||
            $organisation->getParentDepartmentNumber() != 'v1000000') {
            $orgName[] = $organisation->getName($this->view->language);

            $orgParent = $organisation->getParentDepartmentNumber();
            while ($orgParent != 'v1000017') {
                $parent = DataObject\LucatOrganisation::getByDepartmentNumber(
                    $orgParent, ['limit' => 1,'unpublished' => true]
                );
                if ($parent) {
                    $departmentNumber = $parent->getDepartmentNumber();
                    
                    $parentName = $parent->getName($this->view->language);
                    
                    $orgName[] = $parentName;
                    
                    $orgParent = $parent->getParentDepartmentNumber();
                }
                else {
                    $orgParent = 'v1000017';
                }
            }

            $orgName = str_replace( $orgName[0], "<a href='$uri'>$orgName[0]</a>", $orgName);
            $orgName = implode(', ', $orgName);
        }
        else {
            $orgName = $organisation->getName($this->view->language);
            $orgName = "<a href='$uri'>$orgName</a>";
        }

        return $orgName;
    }
}