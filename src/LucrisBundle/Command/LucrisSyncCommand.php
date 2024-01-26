<?php 

namespace LucrisBundle\Command;
 
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Pimcore\Console\Dumper;
use Pimcore\Model\DataObject\Folder;
use LucrisBundle\Model;

/**
 * This is the class that creates a Command in Pimcore Console to
 * Sync Lucris Organisations and Persons.
 *
 * @copyright  Copyright (c) 2019 Ekonomihögskolan (http://ehl.lu.se)
 * @author Mohammed Ali
 *
 */
class LucrisSyncCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('lucris:sync')
            ->setDescription('Lucris Sync');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Sync Lucris
        try {
            // Sync Lucris Organisation
            $syncOrganisation = new Model\OrganisationProvider();
            $this->output->writeln("<info>Syncing Lucris Organisation ...</info>");
            $this->output->writeln("<comment>Please wait ...</comment>");
            $syncOrganisation->SynchronizeLucrisOrganisation();
            $this->output->writeln("<info>Successfully synced Lucris Organisation.</info>");

            // Sync Lucris Person
            $syncPerson = new Model\PersonProvider();
            $this->output->writeln("<info>Syncing Lucris Person ...</info>");
            $this->output->writeln("<comment>Please wait ...</comment>");
            $syncPerson->SynchronizeLucrisPerson();
            $this->output->writeln("<info>Successfully synced Lucris Person.</info>");

            $this->dump("Done!", Dumper::NEWLINE_BEFORE | Dumper::NEWLINE_AFTER);

            // Add log to lucris.log
            \Pimcore\Log\Simple::log("lucris", "Lucris INFO: Successfully synced Lucris.");
            
        } catch (\Exception $e) {
            // Add log to lucris.log
            \Pimcore\Log\Simple::log("lucris", "Lucris ERROR: " . $e->getMessage() . " " . __FILE__ . " Line: " . __LINE__);

            echo $e->getMessage();   
        }
    }
}
