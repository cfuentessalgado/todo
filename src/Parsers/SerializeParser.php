<?php

namespace Cfuentessalgado\Todo\Parsers;

use Cfuentessalgado\Todo\Models\TodoList;

class SerializeParser extends Parser
{

    public function write(TodoList $todolist)
    {
        file_put_contents($this->configuration->destination, serialize($todolist));
    }

    public function parse() : TodoList
    {
        return unserialize(file_get_contents($this->configuration->destination));
    }
}
