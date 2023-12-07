<?php
declare(strict_types=1);

namespace AOC\Day02;

class CubeGameParser
{
    public function parse(string $line): CubeGame
    {
        list($gameInformation, $cubeGrabs) = explode(':', $line);
        $id = $this->extractNumber($gameInformation);


        return new CubeGame(
            id: $id,
            setsOfCube: array_map(fn($grabLine) => $this->parseCubeGrab($grabLine), explode(';', $cubeGrabs))
        );
    }

    private function extractNumber(string $text): int
    {
        return (int)filter_var($text, FILTER_SANITIZE_NUMBER_INT);
    }

    private function parseCubeGrab(string $grabLine): SetOfCube
    {
        $red = 0;
        $blue = 0;
        $green = 0;
        $cubes = explode(', ', $grabLine);
        foreach ($cubes as $cube) {
            list($count, $color) = explode(' ', trim($cube));
            $count = (int)$count;
            switch ($color) {
                case 'red':
                    $red += $count;
                    break;
                case 'blue':
                    $blue += $count;
                    break;
                case 'green':
                    $green += $count;
                    break;
                default:
                    throw new \LogicException("Color '$color' not managed");
            }
        }
        return new SetOfCube(
            red: $red,
            blue: $blue,
            green: $green
        );
    }
}