<?php
declare(strict_types=1);

namespace AOC\Day03;

class ComputeEngineSchemaDecorator
{
    public bool $used = false;
    public function __construct(
        readonly public PartEngine $part,
    )
    {
    }
}