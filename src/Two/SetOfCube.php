<?php

namespace AOC\Two;

readonly class SetOfCube
{
    public function __construct(
        public int $red,
        public int $blue,
        public int $green,
    )
    {
    }

    public function power(): int
    {
        return $this->red * $this->blue * $this->green;
    }
}