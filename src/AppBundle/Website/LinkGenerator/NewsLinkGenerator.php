<?php

namespace AppBundle\Website\LinkGenerator;

use Pimcore\Model\Document;
use Pimcore\Model\DataObject\ClassDefinition\LinkGeneratorInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\Staticroute;

class NewsLinkGenerator implements LinkGeneratorInterface {

    public function generate(Concrete $object, array $params = []): string
    {
        $staticRoute = Staticroute::getByName('news (preview)');
        $path = $staticRoute->assemble([
            'page' => 'nyheter/preview',
            'id' => $object->getId()
        ]);

        return $path;
    }
}