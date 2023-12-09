<?php
declare(strict_types=1);

namespace AOC\Day09;

readonly class History
{
    public function __construct(
        public array $values
    )
    {
    }

    public function next(): int
    {
        $valueCount = array_count_values($this->values);
        if (isset($valueCount[0]) && $valueCount[0] === count($this->values)) {
            return 0;
        }

        $nextHistoryValue = [];
        for ($i = 1; $i < count($this->values); $i++) {
            $nextHistoryValue[] = $this->values[$i] - $this->values[$i - 1];
        }
        return $this->values[count($this->values) - 1] + (new History($nextHistoryValue))->next();
    }

    public function before(): int
    {
        $valueCount = array_count_values($this->values);
        if (isset($valueCount[0]) && $valueCount[0] === count($this->values)) {
            return 0;
        }

        $nextHistoryValue = [];
        for ($i = 1; $i < count($this->values); $i++) {
            $nextHistoryValue[] = $this->values[$i] - $this->values[$i - 1];
        }
        return $this->values[0] - (new History($nextHistoryValue))->before();
    }
}