<?php
declare(strict_types=1);

namespace Day10;

use AOC\Day10\Day10;
use PHPUnit\Framework\TestCase;
use Test\Utils\InMemoryDataProviderLines;

class Day10Test extends TestCase
{

    public function testPartOne(): void
    {
        $day = new Day10(new InMemoryDataProviderLines([
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