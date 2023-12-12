<?php
declare(strict_types=1);

namespace AOC\Day12;

use AOC\Shared\Attribute\AocDay;
use AOC\Shared\AbstractAocDay;

#[AocDay(day: 12, fileData: 'data/12.txt')]
class Day12 extends AbstractAocDay {

    #[\Override]
    public function partOne(): int
    {
        $rows = array_map(function (string $line) {
            list($schema, $operationnalGroupString) = explode(' ', $line);
            $operationnalGroup = array_map(fn (string $char) => (int) $char, explode(',', $operationnalGroupString));
            return new Rows($schema, $operationnalGroup);
        }, $this->data());
        $arrangementsCounts = array_map(fn(Rows $r) => $r->arrangementsCount(), $rows);
        return array_sum($arrangementsCounts);
    }

    #[\Override]
    public function partTwo(): mixed
    {
        return '???';
        $rows = array_map(function (string $line) {
            list($schema, $operationnalGroupString) = explode(' ', $line);
            $operationnalGroup = array_map(fn (string $char) => (int) $char, explode(',', str_repeat($operationnalGroupString, 5)));
            return new Rows(str_repeat($schema, 5), $operationnalGroup);
        }, $this->data());
        $arrangementsCounts = array_map(fn(Rows $r) => $r->arrangementsCount(), $rows);
        return array_sum($arrangementsCounts);
    }

    private function data(): array
    {
        return $this->datasetProvider->getLines();
    }
}