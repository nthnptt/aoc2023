<?php
declare(strict_types=1);

namespace Test\Day03;

use AOC\Day03\PartEngine;
use AOC\Day03\SchemaPosition;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class PartEngineTest extends TestCase
{
    public function testGetEnginePartPositionsOfLengthOneShouldBeOnePoint(): void
    {
        $part = new PartEngine(1, new SchemaPosition(1, 1));
        assertEquals([new SchemaPosition(1, 1)], $part->positions());
    }

    public function testGetEnginePartPositionsWithLengthOfMoreThanOneShouldGetXPoint(): void
    {

        $part = new PartEngine(123, new SchemaPosition(1, 1));
        assertEquals([new SchemaPosition(1, 1), new SchemaPosition(2, 1), new SchemaPosition(3, 1)], $part->positions());
    }

}