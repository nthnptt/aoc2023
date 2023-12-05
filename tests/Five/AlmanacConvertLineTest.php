<?php
declare(strict_types=1);

namespace Test\Five;

use AOC\Five\Dto\AlmanacConvertLine;
use PHPUnit\Framework\TestCase;

class AlmanacConvertLineTest extends TestCase
{
    public function testIsInRange(): void
    {
        $range = new AlmanacConvertLine(50, 98, 2);
        self::assertFalse($range->isInRange(75));
        self::assertFalse($range->isInRange(1));
        self::assertTrue($range->isInRange(99));
        self::assertTrue($range->isInRange(98));
        self::assertFalse($range->isInRange(100));
    }

    public function testTranslate(): void
    {
        $range = new AlmanacConvertLine(52, 50, 48);
        self::assertEquals(55, $range->translate(53));
        $range = new AlmanacConvertLine(50, 98, 2);
        self::assertEquals(50, $range->translate(98));
        self::assertEquals(51, $range->translate(99));
        $this->expectException(\LogicException::class);
        $result = $range->translate(100);
    }
}