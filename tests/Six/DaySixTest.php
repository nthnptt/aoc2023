<?php
declare(strict_types=1);

namespace Six;

use AOC\Six\DaySix;
use PHPUnit\Framework\TestCase;
use Test\Utils\InMemoryDataProviderLines;

class DaySixTest extends TestCase
{
    public function testPartOne(): void
    {
        $day = new DaySix(new InMemoryDataProviderLines([
            'Time:      7',
            'Distance:  9'
        ]));

        self::assertEquals(4, $day->partOne());
        $day = new DaySix(new InMemoryDataProviderLines([
            'Time:      7  15   30',
            'Distance:  9  40  200'
        ]));

        self::assertEquals(288, $day->partOne());
    }

    public function testPartTwo(): void
    {
        $day = new DaySix(new InMemoryDataProviderLines([
            'Time:      7  15   30',
            'Distance:  9  40  200'
        ]));

        self::assertEquals(71503, $day->partTwo());
    }
}