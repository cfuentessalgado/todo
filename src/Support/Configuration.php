<?php

namespace Cfuentessalgado\Todo\Support;

use Cfuentessalgado\Todo\Models\TodoList;
use Cfuentessalgado\Todo\Parsers\Parser;
use Cfuentessalgado\Todo\Parsers\SerializeParser;

class Configuration
{
    protected string $driver;
    public string $destination;
    protected array $todolist=[];
    protected array $parsers = [
        'serialize' => SerializeParser::class,
    ];

    public function __construct(string $driver)
    {
        $this->driver = $driver;
        if ($this->driver === 'serialize' || $this->driver === 'json') {
            $this->destination = getenv('HOME') . '/.todolist.txt';
            if (!file_exists($this->destination)) {
                file_put_contents($this->destination, serialize(new TodoList()));
            }
        }
    }

    public function getParser() : Parser
    {
        return new $this->parsers[$this->driver]($this);
    }
}
