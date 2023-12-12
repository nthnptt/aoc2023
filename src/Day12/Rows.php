<?php

namespace AOC\Day12;

readonly class Rows {
    public function __construct( 
        public string $schemas,
        public array $operationalGroup,
    ) {
    }

    public function arrangementsCount(): int
    {
        $arrangements = $this->arrangements($this->schemas);
        $validArrangements = array_filter($arrangements, fn($schema) => (new Rows($schema, $this->operationalGroup))->isValid());
        return count($validArrangements);
    }

    public function arrangements(string $schemas): array {
        if(strlen($schemas) === 1) {
            return $schemas === '?' ? ['.', '#'] : [$schemas];
        }

        // Optimization, stop recursive if more groupOfOperational than rows
        $groupOfOperational = $this->groupOfOperational($schemas);
        if(count($groupOfOperational) > count($this->operationalGroup)) {
            return [$schemas];
        }

        $first = $schemas[0];
        $others = substr($schemas, 1);

        $otherArrangements = $this->arrangements($others);
        $switchChars = match($first) {
            '.' => ['.'],
            '?' => ['.', '#'],
            '#' => ['#'],
        };

        $result = [];
        foreach($switchChars as $chars) {
            foreach($otherArrangements as $otherArrangement) {
                $result[] = $chars . $otherArrangement;
            }
        }
        return $result;
    }

    public function isValid(): bool {
        $groupOfOperational = $this->groupOfOperational($this->schemas);
        if(count($groupOfOperational) !== count($this->operationalGroup)) {
            return false;
        }

        $isValid = true;
        foreach ($this->operationalGroup as $key => $groupSize) {
            $isValid = $isValid && strlen($groupOfOperational[$key]) === $groupSize;
        }

        return $isValid;
    }

    private function groupOfOperational(string $schemas): array
    {
        $replacePattern = array('/[.]{1,}/', '/^\./', '/\.$/');
        $replaceChar = array('.', '', '');
        return explode('.', preg_replace($replacePattern, $replaceChar, $schemas));
    }

}