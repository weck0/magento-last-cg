<?php
namespace Wecko\ApiCall\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\Filesystem\Io\File;

class FetchApiDataCommand extends Command
{
    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('wecko:fetchapidata')
            ->setDescription('Fetch API data and save as JSON');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $apiUrl = 'https://ppd-exp-offres-sirh.de-c1.eu1.cloudhub.io/api/ppd-exp-offres-sirh/v1/offreRH?societe=MP&idAnnonce=153';
            $response = file_get_contents($apiUrl);

            if ($response === false) {
                $output->writeln("API call failed.");
                return 1; // error code
            }

            $output->writeln("API Response: " . $response);
            return 0; // success code
        } catch (\Exception $e) {
            $output->writeln('An error occurred: ' . $e->getMessage());
            return 1; // error code
        }
    }
}
