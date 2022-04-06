<?php

namespace Cfuentessalgado\Todo\Parsers;

use Cfuentessalgado\Todo\Models\TodoList;
use Cfuentessalgado\Todo\Support\Configuration;

abstract class Parser
{
    protected Configuration $configuration;
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }
    abstract public function parse(): TodoList;
    abstract public function write(TodoList $todolist);
}
