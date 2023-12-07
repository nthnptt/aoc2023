<?php
declare(strict_types=1);

namespace Test\Day03;

use AOC\Day03\Day03;
use PHPUnit\Framework\TestCase;
use Test\Utils\InMemoryDataProviderLines;

class Day03Test extends TestCase
{
    public function testPartOneShouldWork(): void
    {
        $input = [
            '467..114..',
            '...*......',
            '..35..633.',
            '......#...',
            '617*......',
            '.....+.58.',
            '..592.....',
            '......755.',
            '...$.*....',
            '.664.598..',
        ];
        $day = new Day03(new InMemoryDataProviderLines($input));
        $result = $day->partOne();
        self::assertEquals(4361, $result);
    }

    public function testPartTwoShouldWork(): void
    {
        $input = [
            '467..114..',
            '...*......',
            '..35..633.',
            '......#...',
            '617*......',
            '.....+.58.',
            '..592.....',
            '......755.',
            '...$.*....',
            '.664.598..',
        ];
        $day = new Day03(new InMemoryDataProviderLines($input));
        $result = $day->partTwo();
        self::assertEquals(467835, $result);
    }
}