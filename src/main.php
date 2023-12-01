<?php
declare(strict_types=1);

use AOC\One\DayOneAbstract;
use AOC\Shared\DataProvider\FileReader;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require __DIR__ . '/../vendor/autoload.php';

$application = new Application();
$application->register('run')
    ->setCode(function (InputInterface $input, OutputInterface $output): int {
        $file = new FileReader('data/one.txt');
        $day = new DayOneAbstract($file->getLines());
        $resultPartOne = $day->partOne();
        $resultPartTwo = $day->partTwo();
        $table = new Table($output);
        $table->setHeaders(['Day', 'Part 1', 'Part 2'])
            ->setRows([
                [1, $resultPartOne, $resultPartTwo]
            ]);
        $table->render();
        return Command::SUCCESS;
    });
$application->run();