<?php

namespace App\Document\Areabrick;

class Video extends AbstractAreabrick
{
    public function getName():string
    {
        return 'Video';
    }

    public function getAuthor(): string
    {
        return 'pimcore.org';
    }

    public function getIcon(): string
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/video_file.svg';
    }
}
