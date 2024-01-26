<?php

namespace App\Document\Areabrick;

class Snippet extends AbstractAreabrick
{
    public function getName(): string
    {
        return 'Snippet';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/group-by.svg';
    }
}
