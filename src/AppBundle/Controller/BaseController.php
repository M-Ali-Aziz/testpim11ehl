<?php

namespace AppBundle\Controller;

use AppBundle\Service\CustomWebsiteService;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\Document;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends FrontendController
{
    protected CustomWebsiteService $websiteService;

    public function __construct(CustomWebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }

    /**
     * @throws \Exception
     */
    protected function getWebsiteConfig(?Document $document, string $language): array
    {
        return $this->websiteService->getConfig($document, $language);
    }

    /**
     * @param Document|Document\Page $document
     * @return Response
     */
    protected function redirectError(Document\Page $document): Response
    {
        $contents = $this->renderView('Content/error.html.twig', [
            'document' => $document,
        ]);

        return new Response(
            $contents,
            Response::HTTP_NOT_FOUND,
            ['content-type' => 'text/html']
        );
    }
}
