<?php

namespace Cfuentessalgado\Todo\Support;


class Configuration
{
    protected string $driver;
    public string $destination;
    protected array $todolist=[];

    public function __construct(string $driver)
    {
        $this->driver = $driver;
        if ($this->driver === 'serialize' || $this->driver === 'json') {
            $this->destination = getenv('HOME') . '/.todolist.txt';
            if (!file_exists($this->destination)) {
                file_put_contents($this->destination, []);
            }
        }
    }
}
