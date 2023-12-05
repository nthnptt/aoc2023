<?php
declare(strict_types=1);

namespace Test\Five;

use AOC\Five\Dto\Almanac;
use AOC\Five\Dto\AlmanacConvertLine;
use AOC\Five\Dto\AlmanacConvertTable;
use AOC\Five\Enum\ConvertType;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class AlmanacTest extends TestCase
{
    public function testSeedsLocations(): void
    {
        $almanac = new Almanac(
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
                        new AlmanacConvertLine(37, 52, 2),
                        new AlmanacConvertLine(39, 0, 15),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::FERTILIZER_TO_WATER,
                    ranges: [
                        new AlmanacConvertLine(49, 53, 8),
                        new AlmanacConvertLine(0, 11, 42),
                        new AlmanacConvertLine(42, 0, 7),
                        new AlmanacConvertLine(57, 7, 4),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::WATER_TO_LIGHT,
                    ranges: [
                        new AlmanacConvertLine(88, 18, 7),
                        new AlmanacConvertLine(18, 25, 70),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::LIGHT_TO_TEMPERATURE,
                    ranges: [
                        new AlmanacConvertLine(45, 77, 23),
                        new AlmanacConvertLine(81, 45, 19),
                        new AlmanacConvertLine(68, 64, 13),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::TEMPERATURE_TO_HUMIDITY,
                    ranges: [
                        new AlmanacConvertLine(0, 69, 1),
                        new AlmanacConvertLine(1, 0, 69),
                    ]),
                new AlmanacConvertTable(
                    type: ConvertType::HUMIDITY_TO_LOCATION,
                    ranges: [
                        new AlmanacConvertLine(60, 56, 37),
                        new AlmanacConvertLine(56, 93, 4),
                    ]),
            ]);
        $expected = [82, 43, 86, 35];
        assertEquals($expected, $almanac->seedsLocations());

    }
}