<?php

namespace UniversityBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class UniversityBundle extends AbstractPimcoreBundle
{
    public function getVersion()
    {
        return '1.0.0';
    }

    public function getDescription()
    {
        return 'University grid-panels';
    }

    public function getCssPaths()
    {
        return [
            '/bundles/university/css/university.css'
        ];
    }

    public function getJsPaths()
    {
        return [
            '/bundles/university/js/university.js',
            '/bundles/university/js/university-gridpanel.js'
        ];
    }
}