<?php

namespace Cfuentessalgado\Todo\Support;

use Cfuentessalgado\Todo\Commands\AddCommand;
use Cfuentessalgado\Todo\Commands\DoneCommand;
use Cfuentessalgado\Todo\Commands\ListCommand;

class CommandRegistry
{
    public static function generate()
    {
        return [
            'add' => AddCommand::class,
            'list' => ListCommand::class,
            'done' => DoneCommand::class,
        ];
    }
}
