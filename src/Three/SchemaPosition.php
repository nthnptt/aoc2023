<?php
declare(strict_types=1);

namespace AOC\Three;

readonly class SchemaPosition
{
    public function __construct(
        public int $x,
        public int $y
    )
    {
    }

    public function getAdjacent(): array
    {
        return [
            // top
            new SchemaPosition($this->x - 1, $this->y - 1),
            new SchemaPosition($this->x, $this->y - 1),
            new SchemaPosition($this->x + 1, $this->y - 1),
            //left/right
            new SchemaPosition($this->x - 1, $this->y),
            new SchemaPosition($this->x + 1, $this->y),
            // bottom
            new SchemaPosition($this->x - 1, $this->y + 1),
            new SchemaPosition($this->x, $this->y + 1),
            new SchemaPosition($this->x + 1, $this->y + 1),
        ];
    }

    public function __toString(): string
    {
        return "($this->x,$this->y)";
    }

}