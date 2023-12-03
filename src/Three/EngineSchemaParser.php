<?php
declare(strict_types=1);

namespace AOC\Three;

class EngineSchemaParser
{
    /**
     * @param array<string> $lines
     * @return EngineSchema
     */
    public function parse(array $lines): EngineSchema
    {
        $gears = [];
        $partEngineList = [];
        $maxY = count($lines);
        $maxX = strlen($lines[0]);
        foreach ($lines as $y => $line) {
            $number = '';
            $hasAdjacentSpecialChar = false;
            foreach (str_split($line) as $x => $char) {
                $isNumber = preg_match('/[0-9]/', $char) !== 0;
                if (!$isNumber) {
                    if ($char === '*') {
                        $position = new SchemaPosition($x, $y);
                        $gears[(string)$position] = new Gear($position);
                    }
                    continue;
                }
                $adjacent = [
                    [$x - 1, $y - 1], [$x, $y - 1], [$x + 1, $y - 1],
                    [$x - 1, $y], [$x + 1, $y],
                    [$x - 1, $y + 1], [$x, $y + 1], [$x + 1, $y + 1],
                ];
                $number .= $char;
                if (isset($line[$x + 1])) {
                    $nextIsNumber = preg_match('/[0-9]/', $line[$x + 1]) !== 0;
                } else {
                    $nextIsNumber = false;
                }
                foreach ($adjacent as list($adjacentX, $adjacentY)) {
                    $coordinateExist = $adjacentX >= 0 && $adjacentX < $maxX
                        && $adjacentY >= 0 && $adjacentY < $maxY;
                    if ($coordinateExist) {
                        $adjacentValue = $lines[$adjacentY][$adjacentX];
                        $isSpecialChar = preg_match('/[0-9]/', $adjacentValue) === 0
                            && $adjacentValue !== '.';
                        if ($isSpecialChar) {
                            $hasAdjacentSpecialChar = true;
                        }
                    }
                }
                if (!$nextIsNumber) {
                    if ($number !== '' && $hasAdjacentSpecialChar) {
                        $partEngineList[] = new PartEngine((int)$number, new SchemaPosition(x: $x - (strlen($number) - 1), y: $y));
                    }
                    $number = '';
                    $hasAdjacentSpecialChar = false;
                }
            }
        }

        return new EngineSchema($partEngineList, $gears);
    }
}