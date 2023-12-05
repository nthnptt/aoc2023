<?php
declare(strict_types=1);

namespace AOC\Five;

use AOC\Five\Dto\Almanac;
use AOC\Shared\AbstractAocDay;
use AOC\Shared\Attribute\AocDay;

#[AocDay(day: 5, fileData: 'data/five.txt')]
class DayFive extends AbstractAocDay
{
    public function partOne(): int
    {
        $almanac = $this->data();
        return min($almanac->seedsLocations());
    }

    public function partTwo(): string
    {
        return '???';
        $almanac = $this->data();
        $result = null;
        for ($k = 0; $k < count($almanac->seeds); $k += 2) {
            print_r($k / 2 . '/' . count($almanac->seeds) / 2 . ' range');
            print_r(PHP_EOL);
            for ($i = $almanac->seeds[$k]; $i < $almanac->seeds[$k] + $almanac->seeds[$k + 1]; $i++) {
                print_r('   seed : ' . $i);
                print_r(PHP_EOL);
                $tmpAlmanac = new Almanac(
                    seeds: [$i],
                    tables: $almanac->tables,
                );
                $locations = $tmpAlmanac->seedsLocations();
                $tmpResult = min($locations);
                if (!isset($result) || $tmpResult < $result) {
                    $result = $tmpResult;
                }
                unset($tmpAlmanac);
            }
        }
        return $result;
    }

    private function data(): Almanac
    {
        $parser = new AlmanacParser();
        return $parser->parse($this->datasetProvider->get());
    }
}