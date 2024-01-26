<?php

namespace App\Document\Areabrick;

class Image extends AbstractAreabrick
{
    public function getName()
    {
        return 'Bild';
    }

    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/image.svg';
    }
}
