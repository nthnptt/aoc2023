<?php
declare(strict_types=1);

namespace Day09;

use AOC\Day09\Day09;
use PHPUnit\Framework\TestCase;
use Test\Utils\InMemoryDataProviderLines;

class Day09Test extends TestCase
{
    public function testDay09PartOne(): void
    {
        $day = new Day09(new InMemoryDataProviderLines([
            '0 3 6 9 12 15',
            '1 3 6 10 15 21',
            '10 13 16 21 30 45',
        ]));
        self::assertEquals(114, $day->partOne());
    }

    public function testDay09PartTwo(): void
    {
        $day = new Day09(new InMemoryDataProviderLines([
            '0 3 6 9 12 15',
            '1 3 6 10 15 21',
            '10 13 16 21 30 45',
        ]));
        self::assertEquals(2, $day->partTwo());
    }

}