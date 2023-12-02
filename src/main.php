<?php
declare(strict_types=1);

use AOC\One\DayOne;
use AOC\Shared\DataProvider\FileReader;
use AOC\Two\DayTwo;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require __DIR__ . '/../vendor/autoload.php';

$application = new Application();
$application->register('run')
    ->setCode(function (InputInterface $input, OutputInterface $output): int {
        $days = [
            new DayOne(new FileReader('data/one.txt')),
            new DayTwo(new FileReader('data/two.txt')),
        ];
        $rows = [];
        foreach ($days as $key => $day) {
            $resultPartOne = $day->partOne();
            $resultPartTwo = $day->partTwo();
            $rows[] = [$key, $resultPartOne, $resultPartTwo];
        }

        $table = new Table($output);
        $table->setHeaders(['Day', 'Part 1', 'Part 2'])
            ->setRows($rows);
        $table->render();
        return Command::SUCCESS;
    });
$application->run();