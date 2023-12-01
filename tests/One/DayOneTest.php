<?php
declare(strict_types=1);

namespace Test\One;

use AOC\One\DayOneAbstract;
use PHPUnit\Framework\TestCase;
use Test\Utils\InMemoryDataProviderLines;

class DayOneTest extends TestCase
{
    public function testDayOnePartOneShouldWork(): void
    {
        $subject = new DayOneAbstract(new InMemoryDataProviderLines([
            "1abc2",
            "pqr3stu8vwx",
            "a1b2c3d4e5f",
            "treb7uchet",
        ]));
        self::assertEquals(142, $subject->partOne());
    }

    public function testDayOnePartTwoShouldWork(): void
    {
        $subject = new DayOneAbstract(new InMemoryDataProviderLines([
            "two1nine",
            "eightwothree",
            "abcone2threexyz",
            "xtwone3four",
            "4nineeightseven2",
            "zoneight234",
            "7pqrstsixteen",
        ]));
        self::assertEquals(281, $subject->partTwo());
    }
}