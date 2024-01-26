<?php

namespace AppBundle\Document\Areabrick;

class Carousel extends AbstractAreabrick
{
    public function getName()
    {
        return 'Carousel (bildspel)';
    }

    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/gallery.svg';
    }
}
