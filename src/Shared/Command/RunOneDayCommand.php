<?php
declare(strict_types=1);

namespace AOC\Shared\Command;

use AOC\Shared\DaysRegister;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'aoc:day', description: 'Run one specific aoc days')]
class RunOneDayCommand extends Command
{
    protected function configure()
    {
        return $this
            ->addArgument('day', InputArgument::OPTIONAL, 'Day number. If missing, get last day.')
            ->addOption('file', 'f', InputOption::VALUE_OPTIONAL, 'Specific dataset file.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $dayNumber = $input->getArgument('day') ?? DaysRegister::lastDayNumber();
        $filename = $input->getOption('file');
        $day = DaysRegister::getDay((int)$dayNumber, $filename);
        $resultPartOne = $day->partOne();
        $resultPartTwo = $day->partTwo();
        $rows[] = [$dayNumber, $resultPartOne, $resultPartTwo];
        $table = new Table($output);
        $table->setHeaders(['Day', 'Part 1', 'Part 2'])
            ->setRows($rows);
        $table->render();
        return Command::SUCCESS;
    }
}