<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\Document\Editable\Area\Info;

abstract class AbstractAreabrick extends AbstractTemplateAreabrick
{
    public string $language;

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_GLOBAL;
    }

    public function getTemplateSuffix(): string
    {
        return static::TEMPLATE_SUFFIX_TWIG;
    }

    /**
     * Help function for Masonry Bricks
     */
    public function getMasonryColorStore(): array
    {
        return [
            ['nav-block-sky-50 nav-block-fade-sky-50', 'Himmel 50 %'],
            ['nav-block-sky nav-block-fade-sky', 'Himmel 100 %'],
            ['nav-block-copper-50 nav-block-fade-copper-50', 'Koppar 50 %'],
            ['nav-block-copper nav-block-fade-copper', 'Koppar 100 %'],
            ['nav-block-flower-50 nav-block-fade-flower-50', 'Blomma 50 %'],
            ['nav-block-flower nav-block-fade-flower', 'Blomma 100 %'],
            ['nav-block-plaster-50 nav-block-fade-plaster-50', 'Puts 50 %'],
            ['nav-block-plaster nav-block-fade-plaster', 'Puts 100 %']
        ];
    }

    /**
     * Help function for News Bricks
     */
    public function getNewsStore(ClassDefinition $classDefinition, array $store, string $fieldName): array
    {
        /** @var ClassDefinition\Data\Multiselect|ClassDefinition\Data\Select $select */
        $select = $classDefinition->getFieldDefinitions()[$fieldName];
        foreach ($select->getOptions() as $o) {
            $store[] = [$o['value'], $o['key']];
        }

        return $store;
    }

    // Other methods defined above!!!
    public function action(Info $info)
    {
        $language = $info->getDocument()->getProperty('language');
        $this->language = $language;

        // Assign params to view
        if (!empty($info->getParams())){
            foreach ($info->getParams() as $key => $value) {
                $info->setParam($key, $value);
            }
        }

        $info->setParam('language', $language);
    }
}
