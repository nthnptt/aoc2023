<?php
declare(strict_types=1);

namespace AOC\Four;

readonly class Card
{
    public function __construct(
        public int $id,
        public array $winningNumbers,
        public array $numbers,
    )
    {
    }

    public function numberInWinningNumbers(): array
    {
        return array_intersect($this->numbers, $this->winningNumbers);
    }
}