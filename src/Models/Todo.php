<?php

namespace Cfuentessalgado\Todo\Models;

class Todo
{
    protected int $id;
    public string $text;
    public bool $done = false;

    public const PENDING = false;
    public const DONE = true;

    public function __construct($text, $done)
    {
        $this->text = $text;
        $this->done = $done;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
