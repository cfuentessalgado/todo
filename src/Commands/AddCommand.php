<?php

namespace Cfuentessalgado\Todo\Commands;

use Cfuentessalgado\Todo\Commands\Command;
use Cfuentessalgado\Todo\Models\Todo;

class AddCommand extends Command
{

    public function handle(array $args)
    {
        $todolist = $this->parser->parse();
        $text  = $args[2];
        $todo = new Todo($text, Todo::PENDING);
        $todolist->add($todo);

        $this->parser->write($todolist);
    }
}
