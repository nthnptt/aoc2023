<?php

namespace Test\Day02;

use AOC\Day02\SetOfCube;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class SetOfCubeTest extends TestCase
{
    public function testPowerShouldWork(): void
    {
        assertEquals(48, (new SetOfCube(red: 4, blue: 6, green: 2))->power());
    }
}