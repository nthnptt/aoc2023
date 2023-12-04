<?php
declare(strict_types=1);

namespace Test\Four;

use AOC\Four\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function testNumberInWinningNumbersShouldWork(): void
    {
        $expected = [1, 13, 69];
        $card = new Card(
           id: 1,
            winningNumbers: [1, 54, 65, 9, 13, 4, 13, 69],
            numbers: [23, 1, 13, 43, 12, 69],
        );
        foreach ($expected as $number) {
            self::assertContains($number, $card->numberInWinningNumbers());
        }
    }

    public function testNoNumberInWinningNumbersShouldWork(): void
    {
        $card = new Card(
            id: 1,
            winningNumbers: [54, 65, 9, 3, 4, 13, 69],
            numbers: [23, 1, 43, 12, 6],
        );
        self::assertEquals([], $card->numberInWinningNumbers());
    }
}