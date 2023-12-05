<?php
declare(strict_types=1);

namespace Test\Utils;

use AOC\Shared\DataProvider\DataProviderInterface;

class InMemoryDataProviderText implements DataProviderInterface
{
    public function __construct(
        private string $test
    )
    {
    }

    public function getLines(): array
    {
        return [];
    }

    public function get(): string
    {
        return $this->test;
    }
}