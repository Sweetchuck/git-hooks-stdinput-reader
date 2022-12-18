<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Item;

abstract class BaseItem
{

    protected string $separator = ' ';

    abstract protected function getPropertyValues(): array;

    public function __toString()
    {
        return implode($this->separator, $this->getPropertyValues());
    }
}
