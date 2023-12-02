<?php

namespace AOC\Two;

readonly class CubeGame
{
    /**
     * @param int $id
     * @param array<SetOfCube> $setsOfCube
     */
    public function __construct(
        public int   $id,
        public array $setsOfCube,
    )
    {
    }

    public function getFewestNumberOfCube(): SetOfCube
    {
        $red = 0;
        $blue = 0;
        $green = 0;
        foreach ($this->setsOfCube as $set) {
            if($set->blue > $blue) {
                $blue = $set->blue;
            }
            if($set->red > $red) {
                $red = $set->red;
            }
            if($set->green > $green) {
                $green = $set->green;
            }
        }
        return new SetOfCube(red: $red, blue: $blue, green: $green);
    }
}