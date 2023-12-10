<?php
declare(strict_types=1);

namespace AOC\Day08;

use AOC\Shared\AbstractAocDay;
use AOC\Shared\Attribute\AocDay;

#[AocDay(day: 8, fileData: 'data/08.txt')]
class Day08 extends AbstractAocDay
{
    private string $navigationSchema;

    public function partOne(): int
    {
        $nodes = $this->data();
        $step = 0;
        $navigationSchemaSize = strlen($this->navigationSchema);
        $node = 'AAA';
        while ($node != 'ZZZ') {
            list($left, $right) = $nodes[$node];
            $side = $this->navigationSchema[$step % $navigationSchemaSize];
            $node = $side === 'L' ? $left : $right;
            $step++;
        }
        return $step;
    }

    public function partTwo(): mixed
    {
        return '???';
    }

    private function data(): array
    {
        $text = $this->datasetProvider->get();
        list($navigation, $nodesString) = explode(PHP_EOL . PHP_EOL, $text);
        $this->navigationSchema = $navigation;
        $result = [];
        foreach (explode(PHP_EOL, $nodesString) as $nodeString) {
            $nodeString = str_replace([' ', '(', ')'], '', $nodeString);
            list($node, $destinations) = explode('=', $nodeString);
            list($left, $right) = explode(',', $destinations);
            $result[$node] = [$left, $right];
        }
        return $result;
    }
}