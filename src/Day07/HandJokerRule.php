<?php
declare(strict_types=1);

namespace AOC\Day07;

readonly class HandJokerRule extends Hand
{
    protected function getNumberOfCardByType(): array
    {
        if($this->hands === 'JJJJJ') {
            return ['J' => 5];
        }
        $cards = str_split($this->hands);
        $numberOfCardByType = [];
        foreach ($cards as $card) {
            $numberOfCardByType[$card] = isset($numberOfCardByType[$card]) ? $numberOfCardByType[$card] + 1 : 1;
        }
        $numberOfJoker = $numberOfCardByType['J'] ?? 0;
        unset($numberOfCardByType['J']);
        rsort($numberOfCardByType);
        print_r($numberOfCardByType);
        $numberOfCardByType[0] += $numberOfJoker;
        return $numberOfCardByType;
    }

    protected function cardToValueTranslator(): array
    {
        return [
            '2' => '1',
            '3' => '2',
            '4' => '3',
            '5' => '4',
            '6' => '5',
            '7' => '6',
            '8' => '7',
            '9' => '8',
            'T' => '9',
            'Q' => 'B',
            'K' => 'C',
            'A' => 'D',
            'J' => '0',
        ];
    }

}