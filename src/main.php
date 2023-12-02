<?php
declare(strict_types=1);

use AOC\Shared\Command\RunAllDaysCommand;
use AOC\Shared\Command\RunOneDayCommand;
use Symfony\Component\Console\Application;

require __DIR__ . '/../vendor/autoload.php';

$application = new Application();
$application->add(new RunAllDaysCommand());
$application->add(new RunOneDayCommand());
$application->run();