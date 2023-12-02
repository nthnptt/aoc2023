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
        return array_map(fn($day) => self::getDay($day), array_keys(self::days()));
    }

    private
    static function days(): array
    {
        if (!self::$days) {
            require __DIR__ . '/../One/DayOne.php';
            require __DIR__ . '/../Two/DayTwo.php';

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