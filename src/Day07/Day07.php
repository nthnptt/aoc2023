<?php
declare(strict_types=1);

namespace AOC\Day07;

use AOC\Shared\AbstractAocDay;
use AOC\Shared\Attribute\AocDay;

#[AocDay(day: 7, fileData: 'data/07.txt')]
class Day07 extends AbstractAocDay
{

    #[\Override]
    public function partOne(): int
    {
        $rounds = array_map(function (string $line) {
            list($hand, $bid) = explode(' ', $line);
            return [new Hand($hand), (int)$bid];
        }, $this->data());
        return $this->getScore($rounds);
    }

    #[\Override]
    public function partTwo(): mixed
    {
        $rounds = array_map(function (string $line) {
            list($hand, $bid) = explode(' ', $line);
            return [new HandJokerRule($hand), (int)$bid];
        }, $this->data());
        return $this->getScore($rounds);
    }

    private function data(): array
    {
        return $this->datasetProvider->getLines();
    }

    private function getScore(array $rounds): int {
        $scores = array_map(function (array $round) {
            /** @var $hand Hand */
            list($hand,) = $round;
            return $hand->score();
        }, $rounds);

        array_multisort($scores, $rounds);
        $result = 0;
        foreach ($rounds as $rank => list($hand ,$bet)) {
            print_r($hand . PHP_EOL);
            $result += $bet * ($rank + 1);
        }
        return $result;
    }
}