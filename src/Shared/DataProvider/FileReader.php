<?php

namespace AOC\Shared\DataProvider;

class FileReader implements DataProviderInterface
{
    public function __construct(private string $filename)
    {
        if (!file_exists($this->filename)) {
            throw new \LogicException('File not found');

        }
    }

    public function getLines(): array
    {
        return explode(PHP_EOL, $this->get());
    }

    public function get(): string
    {
        return file_get_contents($this->filename);
    }
}