<?php

namespace Day12;

use AOC\Day12\Rows;
use PHPUnit\Framework\TestCase;

class RowsTest extends TestCase {
    public function testIsValid(): void
    {
        $this->assertTrue((new Rows('#.#.###', [1, 1, 3]))->isValid());
        $this->assertTrue((new Rows('#..#...###', [1, 1, 3]))->isValid());
        $this->assertTrue((new Rows('..#..#....###', [1, 1, 3]))->isValid());
    }

    public function testArrangementsCount(): void
    {
        $this->assertEquals(1, (new Rows('???.###', [1, 1, 3]))->arrangementsCount());
        $this->assertEquals(4, (new Rows('.??..??...?##.', [1, 1, 3]))->arrangementsCount());
        $this->assertEquals(1, (new Rows('?#?#?#?#?#?#?#?', [1, 3, 1, 6]))->arrangementsCount());
        $this->assertEquals(1, (new Rows('????.#...#...', [4, 1, 1]))->arrangementsCount());
        $this->assertEquals(4, (new Rows('????.######..#####.', [1, 6, 5]))->arrangementsCount());
        $this->assertEquals(10, (new Rows('?###????????', [3, 2, 1]))->arrangementsCount());
    }
}