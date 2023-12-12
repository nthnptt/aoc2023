<?php
declare(strict_types=1);

namespace Day12;

use AOC\Day12\Day12;
use PHPUnit\Framework\TestCase;
use Test\Utils\InMemoryDataProviderLines;

use function PHPUnit\Framework\assertEquals;

class Day12Test extends TestCase {

    public function testPartOne(): void
    {
        $day = new Day12(new InMemoryDataProviderLines([
            '???.### 1,1,3',
            '.??..??...?##. 1,1,3',
            '?#?#?#?#?#?#?#? 1,3,1,6',
            '????.#...#... 4,1,1',
            '????.######..#####. 1,6,5',
            '?###???????? 3,2,1',
        ]));
    
        self::assertEquals(21, $day->partOne());
    }

    public function testPartTwo(): void
    {
        $this->markTestSkipped();
        $day = new Day12(new InMemoryDataProviderLines([
            '???.### 1,1,3',
            '.??..??...?##. 1,1,3',
            '?#?#?#?#?#?#?#? 1,3,1,6',
            '????.#...#... 4,1,1',
            '????.######..#####. 1,6,5',
            '?###???????? 3,2,1',
        ]));
    
        self::assertEquals(525152, $day->partTwo());
    }
}