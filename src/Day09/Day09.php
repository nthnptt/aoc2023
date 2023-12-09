<?php
declare(strict_types=1);

namespace AOC\Day09;

use AOC\Shared\AbstractAocDay;
use AOC\Shared\Attribute\AocDay;

#[AocDay(day: 9, fileData: 'data/09.txt')]
class Day09 extends AbstractAocDay
{

    #[\Override]
    public function partOne(): int
    {
        $histories = $this->data();
        return array_reduce($histories, fn(int $acc, History $history) => $acc + $history->next(), 0);
    }

    #[\Override]
    public function partTwo(): mixed
    {
        $histories = $this->data();
        return array_reduce($histories, fn(int $acc, History $history) => $acc + $history->before(), 0);
    }

    /**
     * @return array<History>
     */
    public function data(): array
    {
        $lines = $this->datasetProvider->getLines();
        $result = [];
        foreach ($lines as $line) {
            $valuesStr = explode(' ', trim($line));
            $valuesInt = array_map(fn($valueStr) => (int)$valueStr, $valuesStr);
            $result[] = new History($valuesInt);
        }
        return $result;
    }
}