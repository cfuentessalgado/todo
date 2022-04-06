<?php

namespace Cfuentessalgado\Todo\Models;

use Cfuentessalgado\Todo\Support\Collection;

class TodoList extends Collection
{
    protected array $todos = [];


    public function add(Todo $todo)
    {
        $todo->setId($this->getNextId());
        $this->todos[] = $todo;
    }

    public function getNextId(): int
    {
        return sizeof($this->todos) + 1;
    }
}
