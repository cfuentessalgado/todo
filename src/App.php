<?php

namespace Cfuentessalgado\Todo;

use Cfuentessalgado\Todo\Support\CommandRegistry;
use Cfuentessalgado\Todo\Support\Configuration;

class App
{
    protected array $commands;
    protected array $args;
    protected Configuration $config;
    public function __construct($driver = 'serialize')
    {
        $this->config = new Configuration($driver);
    }

    public function run()
    {
        $this->registerCommands();
        $this->getArgs();
        $this->handleArgs();
    }

    protected function getArgs()
    {
        global $argv;
        $this->args = $argv;
    }

    protected function handleArgs()
    {
        $commandName = $this->args[1];

        $command = new $this->commands[$commandName]($this->config);
        $command->handle($this->args);
    }

    protected function registerCommands()
    {
        $this->commands = CommandRegistry::generate();
    }
}
