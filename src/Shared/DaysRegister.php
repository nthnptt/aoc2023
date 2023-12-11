<?php
declare(strict_types=1);

namespace AOC\Shared;

use AOC\Shared\Attribute\AocDay;
use AOC\Shared\DataProvider\FileReader;
use ReflectionClass;

class DaysRegister
{
    static ?array $days = null;

    public static function count(): int
    {
        return count(self::$days);
    }

    public static function getDay(int $number, string $overrideFilename = null): AbstractAocDay
    {
        $day = self::days()[$number];
        /** @var AbstractAocDay $aocDay */
        $aocDay = new $day[0](new FileReader($overrideFilename ?? $day[1]));
        return $aocDay;
    }

    public static function lastDayNumber(): int
    {
        return (int)array_key_last(self::days());
    }

    /**
     * @return array<AbstractAocDay>
     */
    public static function getDays(): array
    {
        $keys = array_keys(self::days());
        $days = array_map(fn($day) => self::getDay($day), $keys);
        return array_combine($keys, $days);
    }

    private
    static function days(): array
    {
        if (!self::$days) {
            require __DIR__ . '/../Day01/Day01.php';
            require __DIR__ . '/../Day02/Day02.php';
            require __DIR__ . '/../Day03/Day03.php';
            require __DIR__ . '/../Day04/Day04.php';
            require __DIR__ . '/../Day05/Day05.php';
            require __DIR__ . '/../Day06/Day06.php';
            require __DIR__ . '/../Day07/Day07.php';
            require __DIR__ . '/../Day08/Day08.php';
            require __DIR__ . '/../Day09/Day09.php';
            require __DIR__ . '/../Day11/Day11.php';

            self::$days = [];
            foreach (get_declared_classes() as $class) {
                $reflexionClass = new ReflectionClass($class);
                $attributes = $reflexionClass->getAttributes(AocDay::class);
                if (count($attributes) === 1) {
                    $attr = $attributes[0];
                    $args = $attr->getArguments();
                    $day = $args['day'];
                    $fileData = $args['fileData'];
                    $result = [$class, $fileData];
                    self::$days[$day] = $result;
                }
            }
            ksort(self::$days);
        }
        return self::$days;
    }
}