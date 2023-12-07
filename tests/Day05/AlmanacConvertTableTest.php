<?php
declare(strict_types=1);

namespace Test\Five;

use AOC\Day05\Dto\AlmanacConvertLine;
use AOC\Day05\Dto\AlmanacConvertTable;
use AOC\Day05\Enum\ConvertType;
use PHPUnit\Framework\TestCase;

class AlmanacConvertTableTest extends TestCase
{
    public function testTranslate(): void
    {
        $table = new AlmanacConvertTable(
            type: ConvertType::FERTILIZER_TO_WATER,
            ranges: [
                new AlmanacConvertLine(50, 98, 2),
                new AlmanacConvertLine(52, 50, 48),
            ],
        );
        self::assertEquals(50, $table->translate(98));
        self::assertEquals(51, $table->translate(99));
        self::assertEquals(55, $table->translate(53));
        self::assertEquals(62, $table->translate(60));
        self::assertEquals(10, $table->translate(10));
    }
}