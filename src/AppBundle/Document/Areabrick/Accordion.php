<?php

namespace AppBundle\Document\Areabrick;

class Accordion extends AbstractAreabrick
{
    public function getName()
    {
        return 'Kursbeskrivning (accordion)';
    }

    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/accordion.svg';
    }
}
