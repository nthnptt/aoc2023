<?php
declare(strict_types=1);

namespace Day08;

use AOC\Day08\Day08;
use PHPUnit\Framework\TestCase;
use Test\Utils\InMemoryDataProviderText;

class Day08Test extends TestCase
{
    public function testPartOne(): void
    {
        $day = new Day08(new InMemoryDataProviderText('RL

AAA = (BBB, CCC)
BBB = (DDD, EEE)
CCC = (ZZZ, GGG)
DDD = (DDD, DDD)
EEE = (EEE, EEE)
GGG = (GGG, GGG)
ZZZ = (ZZZ, ZZZ)'));

        self::assertEquals(2, $day->partOne());
        $day = new Day08(new InMemoryDataProviderText('LLR

AAA = (BBB, BBB)
BBB = (AAA, ZZZ)
ZZZ = (ZZZ, ZZZ)'));
        self::assertEquals(6, $day->partOne());
    }

}