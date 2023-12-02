<?php
declare(strict_types=1);

namespace AOC\Shared\Command;

use AOC\One\DayOne;
use AOC\Shared\DataProvider\FileReader;
use AOC\Shared\DaysRegister;
use AOC\Two\DayTwo;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'aoc:all', description: 'Run all aoc days')]
class RunAllDaysCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $days = DaysRegister::getDays();
        $rows = [];
        $progressBar = new ProgressBar($output, count($days));
        foreach ($days as $key => $day) {
            $resultPartOne = $day->partOne();
            $resultPartTwo = $day->partTwo();
            $rows[] = [$key + 1, $resultPartOne, $resultPartTwo];
            $progressBar->advance();
        }
        $progressBar->finish();
        $progressBar->clear();

        $table = new Table($output);
        $table->setHeaders(['Day', 'Part 1', 'Part 2'])
            ->setRows($rows);
        $table->render();
        return Command::SUCCESS;
    }
}