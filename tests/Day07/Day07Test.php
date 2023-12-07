<?php
declare(strict_types=1);

namespace Day07;

use AOC\Day07\Day07;
use PHPUnit\Framework\TestCase;
use Test\Utils\InMemoryDataProviderLines;

class Day07Test extends TestCase
{
    public function testPartOne(): void
    {
        $day = new Day07(new InMemoryDataProviderLines([
            '32T3K 765',
            'T55J5 684',
            'KK677 28',
            'KTJJT 220',
            'QQQJA 483',
        ]));
        $this->assertEquals(6440, $day->partOne());
    }

    public function testPartTwo(): void
    {
        $day = new Day07(new InMemoryDataProviderLines([
            '32T3K 765',
            'T55J5 684',
            'KK677 28',
            'KTJJT 220',
            'QQQJA 483',
        ]));
        $this->assertEquals(5905, $day->partTwo());
    }
}