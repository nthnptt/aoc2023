<?php
declare(strict_types=1);

namespace AOC\Five\Dto;

use AOC\Five\Enum\ConvertType;

readonly class AlmanacConvertTable
{
    /**
     * @param ConvertType $type
     * @param array<AlmanacConvertLine> $ranges
     */
    public function __construct(
        public ConvertType $type,
        public array       $ranges
    )
    {
    }

    public function translate(int $number): int
    {
        foreach ($this->ranges as $range) {
            if ($range->isInRange($number)) {
                return $range->translate($number);
            }
        }
        return $number;
    }

}