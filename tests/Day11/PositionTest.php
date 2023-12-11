<?php
declare(strict_types=1);

namespace Day11;

use AOC\Day11\Position;
use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{

    public function testDistance(): void
    {
        $tests = [
            [new Position(0, 0), new Position(4, 5), 9],
            [new Position(4, 5), new Position(0, 0), 9],
            [new Position(4, 0), new Position(0, 5), 9],
        ];
        foreach($tests as $test) {
            list($init, $target, $expected) = $test;
            $this->assertEquals($expected, $init->distance($target));
        }
    }
}