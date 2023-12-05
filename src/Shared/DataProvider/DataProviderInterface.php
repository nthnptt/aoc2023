<?php

namespace AOC\Shared\DataProvider;

interface DataProviderInterface
{
    public function getLines(): array;
    public function get(): string;
}