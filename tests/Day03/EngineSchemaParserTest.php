<?php
declare(strict_types=1);

namespace Test\Day03;

use AOC\Day03\EngineSchema;
use AOC\Day03\EngineSchemaParser;
use AOC\Day03\Gear;
use AOC\Day03\PartEngine;
use AOC\Day03\SchemaPosition;
use PHPUnit\Framework\TestCase;

class EngineSchemaParserTest extends TestCase
{
    public function testParseShouldWork(): void
    {
        $input = [
            '467..114..',
            '...*......',
            '460.......',
            '460....#11',
        ];
        $expected = new EngineSchema([
            new PartEngine(467, new SchemaPosition(0, 0)),
            new PartEngine(460, new SchemaPosition(0, 2)),
            new PartEngine(11, new SchemaPosition(8, 3)),
        ], [
            '(3,1)' => new Gear(new SchemaPosition(3, 1))
        ]);
        $parser = new EngineSchemaParser();
        $result = $parser->parse($input);
        self::assertEquals($expected, $result);
    }
}