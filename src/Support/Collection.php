<?php

namespace Cfuentessalgado\Todo\Support;

use ArrayAccess;
use IteratorAggregate;
use Countable;
use ArrayIterator;
use Traversable;

class Collection implements IteratorAggregate, ArrayAccess, Countable
{
    protected array $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return sizeof($this->items);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->items[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->items[$offset]);
    }

    public function filter(callable $callback)
    {
        return new Collection(array_filter($this->items, $callback));
    }

    public function first()
    {
        return $this->items[array_key_first($this->items)] ?? null;
    }
}
