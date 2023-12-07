<?php
declare(strict_types=1);

namespace Day06;

use AOC\Day06\Day06;
use PHPUnit\Framework\TestCase;
use Test\Utils\InMemoryDataProviderLines;

class Day06Test extends TestCase
{
    public function testPartOne(): void
    {
        $day = new Day06(new InMemoryDataProviderLines([
            'Time:      7',
            'Distance:  9'
        ]));

        self::assertEquals(4, $day->partOne());
        $day = new Day06(new InMemoryDataProviderLines([
            'Time:      7  15   30',
            'Distance:  9  40  200'
        ]));

        self::assertEquals(288, $day->partOne());
    }

    public function testPartTwo(): void
    {
        $day = new Day06(new InMemoryDataProviderLines([
            'Time:      7  15   30',
            'Distance:  9  40  200'
        ]));

        self::assertEquals(71503, $day->partTwo());
    }
}