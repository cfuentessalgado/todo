<?php

namespace Cfuentessalgado\Todo\Commands;

use Cfuentessalgado\Todo\Parsers\Parser;
use Cfuentessalgado\Todo\Support\Configuration;

abstract class Command
{
    protected Configuration $config;
    public Parser $parser;
    public function __construct(Configuration $config)
    {
        $this->config = $config;
        $this->parser = $config->getParser();
    }
    abstract public function handle(array $args);
}
