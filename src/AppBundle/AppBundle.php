<?php

namespace AppBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class AppBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/app/js/pimcore/startup.js'
        ];
    }
}
