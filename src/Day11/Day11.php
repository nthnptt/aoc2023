<?php
declare(strict_types=1);

namespace AOC\Day11;

use AOC\Shared\Attribute\AocDay;
use AOC\Shared\AbstractAocDay;

#[AocDay(day: 11, fileData: 'data/11.txt')]
class Day11 extends AbstractAocDay {
    private array $expandedX;
    private array $expandedY;

    #[\Override]
    public function partOne(): int
    {
        $data = $this->data(expansion: 2);
        $pairs = $this->generatePairs($data);
        return $this->computeSumOfDistance($pairs);
    }

    #[\Override]
    public function partTwo(): mixed
    {
        $data = $this->data(expansion: 1_000_000);
        $pairs = $this->generatePairs($data);
        return $this->computeSumOfDistance($pairs);
    }

    private function data(int $expansion): array
    {
        $this->expandedX = [];
        $this->expandedY = [];
        $lines = $this->datasetProvider->getLines();
        $expanded = [];

        $chars = array_map(fn ($line) => str_split($line), $lines);
        for($x=0; $x < count($chars[0]); $x++) {
            $noGalaxy = true;
            for($y=0; $y < count($chars); $y++) {
                if($chars[$y][$x] === '#') {
                    $noGalaxy=false;
                }
            }
            if($noGalaxy) {
                $this->expandedX[] = $x;
            }
        }
        $lines = array_map(fn($char) => implode($char), $chars);
        foreach($lines as $y => $line) {
            if(preg_match('/^\.*$/', $line)) {
                $this->expandedY[] = $y;
            }
            $expanded[] = $line;
        }
        
        $result = [];
        foreach($expanded as $y => $line) {
            foreach(str_split($line) as $x => $char) {
                if($char === '#') {
                    $expandedXForPosition = count(array_filter($this->expandedX, fn(int $pos) => $pos < $x));
                    $expandedYForPosition = count(array_filter($this->expandedY, fn(int $pos) => $pos < $y));
                    $result[] = new Position(
                        x: $x - $expandedXForPosition + $expandedXForPosition * $expansion,
                        y: $y - $expandedYForPosition + $expandedYForPosition * $expansion,
                    );
                }
            }
        };
        return $result;
    }

    /**
     * @var array<Position> $position
     * @return array<[Position, Position]>
     */
    private function generatePairs(array $positions): array
    {
        $pairs = [];
        for($i=0; $i < count($positions); $i++) {
            for($j=$i+1; $j < count($positions); $j++) {
                $pairs[] = [$positions[$i], $positions[$j]];
            }
        }
        return $pairs;
    }

    /**
     * @var array<[Position, Position]>
     * @return int
     */
    private function computeSumOfDistance(array $positions): int
    {
        return array_sum(array_map(fn(array $pair) => $pair[0]->distance($pair[1]), $positions));
    }
}