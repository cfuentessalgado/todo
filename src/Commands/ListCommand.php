<?php

namespace Cfuentessalgado\Todo\Commands;

use Cfuentessalgado\Todo\Commands\Command;

class ListCommand extends Command
{

    public function handle(array $args)
    {
        $todolist = unserialize(file_get_contents($this->config->destination));

        if (!$todolist) {
            return;
        }

        foreach($todolist as $todo) {
            echo $todo.PHP_EOL;
        }
    }
}

