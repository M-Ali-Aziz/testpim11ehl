<?php

namespace AppBundle\Twig\Extension;

use AppBundle\Service\StaffService;
use Pimcore\Model\DataObject;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class StaffExtension extends AbstractExtension
{
    private StaffService $staffService;

    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('ehl_staff_list', [$this, 'GetStaffList']),
            new TwigFunction('ehl_staff_detail', [$this, 'GetStaffDetail']),
            new TwigFunction('ehl_staff_display_image', [$this, 'getDisplayImage']),
            new TwigFunction('ehl_staff_person_special_role', [$this, 'getPersonSpecialRole']),
        ];
    }

    /**
     * @param DataObject\LucatPerson[] $staff
     */
    public function GetStaffList(array $staff, array $attr): string
    {
        return $this->staffService->StaffList($staff, $attr);
    }

    public function GetStaffDetail(?DataObject\LucatPerson $person, array $attr): string
    {
        return $this->staffService->StaffDetail($person, $attr);
    }

    public function getDisplayImage(string $src, string $title = '', string $class = '', string $style = ''): string
    {
        return $this->staffService->getDisplayImage($src, $title, $class, $style);
    }


    public function getPersonSpecialRole(array $staff, bool $detail = false, string $baseUri = '', bool $isAreaBrick = false): string
    {
        return $this->staffService->getPersonSpecialRole($staff, $detail, $baseUri, $isAreaBrick);
    }
}
