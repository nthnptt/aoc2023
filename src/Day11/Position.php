<?php
declare(strict_types=1);

namespace AOC\Day11;

readonly class Position {
    public function __construct(
        public int $x,
        public int $y,
    )
    {
    }

    public function distance(Position $target): int
    {
        return abs($target->x - $this->x) + abs($target->y - $this->y);
    }
}