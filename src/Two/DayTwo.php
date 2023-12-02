<?php

namespace AOC\Two;

use AOC\Shared\AbstractAocDay;
use AOC\Shared\Attribute\AocDay;

#[AocDay(day: 2, fileData: 'data/two.txt')]
class DayTwo extends AbstractAocDay
{
    const int MAX_RED = 12;
    const int MAX_BLUE = 14;
    const int MAX_GREEN = 13;

    public function partOne(): int
    {
        $data = $this->data();
        return array_reduce($data, function (int $acc, CubeGame $game) {
            $isValid = array_reduce($game->setsOfCube, function (bool $valid, SetOfCube $cubes) {
                return $valid
                    && $cubes->green <= self::MAX_GREEN
                    && $cubes->blue <= self::MAX_BLUE
                    && $cubes->red <= self::MAX_RED;
            }, true);
            return $isValid ? $acc + $game->id : $acc;
        }, 0);
    }

    public function partTwo(): string
    {
        $data = $this->data();
        return array_reduce($data, function(int $sum, CubeGame $game) {
            return $sum + $game->getFewestNumberOfCube()->power();
        }, 0);
    }

    private function data(): array
    {
        $data = $this->datasetProvider->getLines();
        $parser = new CubeGameParser();
        return array_map(fn($line) => $parser->parse($line), $data);
    }
}