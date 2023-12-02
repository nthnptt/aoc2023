<?php
declare(strict_types=1);

namespace AOC\Shared\Attribute;

#[\Attribute(\Attribute::TARGET_CLASS)]
class AocDay
{
    public function __construct(
        public int $day,
        public string $fileData,
    )
    {
    }
}