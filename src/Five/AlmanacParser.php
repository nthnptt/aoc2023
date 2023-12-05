<?php
declare(strict_types=1);

namespace AOC\Five;

use AOC\Five\Dto\Almanac;
use AOC\Five\Dto\AlmanacConvertTable;
use AOC\Five\Dto\AlmanacConvertLine;
use AOC\Five\Enum\ConvertType;

class AlmanacParser
{
    public function parse(string $content): Almanac
    {
        $parts = explode(PHP_EOL . PHP_EOL, $content,);
        list(, $seedLine) = explode(':', $parts[0]);
        $seeds = array_map(fn(string $seedString) => (int)$seedString, explode(' ', trim($seedLine)));

        $soils = array_slice($parts, 1);
        $soilsParsed = [];
        foreach ($soils as $soil) {
            $parsed = $this->parseSoil($soil);
            $soilsParsed[$parsed->type->name] = $parsed;
        }
        return new Almanac(
            seeds: $seeds,
            tables: $soilsParsed,
        );
    }

    private function parseSoil(string $soilDescription): AlmanacConvertTable
    {
        $parts = explode(PHP_EOL, $soilDescription,);
        list($type) = explode(' ', $parts[0]);
        $ranges = array_map(function (string $rangeLine) {
            list($destination, $source, $length) = explode(' ', $rangeLine);
            return new AlmanacConvertLine((int)$destination, (int)$source, (int)$length);
        }, array_slice($parts, 1));
        return new AlmanacConvertTable(
            type: $this->stringToSoilType($type),
            ranges: $ranges
        );
    }

    private function stringToSoilType(string $soilName): ConvertType
    {
        return match ($soilName) {
            'seed-to-soil' => ConvertType::SEED_TO_SOIL,
            'soil-to-fertilizer' => ConvertType::SOIL_TO_FERTILIZER,
            'fertilizer-to-water' => ConvertType::FERTILIZER_TO_WATER,
            'water-to-light' => ConvertType::WATER_TO_LIGHT,
            'light-to-temperature' => ConvertType::LIGHT_TO_TEMPERATURE,
            'temperature-to-humidity' => ConvertType::TEMPERATURE_TO_HUMIDITY,
            'humidity-to-location' => ConvertType::HUMIDITY_TO_LOCATION,
        };
    }
}