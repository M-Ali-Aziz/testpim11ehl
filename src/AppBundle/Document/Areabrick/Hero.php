<?php

namespace AppBundle\Document\Areabrick;

class Hero extends AbstractAreabrick
{
    public function getName(): string
    {
        return 'Hero (image med eller utan titel)';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/gallery.svg';
    }
}
