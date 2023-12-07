<?php
declare(strict_types=1);

namespace AOC\Day07;

readonly class Hand implements \Stringable
{
    public HandType $type;

    public function __construct(
        public string $hands
    )
    {
        if (strlen($this->hands) !== 5) {
            throw new \LogicException('Can\'t parse hands');
        }
        $numberOfCardByType = $this->getNumberOfCardByType();
        $this->type = $this->determineType($numberOfCardByType);
    }

    public function score(): int
    {
        $translator = $this->cardToValueTranslator();
        $value = str_replace(array_keys($translator), array_values($translator), $this->hands);
        return hexdec($this->type->value . $value);

    }

    public function __toString(): string
    {
        return $this->hands . ' -> ' . $this->type->name . ' (' . $this->score() . ') ';
    }

    protected function getNumberOfCardByType(): array
    {
        $cards = str_split($this->hands);
        $numberOfCardByType = [];
        foreach ($cards as $card) {
            $numberOfCardByType[$card] = isset($numberOfCardByType[$card]) ? $numberOfCardByType[$card] + 1 : 1;
        }
        return $numberOfCardByType;
    }

    private function determineType(array $numberOfCardByType): HandType
    {
        $maxCount = max($numberOfCardByType);
        if ($maxCount === 2) {
            $numberOfCardByType = array_filter($numberOfCardByType, fn(int $value) => $value === $maxCount);
            $type = count($numberOfCardByType) === 2 ? HandType::TWO_PAIR : HandType::ONE_PAIR;
        } elseif ($maxCount === 3) {
            $type = in_array(2, $numberOfCardByType) ? HandType::FULL_HOUSE : HandType::THREE_OF_A_KIND;
        } elseif ($maxCount === 4) {
            $type = HandType::FOUR_OF_KIND;
        } elseif ($maxCount === 5) {
            $type = HandType::FIVE_OF_KIND;
        } else {
            $type = HandType::HIGH;
        }
        return $type;
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
            'J' => 'A',
        ];
    }

}