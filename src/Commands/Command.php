<?php

namespace Cfuentessalgado\Todo\Commands;

use Cfuentessalgado\Todo\Support\Configuration;

abstract class Command
{
    protected Configuration $config;
    public function __construct(Configuration $config)
    {
        $this->config = $config;
    }
    abstract public function handle(array $args);
}
