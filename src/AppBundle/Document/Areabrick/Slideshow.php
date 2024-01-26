<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Editable\Area\Info;

class Slideshow extends AbstractTemplateAreabrick
{
    /**
     * @inheritdoc
     */
    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_GLOBAL;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Slideshow (bildspel)';
    }

    /**
     * @inheritdoc
     */
    public function getVersion()
    {
        return '1.0';
    }

    /**
     * @inheritdoc
     */
    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/gallery.svg';
    }

    // Other methods defined above!!!
    // Action method
    public function action(Info $info)
    {
        // Assign params to view
        if (!empty($info->getParams())){
            foreach ($info->getParams() as $key => $value) {
                $info->setParam($key, $value);
            }
        }
    }
}
