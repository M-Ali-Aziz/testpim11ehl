<?php

namespace AppBundle\Website\LinkGenerator;

use Pimcore\Model\Document;
use Pimcore\Model\DataObject\ClassDefinition\LinkGeneratorInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\Staticroute;

class EventsLinkGenerator implements LinkGeneratorInterface {

    public function generate(Concrete $object, array $params = []): string
    {
        $staticRoute = Staticroute::getByName('calendar (preview)');
        $path = $staticRoute->assemble([
            'page' => 'calendar/preview',
            'id' => $object->getId()
        ]);

        return $path;
    }
}