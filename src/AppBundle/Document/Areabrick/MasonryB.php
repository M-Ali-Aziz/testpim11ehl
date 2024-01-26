<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Model\Document\Editable\Area\Info;

class MasonryB extends AbstractAreabrick
{
    public function getName()
    {
        return 'Masonry-B';
    }

    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/bricks.svg';
    }

    // Other methods defined above!!!
    public function action(Info $info)
    {
        parent::action($info);

        $info->setParam('colorStore', $this->getMasonryColorStore());
    }
}
