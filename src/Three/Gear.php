<?php
declare(strict_types=1);

namespace AOC\Three;

readonly class Gear
{
    public function __construct(
        public SchemaPosition $position,
    )
    {
    }

}