<?php

namespace Cfuentessalgado\Todo\Commands;

use Cfuentessalgado\Todo\Commands\Command;

class AddCommand extends Command
{

    public function handle(array $args)
    {
        $todolist = unserialize(file_get_contents($this->config->destination));

        if (!$todolist) {
            $todolist = [];
        }
        $todolist[] = $args[2];

        file_put_contents($this->config->destination, serialize($todolist));
    }
}
