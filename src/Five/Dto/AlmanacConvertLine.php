<?php
declare(strict_types=1);

namespace AOC\Five\Dto;

readonly class AlmanacConvertLine
{
    public function __construct(
        public int $destination,
        public int $source,
        public int $length,
    )
    {
    }

    public function isInRange(int $number): bool
    {
        return $number >= $this->source && $number < $this->source + $this->length;
    }

    public function translate(int $initial): int
    {
        if (!$this->isInRange($initial)) {
            throw new \LogicException('Number can\'t be translate' . $initial . 'out of range.');
        }
        return $this->destination + $initial - $this->source;
    }
}