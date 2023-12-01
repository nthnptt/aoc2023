<?php

namespace AOC\Shared\DataProvider;

class FileReader implements DataProviderInterface
{
    public function __construct(private string $filename)
    {
    }

    public function getLines(): array
    {
        return explode(PHP_EOL, $this->getData());
    }

    private function getData(): string
    {
        return file_get_contents($this->filename);
    }
}