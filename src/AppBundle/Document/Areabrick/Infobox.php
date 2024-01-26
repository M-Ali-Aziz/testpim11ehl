<?php

namespace AppBundle\Document\Areabrick;

class Infobox extends AbstractAreabrick
{
    public function getName(): string
    {
        return 'Infobox';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/about.svg';
    }
}
