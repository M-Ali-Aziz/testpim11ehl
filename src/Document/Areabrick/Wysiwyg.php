<?php

namespace App\Document\Areabrick;

class Wysiwyg extends AbstractAreabrick
{
    public function getName()
    {
        return 'Text';
    }

    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/wysiwyg.svg';
    }
}
