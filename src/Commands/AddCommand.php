<?php

namespace Cfuentessalgado\Todo\Commands;

use Cfuentessalgado\Todo\Commands\Command;

class AddCommand implements Command
{

    public function handle()
    {
        echo "adding".PHP_EOL;
    }
}
