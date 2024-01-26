<?php

namespace AppBundle\Service;

use Pimcore\Model\DataObject;
use Pimcore\Tool;
use Pimcore\Translation\Translator;
use Twig\Environment;

class StaffService
{
    protected Translator $translator;
    protected Environment $twig;
    protected string $language;
    protected string $baseUri;

    public function __construct(Translator $translator, Environment $twig)
    {
        $this->translator = $translator;
        $this->twig = $twig;
    }

    /**
     * @param DataObject\LucatPerson[] $staff
     */
    public function StaffList(array $staff, array $attr): string
    {
        $result = '';
        foreach ($staff as $s) {
            $result .= $this->StaffDetail($s, $attr);
        }

        return $result;
    }

    /**
     * Staff Detail
     * Will setup content and render a detailed view of
     * a staff member (person) that are passed to this function
     */
    public function StaffDetail(?DataObject\LucatPerson $person, array $attr): string
    {
        if (!$person) { return ''; }

        $this->language = $attr['language'];
        $this->baseUri = $attr['baseuri'];

        // Check if the person is leave of absence(Tjänstledig)
        $LeaveOfAbsence = $this->getLeaveOfAbsence($person);
        $pData['LeaveOfAbsence'] = $LeaveOfAbsence;

        // If no rolles ignore person
        $roles = $this->getRolesByPerson($person, $attr['department']);
        if (!$roles) { return ''; }

        if (!isset($attr['heading']) || $attr['heading']) {
            $pData['heading'] = $person->getDisplayName();
        }

        if ($person->getLuMail()) {
            $pData['mail'] = $person->getLuMail();
        }

        if ($attr['moreinfo']) {
            $pData['moreinfo'] =
                $this->baseUri . strtolower($this->translator->trans('contact')) . '/' . $person->getUid();
        }

        if ($attr['newlucat'] || $attr['isAreaBrick']) {
            $pData['staffmoreinfo'] = Tool::getHostUrl() . '/'
                . strtolower($this->translator->trans('contact')) . '/' . $person->getUid();
        }

        if (!isset($attr['room']) || $attr['room']) {
            $pData['room'] = $this->StaffRoom($person);
        }

        // Get Staff Portal Url - Lucris
        if ($person->getUid() && !$attr['moreinfo']) {
            $pData['portalUrl'] = $this->StaffPortalUrl($person);
        }

        $pData['website'] = !isset($attr['website']) || $attr['website'] ? $person->getWebsite() : '';
        $pData['image'] = $this->StaffImage($person, $attr);
        $pData['roles'] = $this->StaffRoles($person, $attr, $LeaveOfAbsence);
        $pData['phone'] = $this->StaffPhone($person);
        $pData['person'] = $person;
        $pData['view'] = (!isset($attr['view'])) ? 'Staff/partialPersonContactDetails.html.twig' : $attr['view'];

        // View Parameters
        $parameters = array_merge($attr, $pData);
        unset($parameters['view']);

        // Rendering partial
        return $this->twig->render($pData['view'], $parameters);
    }

    public function getDisplayImage(string $src, string $title = '', string $class = '', string $style = ''): string
    {
        // Handle legacy code by stripping the dns from url
        $src = '/images/' . str_replace("https://static.ehl.lu.se/", '', $src);

        // Return img-tag if the file exists on the server
        return (file_exists(strval(
                str_replace("\0", "", PIMCORE_WEB_ROOT . "/var/assets/" . $src))) === true)
            ? "<img alt=\"$title\" class=\"$class\" src=\"$src\" style=\"$style\" />"
            : '';
    }

    private function getLeaveOfAbsence(DataObject\LucatPerson $person): bool
    {
        $LeaveOfAbsence = false;
        foreach ($person->getRoller() as $roll) {
            if ($roll->getLeaveOfAbsence() == true) {
                $LeaveOfAbsence = true;
            }
        }

        return $LeaveOfAbsence;
    }

    private function StaffPortalUrl(DataObject\LucatPerson $person): string
    {
        // List LucrisPerson Object
        $lucrisPersonObject = new DataObject\LucrisPerson\Listing();
        $lucrisPersonObject->setLocale($this->language);
        $lucrisPersonObject->setCondition("uid LIKE ?", $person->getUid());
        $lucrisPersonObject->load();

        // Get PortalUrl
        foreach ($lucrisPersonObject as $staff) {
            return $staff->getportalUrl();
        }

        return '';
    }

    private function StaffPhone(DataObject\LucatPerson $person): string
    {
        $mobiles = [];
        $phones = [];
        $phoneNumber = '';

        if (!$this->getRoles($person)) {
            return '';
        }

        foreach ($this->getRoles($person) as $r) {
            if ($r->getMobile() && !in_array($r->getMobile(), $mobiles)) {
                $mobiles[] = $r->getMobile();
            }

            if ($r->getTelephoneNumber() && !in_array($r->getTelephoneNumber(), $phones)) {
                $phones[] = $r->getTelephoneNumber();
            }
        }

        if (is_array($phones)) {
            foreach ($phones as $p) {
                $phoneNumber .= $this->phoneNumber($p) . ', ';
            }
        }

        if (is_array($mobiles)) {
            foreach ($mobiles as $m) {
                $phoneNumber .= $this->phoneNumber($m) . ', ';
            }
        }

        return ($phoneNumber) ? substr($phoneNumber, 0, -2) : '';
    }

    private function phoneNumber(string $telephoneNumber = ''): string
    {
        if($telephoneNumber) {
            $t = $telephoneNumber;
            return substr($t, 0, 3).' '.substr($t, 3, 2).' '.substr($t, 5, 3).' '. substr($t, 8, 2).' '.substr($t, 10);
        }
        else {
            return ($this->language == 'sv')
                ? '046 222 00 00 (växel)'
                : '+46 46 222 00 00 (operator)';
        }
    }

    private function StaffRoom(DataObject\LucatPerson $person): string
    {
        $room = '';
        $roles = $this->getRolesByPerson($person);

        if ($roles) {
            foreach ($roles as $r) {
                if ($r->primary) {
                    if ($r->room) {
                        $room = $r->room;
                    }
                }
            }
        }

        return $room;
    }

    private function StaffRoles(DataObject\LucatPerson $person, array $attr, bool $LeaveOfAbsence): string
    {
        if (!empty($this->getRolesByPerson($person, $attr['department']))) {
            $roles = '';
            $rolesNameOrg = [];

            if (!isset($attr['roleinfo']) || $attr['roleinfo']) {
                foreach ($this->getRolesByPerson($person) as $role) {
                    if ($role) {
                        $rolesNameOrg[$role->departmentNumber]['roleName'][] = $role->roleName;
                        $rolesNameOrg[$role->departmentNumber]['orgName'] = $role->orgName;
                        $rolesNameOrg[$role->departmentNumber]['departmentNumber'] = $role->departmentNumber;
                        $rolesNameOrg[$role->departmentNumber]['parentOrgName'] = $role->parentOrgName;
                    }
                }

                foreach ($rolesNameOrg as $r) {
                    if ($LeaveOfAbsence) {
                        $roles .= implode(', ', $r['roleName']) . ' '
                            . '(' . strtolower($this->translator->trans('LeaveOfAbsence')) . '), '
                            . $r['parentOrgName'] . '<br>';
                    } else {
                        $roles .= implode(', ', $r['roleName']) . ', ' . $r['orgName'] . '<br>';
                    }
                }
            } else {
                $rolesArr = [];
                foreach ($this->getRolesByPerson($person, $attr['department']) as $r) {
                    if ($r->roleName && !in_array($r->roleName, $rolesArr)) {
                        $rolesArr[] = $r->roleName;
                        $roles .= mb_strtolower($r->roleName) . ', ';
                    }
                }

                $roles = ucfirst($roles);
                $roles = substr($roles, 0, -2);
                if ($LeaveOfAbsence) {
                    $roles .= ' ' . '(' . strtolower($this->translator->trans('LeaveOfAbsence')) . ')';
                }
            }

            return $roles;
        }

        return '';
    }

    private function StaffImage(DataObject\LucatPerson $person, array $attr): bool
    {
        $img = file_exists(PIMCORE_WEB_ROOT . "/var/assets/images/staff/" . $person->getUid() . '.jpg');

        return $img && !isset($attr['image']) || $attr['image'];
    }

    /**
     * @param string|array|null $departmentNumber
     */
    private function getRolesByPerson(DataObject\LucatPerson $person, $departmentNumber = null): array
    {
        $organisations = $person->getOrganisationer();

        if (!$departmentNumber) {
            // Getting departmentNumber from all
            // Organisations connected with the person
            $departmentNumber = array_map(function ($org) {
                return $org->getDepartmentNumber();
            }, $organisations);
        } else if (!is_array($departmentNumber)) {
            $departmentNumber = [$departmentNumber];
        }

        // Filter roles by departmentNumbers
        $roles = array_filter($this->getRoles($person), function ($r) use ($departmentNumber) {
            return (in_array($r->getDepartmentNumber(), $departmentNumber));
        });

        return array_map(function ($r) use ($organisations) {
            foreach ($organisations as $o) {
                if ($o->getDepartmentNumber() == $r->getDepartmentNumber()) {
                    // Get organisation name with full ParentName path
                    $orgName = $this->getOrgName($o);

                    // Get organisation Parent Name
                    $parentOrgName = DataObject\LucatOrganisation::getByDepartmentNumber(
                        $o->getParentDepartmentNumber(), ['limit' => 1, 'unpublished' => true]);
                    $parentOrgName = $parentOrgName ? $parentOrgName->getName() : null;

                    return (object)[
                        'roleName' => ucfirst($r->getDisplayName($this->language)),
                        'parentOrgName' => $parentOrgName,
                        'orgName' => $orgName,
                        'orgBaseUri' => $this->baseUri,
                        'departmentNumber' => $r->getDepartmentNumber($this->language),
                        'primary' => $r->getPrimaryContactInfo(),
                        'room' => $r->getRoom()
                    ];
                }
            }

            return [];
        }, $roles);
    }

    private function getRoles(DataObject\LucatPerson $person, bool $include_custom_roles = false): array
    {
        $rolesArr = $person->getRoller();

        if ($include_custom_roles) {
            return $rolesArr;
        }

        return array_filter($rolesArr, function ($r) {
            // Temporarily ignore roles
            $ignoreRoles = ['purchasing manager', 'directory administrator', 'registrar', 'parking permit manager', 'health and safety representative'];

            return (
                $r->getRoleType() != 'custom' &&
                $r->getHideFromWeb() != true &&
                // $r->getLeaveOfAbsence() != true && // TODO - Check if this filter is needed
                !in_array($r->getDisplayName('en'), $ignoreRoles)
            );
        });
    }

    private function getOrgName(DataObject\LucatOrganisation $organisation): string
    {
        $departmentNumber = $organisation->getDepartmentNumber();
        $uri = preg_replace('/(kontakt|contact)(.*)/i', '$1', $_SERVER['REQUEST_URI']) .
            '/' . $this->baseUri . $departmentNumber;
        $orgName = [];

        if ($organisation->getParentDepartmentNumber() != 'v1000017' ||
            $organisation->getParentDepartmentNumber() != 'v1000000') {
            $orgName[] = $organisation->getName($this->language);

            $orgParent = $organisation->getParentDepartmentNumber();
            while ($orgParent != 'v1000017') {
                $parent = DataObject\LucatOrganisation::getByDepartmentNumber(
                    $orgParent, ['limit' => 1, 'unpublished' => true]
                );
                if ($parent) {
                    // $departmentNumber = $parent->getDepartmentNumber();

                    $parentName = $parent->getName($this->language);

                    $orgName[] = $parentName;

                    $orgParent = $parent->getParentDepartmentNumber();
                } else {
                    $orgParent = 'v1000017';
                }
            }

            $orgName = str_replace($orgName[0], "<a href='$uri'>$orgName[0]</a>", $orgName);
            $orgName = implode(', ', $orgName);
        } else {
            $orgName = $organisation->getName($this->language);
            $orgName = "<a href='$uri'>$orgName</a>";
        }

        return $orgName;
    }

    public function getPersonSpecialRole(array $staff, bool $detail = false, string $baseUri = '', bool $isAreaBrick = false): string
    {
        $uri = preg_replace('/(kontakt|contact)(.*)/i',
                '$1', $_SERVER['REQUEST_URI']) . $baseUri;
        if ($isAreaBrick) {
            $uri = Tool::getHostUrl() . '/' . strtolower($this->translator->trans('contact')) . '/';
        }

        $result = '';

        if ($staff) {
            if ($detail) {
                foreach ($staff as $role =>$persons) {
                    $result .= "$role, ";
                }
                $result = substr($result, 0, -2);
                $result = ucfirst(strtolower($result));

            } else {
                foreach ($staff as $role => $persons) {
                    $result .= '<p class="mb-3">';
                    $result .= ucfirst($role) . ': ';
                    foreach ($persons as $person) {
                        $result .= '<a href="'.$uri.$person['uid'].'">'.$person['name'].'</a>'. ', ';
                    }
                    $result = substr($result, 0, -2);
                    $result .= '<br></p>';
                }

            }
        }

        return $result;
    }
}
