<?php

namespace Cfuentessalgado\Todo\Support;

use ArrayAccess;
use IteratorAggregate;
use Countable;
use ArrayIterator;
use Traversable;

class Collection implements IteratorAggregate, ArrayAccess, Countable
{

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->todos);
    }

    public function count(): int
    {
        return sizeof($this->todos);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->todos[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->todos[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->todos[] = $value;
        } else {
            $this->todos[$offset] = $value;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->todos[$offset]);
    }
}
