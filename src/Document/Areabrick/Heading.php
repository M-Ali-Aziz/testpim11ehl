<?php

namespace App\Document\Areabrick;

class Heading extends AbstractAreabrick
{
    public function getName(): string
    {
        return 'Heading';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/icon/font.png';
    }
}
