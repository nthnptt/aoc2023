<?php

namespace Test\Two;

use AOC\Two\CubeGame;
use AOC\Two\SetOfCube;
use PHPUnit\Framework\TestCase;

class CubeGameTest extends TestCase
{
    public function testGetFewestNumberOfCubesShouldWork(): void
    {
        $game = new CubeGame(
            id: 2,
            setsOfCube: [
                new SetOfCube(red: 20, blue: 4, green: 8),
                new SetOfCube(red: 4, blue: 5, green: 13),
                new SetOfCube(red: 0, blue: 5, green: 1),
            ]
        );
        self::assertEquals(new SetOfCube(red: 20, blue: 5, green: 13), $game->getFewestNumberOfCube());
    }

}