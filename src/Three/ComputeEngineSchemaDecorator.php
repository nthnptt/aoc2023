<?php
declare(strict_types=1);

namespace AOC\Three;

class ComputeEngineSchemaDecorator
{
    public bool $used = false;
    public function __construct(
        readonly public PartEngine $part,
    )
    {
    }
}