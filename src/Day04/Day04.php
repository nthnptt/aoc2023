<?php
declare(strict_types=1);

namespace AOC\Day04;

use AOC\Shared\AbstractAocDay;
use AOC\Shared\Attribute\AocDay;


#[AocDay(day: 4, fileData: 'data/04.txt')]
class Day04 extends AbstractAocDay
{
    private array $cardCopy;

    #[\Override]
    public function partOne(): int
    {
        $data = $this->data();
        $score = 0;
        foreach ($data as $card) {
            $winnings = $card->numberInWinningNumbers();
            $score += (int)2 ** (count($winnings) - 1);
        }
        return $score;
    }

    #[\Override]
    public function partTwo(): int
    {
        $data = $this->data();
        foreach ($data as $card) {
            if (!isset($this->cardCopy[$card->id])) {
                $this->cardCopy[$card->id] = 1;
            }
            $copyForCard = $this->cardCopy[$card->id];
            for ($i = 0; $i < $copyForCard; $i++) {
                $winnings = $card->numberInWinningNumbers();
                for ($k = $card->id + 1; $k <= $card->id + count($winnings); $k++) {
                    $copyForId = $this->cardCopy[$k] ?? 1;
                    $this->cardCopy[$k] = $copyForId + 1;
                }
            }
        }
        return array_reduce($this->cardCopy, function (int $acc, int $copyNumber) {
            return $acc + $copyNumber;
        }, 0);
    }

    /**
     * @return array<Card>
     */
    private function data(): array
    {
        $parser = new CardGameParser();
        return $parser->parse($this->datasetProvider->getLines());
    }
}