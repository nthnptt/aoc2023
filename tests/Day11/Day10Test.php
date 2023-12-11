<?php
declare(strict_types=1);

namespace Day11;

use AOC\Day11\Day11;
use PHPUnit\Framework\TestCase;
use Test\Utils\InMemoryDataProviderLines;

class Day11Test extends TestCase
{

    public function testPartOne(): void
    {
        $day = new Day11(new InMemoryDataProviderLines([
            '...#......',
            '.......#..',
            '#.........',
            '..........',
            '......#...',
            '.#........',
            '.........#',
            '..........',
            '.......#..',
            '#...#.....',
        ]));

        self::assertEquals(374, $day->partOne());
    }
}