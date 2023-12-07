<?php
declare(strict_types=1);

namespace AOC\Day03;

readonly class Gear
{
    public function __construct(
        public SchemaPosition $position,
    )
    {
    }

}