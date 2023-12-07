<?php
declare(strict_types=1);

namespace AOC\Day05\Dto;

use AOC\Day05\Enum\ConvertType;

readonly class Almanac
{
    /**
     * @param array<int> $seeds
     * @param array<ConvertType, AlmanacConvertTable> $tables
     */
    public function __construct(
        public array $seeds,
        public array $tables,
    )
    {
    }

    /**
     * @return array<int>
     */
    public function seedsLocations(): array
    {
        return array_map(function (int $seed) {
            $tempSeed = $seed;
            foreach ($this->tables as $table) {
                $tempSeed = $table->translate($tempSeed);
            }
            return $tempSeed;
        }, $this->seeds);

    }


}