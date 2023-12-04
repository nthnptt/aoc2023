<?php
declare(strict_types=1);

namespace AOC\Four;

class CardGameParser
{
    /**
     * @param array<string> $lines
     * @return array<Card>
     */
    public function parse(array $lines): array
    {
        return array_map(fn($line) => $this->parseLine($line), $lines);
    }

    private function parseLine(string $line): Card
    {
        list($game, $numbers) = explode(':', $line);
        list($winningNumbersStr, $numbersStr) = explode('|', $numbers);
        $winningNumbersStr = preg_replace('/\s+/', ',', trim($winningNumbersStr));
        $winningNumbers = explode(',', $winningNumbersStr);
        $numbersStr = preg_replace('/\s+/', ',', trim($numbersStr));
        $numbers = explode(',', $numbersStr);
        $gameId = (int)filter_var($game, FILTER_SANITIZE_NUMBER_INT);
        $winningNumbers = array_map(fn(string $n) => (int)filter_var($n, FILTER_SANITIZE_NUMBER_INT), $winningNumbers);
        $numbers = array_map(fn(string $n) => (int)filter_var($n, FILTER_SANITIZE_NUMBER_INT), $numbers);
        return new Card($gameId, $winningNumbers, $numbers);

    }
}