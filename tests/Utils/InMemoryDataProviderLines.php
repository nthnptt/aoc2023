<?php
declare(strict_types=1);

namespace Test\Utils;

use AOC\Shared\DataProvider\DataProviderInterface;

class InMemoryDataProviderLines implements DataProviderInterface
{
    public function __construct(
        private array $data
    )
    {
    }

    public function getLines(): array
    {
        return $this->data;
    }
}