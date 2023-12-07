<?php
declare(strict_types=1);

namespace AOC\Day06;

use AOC\Shared\AbstractAocDay;
use AOC\Shared\Attribute\AocDay;

#[AocDay(day: 6, fileData: 'data/06.txt')]
class Day06 extends AbstractAocDay
{

    #[\Override]
    public function partOne(): int
    {
        $data = $this->parse(...$this->data());
        $possibilities = [];
        foreach ($data as list($distance, $duration)) {
            $possibilities[] = $this->computePossibilities($distance, $duration);
        }
        return array_reduce($possibilities, fn(int $acc, int $number) => $acc * $number, 1);
    }

    #[\Override]
    public function partTwo(): int
    {
        $toParse = array_map(fn(string $line) => preg_replace('/\s+/', '', trim($line)), $this->data());
        $data = $this->parse(...$toParse);
        list($distance, $duration) = $data[0];
        return $this->computePossibilities($distance, $duration);
    }

    private function data(): array
    {
        $lines = $this->datasetProvider->getLines();
        list(, $timesLine) = explode(':', $lines[0]);
        list(, $distancesLine) = explode(':', $lines[1]);
        return [$timesLine, $distancesLine];
    }

    private function parse(string $timesLine, string $distancesLine): array
    {
        $distances = explode(' ', preg_replace('/\s+/', ' ', trim($distancesLine)));
        $times = explode(' ', preg_replace('/\s+/', ' ', trim($timesLine)));
        $result = [];
        foreach ($distances as $key => $distance) {
            $result[] = [(int)$distance, (int)$times[$key]];
        }
        return $result;
    }

    private function computePossibilities(int $distance, int $duration): int
    {
        $optionsCount = 0;
        $startCount = false;
        for ($holdingTime = 1; $holdingTime < $duration; $holdingTime++) {
            if ($holdingTime * ($duration - $holdingTime) > $distance) {
                $startCount = true;
                $optionsCount += 1;
            } elseif ($startCount) {
                break;
            }
        }
        return $optionsCount;
    }
}