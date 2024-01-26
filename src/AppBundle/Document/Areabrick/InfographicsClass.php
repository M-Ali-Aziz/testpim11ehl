<?php

namespace AppBundle\Document\Areabrick;

class InfographicsClass extends AbstractAreabrick
{
    public function getName(): string
    {
        return 'infographics-class';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/statistics.svg';
    }
}
