<?php
declare(strict_types=1);

namespace Test\Four;

use AOC\Day04\Card;
use AOC\Day04\CardGameParser;
use PHPUnit\Framework\TestCase;

class CardGameParserTest extends TestCase
{
    public function testParseOneLineShouldWork(): void
    {
        $line = 'Card   1:  9 39 27 89 87 29 54 19 43 45 |  9 80 29 20 54 58 78 77 39 35 76 79 19 87 45 89 23 31 94 34 67 43 56 50 27';
        $expected = [new Card(
            id: 1,
            winningNumbers: [9, 39, 27, 89, 87, 29, 54, 19, 43, 45],
            numbers: [9, 80, 29, 20, 54, 58, 78, 77, 39, 35, 76, 79, 19, 87, 45, 89, 23, 31, 94, 34, 67, 43, 56, 50, 27],
        )];
        $parse = new CardGameParser();
        $result = $parse->parse([$line]);
        self::assertEquals($expected, $result);
    }


    public function testParseMultipleLinesShouldWork(): void
    {
        $lines = [
            'Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53',
            'Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19',
        ];
        $expected = [
            new Card(
                id: 1,
                winningNumbers: [41, 48, 83, 86, 17],
                numbers: [83, 86, 6, 31, 17, 9, 48, 53],
            ),
            new Card(
                id: 2,
                winningNumbers: [13, 32, 20, 16, 61],
                numbers: [61, 30, 68, 82, 17, 32, 24, 19],
            ),
        ];
        $parse = new CardGameParser();
        $result = $parse->parse($lines);
        self::assertEquals($expected, $result);
    }
}