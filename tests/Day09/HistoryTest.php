<?php
declare(strict_types=1);

namespace Day09;

use AOC\Day09\History;
use PHPUnit\Framework\TestCase;

class HistoryTest extends TestCase
{
    public function testNextShouldWork(): void
    {
        $dataset = [
            [new History([0, 3, 6, 9, 12, 15]), 18],
            [new History([1, 3, 6, 10, 15, 21]), 28],
            [new History([10, 13, 16, 21, 30, 45]), 68],
        ];

        foreach ($dataset as list($subject, $expected)) {
            /** @var History $subject */
            self::assertEquals($expected, $subject->next());
        }
    }

    public function testBeforeShouldWork(): void
    {
        $dataset = [
            [new History([0, 3, 6, 9, 12, 15]), -3],
            [new History([1, 3, 6, 10, 15, 21]), 0],
            [new History([10, 13, 16, 21, 30, 45]), 5],
        ];

        foreach ($dataset as list($subject, $expected)) {
            /** @var History $subject */
            self::assertEquals($expected, $subject->before());
        }
    }
}