<?php

namespace Cfuentessalgado\Todo\Commands;

use Cfuentessalgado\Todo\Commands\Command;

class ListCommand extends Command
{

    public function handle(array $args)
    {
        $todolist = $this->parser->parse($this->config);

        foreach ($todolist as $todo) {
            if ($todo->done) {
                continue;
            }
            echo '[' . $todo->getId() . '] ' . $todo->text . PHP_EOL;
        }
    }
}
