<?php

namespace Cfuentessalgado\Todo;

use Cfuentessalgado\Todo\Support\CommandRegistry;


class App
{
    protected string $driver;
    protected array $commands;
    protected array $args;
    public function __construct($driver = 'json')
    {
        $this->driver = $driver;
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

        $command = new $this->commands[$commandName]();
        $command->handle();
    }

    protected function registerCommands()
    {
        $this->commands = CommandRegistry::generate();
    }
}
