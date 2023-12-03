<?php
declare(strict_types=1);

namespace AOC\Three;

readonly class EngineSchema
{
    /**
     * @param array<PartEngine> $parts
     * @param array<Gear> $gears
     */
    public function __construct(
        public array $parts = [],
        public array $gears = [],
    )
    {
    }
}