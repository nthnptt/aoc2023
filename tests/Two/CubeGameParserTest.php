<?php

namespace Test\Two;

use AOC\Two\CubeGame;
use AOC\Two\CubeGameParser;
use AOC\Two\SetOfCube;
use PHPUnit\Framework\TestCase;

class CubeGameParserTest extends TestCase
{
    public function testParseShouldWork(): void
    {
        $expected = new CubeGame(
            id: 2,
            setsOfCube: [
                new SetOfCube(red: 1, blue: 1, green: 2),
                new SetOfCube(red: 1, blue: 4, green: 3),
                new SetOfCube(red: 1, blue: 1, green: 1),
            ]
        );
        $parser = new CubeGameParser();
        $game = $parser->parse('Game 2: 1 blue, 2 green, 1 red; 3 green, 4 blue, 1 red; 1 green, 1 blue, 1 red');
        self::assertEquals($expected, $game);
    }

    public function testParseWithNotInColorShouldWork(): void
    {
        $expected = new CubeGame(
            id: 1,
            setsOfCube: [
                new SetOfCube(red: 4, blue: 3, green: 0),
                new SetOfCube(red: 1, blue: 6, green: 2),
                new SetOfCube(red: 0, blue: 0, green: 2),
            ]
        );
        $parser = new CubeGameParser();
        $game = $parser->parse('Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green');
        self::assertEquals($expected, $game);

    }
}