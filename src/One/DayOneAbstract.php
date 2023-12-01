<?php

namespace AOC\One;

use AOC\Shared\AbstractAocDay;

class DayOneAbstract extends AbstractAocDay
{
    public function partOne(): int
    {
        $result = 0;
        foreach ($this->data() as $data) {
            $result += $this->sumFirstAndLastNumber($data);
        }
        return $result;
    }

    public function partTwo(): int
    {
        $digits = ['one1one', 'two2two', 'three3three', 'four4four', 'five5five', 'six6six', 'seven7seven', 'eight8eight', 'nine9nine'];
        $digitsLettered = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        $result = 0;
        foreach ($this->data() as $data) {
            $line = str_replace($digitsLettered, $digits, $data);
            $sum = $this->sumFirstAndLastNumber($line);
            $result += $sum;
        }
        return $result;
    }

    private function data(): array
    {
        return $this->datasetProvider->getLines();
    }

    private function sumFirstAndLastNumber(string $line): int
    {
        $numbers = preg_replace('/[A-Za-z]*/', '', $line);
        $first = $numbers[0];
        $end = $numbers[strlen($numbers) - 1];
        return (int)($first . $end);

    }

    public function test(): bool
    {
        return true;
    }
}