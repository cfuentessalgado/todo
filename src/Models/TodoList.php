<?php

namespace Cfuentessalgado\Todo\Models;

use Cfuentessalgado\Todo\Support\Collection;

class TodoList extends Collection
{
    public function add(Todo $todo)
    {
        $todo->setId($this->getNextId());
        $this->items[$todo->getId()] = $todo;
    }

    public function getNextId(): int
    {
        return sizeof($this->items) + 1;
    }

    public function getTodo($todoId): mixed
    {
        return $this->filter(fn (Todo $todo) => $todo->getId() == $todoId)->first();
    }

    public function updateTodo(Todo $todo)
    {
        $this->items[$todo->getId()] = $todo;
    }
}
