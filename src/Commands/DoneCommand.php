<?php

namespace Cfuentessalgado\Todo\Commands;

use Cfuentessalgado\Todo\Commands\Command;

class DoneCommand extends Command
{

    public function handle(array $args)
    {
        if (sizeof($args) < 3) {
            return;
        }
        $todolist = $this->parser->parse();
        $todo = $todolist->getTodo($args[2]);
        if (!$todo) {
            return;
        }
        $todo->complete();
        $todolist->updateTodo($todo);
        $this->parser->write($todolist);
    }
}
