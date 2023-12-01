<?php

namespace AOC\Shared;

use AOC\Shared\DataProvider\DataProviderInterface;

abstract class AbstractAocDay
{
    final public function __construct(
        protected DataProviderInterface $datasetProvider
    )
    {
    }

    abstract public function partOne(): mixed;

    abstract public function partTwo(): mixed;
}