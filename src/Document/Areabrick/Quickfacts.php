<?php

namespace App\Document\Areabrick;

class Quickfacts extends AbstractAreabrick
{
    public function getName(): string
    {
        return 'Quickfacts';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/inspection.svg';
    }
}
