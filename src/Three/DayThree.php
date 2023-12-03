<?php
declare(strict_types=1);

namespace AOC\Three;

use AOC\Shared\AbstractAocDay;
use AOC\Shared\Attribute\AocDay;

#[AocDay(day: 3, fileData: 'data/three.txt')]
class DayThree extends AbstractAocDay
{
    #[\Override]
    public function partOne(): int
    {
        $parser = new EngineSchemaParser();
        $schema = $parser->parse($this->data());
        return array_reduce(
            $schema->parts,
            function (int $acc, PartEngine $partEngine) {
                return $acc + $partEngine->value;
            },
            0
        );
    }

    #[\Override]
    public function partTwo(): int
    {
        $sum = 0;
        // prepare data
        /** @var array<string, ComputeEngineSchemaDecorator> $schemas */
        $engineAllPositions = [];
        $parser = new EngineSchemaParser();
        $schema = $parser->parse($this->data());
        foreach ($schema->parts as $part) {
            $decoratedPart = new ComputeEngineSchemaDecorator($part);
            foreach ($part->positions() as $position) {
                $engineAllPositions[(string)$position] = $decoratedPart;
            }
        }

        foreach ($schema->gears as $gear) {
            /** @var ComputeEngineSchemaDecorator $firstPart */
            $firstPart = null;
            foreach ($gear->position->getAdjacent() as $position) {
                if (isset($engineAllPositions[(string)$position])) {
                    /** @var ComputeEngineSchemaDecorator $secondPart */
                    $secondPart = $engineAllPositions[(string)$position];
                    if ($firstPart !== null && $firstPart !== $secondPart && !$secondPart->used) {
                        $sum += $firstPart->part->value * $secondPart->part->value;
                        $firstPart->used = true;
                        $secondPart->used = true;
                    } else {
                        $firstPart = $secondPart;
                    }
                }
            }
        }

        return $sum;
    }

    private function data(): array
    {
        return $this->datasetProvider->getLines();
    }
}