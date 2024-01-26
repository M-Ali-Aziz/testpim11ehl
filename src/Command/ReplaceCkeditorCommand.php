<?php 

namespace AppBundle\Command;
 
use Pimcore\Console\AbstractCommand;
use Pimcore\Console\Dumper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

/**
 * This is the class that creates a Command-lind in Pimcore Console to
 * Replace the existing Pimcore ckeditor version with the new custom ckeditor.
 * vendor/pimcore/pimcore/bundles/AdminBundle/Resources/public/js/lib/ckeditor
 *
 * @copyright  Copyright (c) 2020 Ekonomihögskolan (http://ehl.lu.se)
 * @author Mohammed Ali
 *
 */
class ReplaceCkeditorCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('replace:ckeditor')
            ->setDescription('Replace CKEditor 4.14.0 - Pimcore Buggfix');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            // Replace CKEditor
            $this->output->writeln("<info>Replacing CKEditor ...</info>");
            $src = PIMCORE_PROJECT_ROOT . '/web/static/lib/ckeditor';
            $dest = PIMCORE_PROJECT_ROOT . '/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/public/js/lib';

            if (is_dir($src)) {
                $this->output->writeln("<comment>Saving a copy of Pimcore ckeditor folder to:</comment>");
                $this->output->writeln("<comment>vendor/pimcore/pimcore/bundles/AdminBundle/Resources/public/js/lib/OLD_ckeditor</comment>");
                exec("cp -nR ". $dest . "/ckeditor" . " " . $dest . "/OLD_ckeditor");
                $this->output->writeln("<info>Replacing with new ckeditor(4.14.0) ...</info>");
                exec("cp -fR " . $src . " " . $dest);

                $this->output->writeln("<info>Successfully replaced CKEditor.</info>");
                $this->dump("Done!", Dumper::NEWLINE_BEFORE | Dumper::NEWLINE_AFTER);
            } else {
                $this->output->writeln("<error>ERROR:</error> ckeditor folder does not exist on web/static/lib/ckeditor</error>");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();   
        }
    }
}
