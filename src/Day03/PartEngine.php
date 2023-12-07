<?php
declare(strict_types=1);

namespace AOC\Day03;

readonly class PartEngine
{
    public function __construct(
        public int            $value,
        public SchemaPosition $position,
    )
    {
    }

    /**
     * @return array<SchemaPosition>
     */
    public function positions(): array
    {
        $length = strlen((string)$this->value);
        $result = [clone $this->position];
        for ($i = 1; $i < $length; $i++) {
            $result[] = new SchemaPosition($this->position->x + $i, $this->position->y);
        }
        return $result;
    }
}