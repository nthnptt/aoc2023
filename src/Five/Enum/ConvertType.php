<?php
declare(strict_types=1);

namespace AOC\Five\Enum;

enum ConvertType
{
    case SEED_TO_SOIL;
    case SOIL_TO_FERTILIZER;
    case FERTILIZER_TO_WATER;
    case WATER_TO_LIGHT;
    case LIGHT_TO_TEMPERATURE;
    case TEMPERATURE_TO_HUMIDITY;
    case HUMIDITY_TO_LOCATION;
}