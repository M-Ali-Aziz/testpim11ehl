<?php

namespace LucrisBundle\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Console\Input\ArrayInput;
use \Pimcore\Console\Application;
use Symfony\Component\HttpKernel\KernelInterface;


class SyncController extends FrontendController
{
    /**
     * @Route("/lucris/sync/lucris")
     */
    public function lucrisAction(KernelInterface $kernel)
    {
        // Sync lucris
        try {
            // Setting up terminal call to sync lucris
            $input = new ArrayInput([
                'command' => 'lucris:sync'
            ]);

            // Running terminal call
            $application = new Application($kernel);
            $application->run($input);
            
        } catch (\Exception $e) {
            return new Response($e->getMessage());
        }
    }
}
