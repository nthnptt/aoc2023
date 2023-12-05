<?php
declare(strict_types=1);

namespace Test\Five;

use AOC\Five\AlmanacParser;
use AOC\Five\Dto\Almanac;
use AOC\Five\Dto\AlmanacConvertTable;
use AOC\Five\Dto\AlmanacConvertLine;
use AOC\Five\Enum\ConvertType;
use PHPUnit\Framework\TestCase;

class AlmanacParserTest extends TestCase
{
    public function testParseShouldWorks(): void
    {
        $content = "
seeds: 79 14 55 13

seed-to-soil map:
50 98 2
52 50 48

soil-to-fertilizer map:
0 15 37

fertilizer-to-water map:
49 53 8

water-to-light map:
88 18 7

light-to-temperature map:
45 77 23

temperature-to-humidity map:
0 69 1

humidity-to-location map:
60 56 37";
        $expected = new Almanac(
            seeds: [79, 14, 55, 13],
            tables: [
                new AlmanacConvertTable(
                    type: ConvertType::SEED_TO_SOIL,
                    ranges: [
                        new AlmanacConvertLine(50, 98, 2),
                        new AlmanacConvertLine(52, 50, 48),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::SOIL_TO_FERTILIZER,
                    ranges: [
                        new AlmanacConvertLine(0, 15, 37),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::FERTILIZER_TO_WATER,
                    ranges: [
                        new AlmanacConvertLine(49, 53, 8),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::WATER_TO_LIGHT,
                    ranges: [
                        new AlmanacConvertLine(88, 18, 7),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::LIGHT_TO_TEMPERATURE,
                    ranges: [
                        new AlmanacConvertLine(45, 77, 23),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::TEMPERATURE_TO_HUMIDITY,
                    ranges: [
                        new AlmanacConvertLine(0, 69, 1),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::HUMIDITY_TO_LOCATION,
                    ranges: [
                        new AlmanacConvertLine(60, 56, 37),
                    ]),
            ]);
        $parser = new AlmanacParser();
        self::assertEquals($expected, $parser->parse($content));


    }

}