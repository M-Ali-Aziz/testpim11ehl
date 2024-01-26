<?php 

namespace AppBundle\Command;
 
use Pimcore\Console\AbstractCommand;
use Pimcore\Console\Dumper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Pimcore\Db;

/**
 * This is the class that creates a Command-lind in Pimcore Console to
 * Drop application_logs_archive_MONTH_YEAR tables from DataBase.
 *
 * @copyright  Copyright (c) 2020 Ekonomihögskolan (http://ehl.lu.se)
 * @author Mohammed Ali
 *
 */
class DropTableCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('drop:table')
            ->setDescription('Drop all application_logs_archive_MONTH_YEAR tables from DataBase');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            // Drop Table(s)
            $this->output->writeln("<info>Droping Tables from DataBase ...</info>");
            $this->output->writeln("<info>Please wait ...</info>");
            $db = Db::get();
            $qTables = "SELECT TABLE_NAME FROM information_schema.tables WHERE engine = 'ARCHIVE'";
            $tables = $db->fetchAll($qTables);
            foreach ($tables as $table) {
                if (strpos($table['TABLE_NAME'], 'application_logs_archive') !== false) {
                    $qDropTable = "DROP TABLE " . $table['TABLE_NAME'];
                    $db->query($qDropTable);
                    $this->output->writeln("<comment>Droped table => " .$table['TABLE_NAME']. " </comment>");
                }
            }
            $db->close();
            $this->output->writeln("<info>Successfully droped all (application_logs_archive_MONTH_YEAR) tables.</info>");
            $this->dump("Done!", Dumper::NEWLINE_BEFORE | Dumper::NEWLINE_AFTER);
        } catch (\Exception $e) {
            echo $e->getMessage();   
        }
    }
}
