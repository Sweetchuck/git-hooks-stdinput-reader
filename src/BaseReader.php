<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader;

use Countable;
use Iterator;
use SeekableIterator;
use Sweetchuck\GitHooksStdInputReader\Item\BaseItem;

abstract class BaseReader implements Iterator, SeekableIterator, Countable
{
    protected array $items = [];

    protected int $currentIndex = -1;

    /**
     * @var resource
     */
    protected $fileHandler;

    /**
     * @param resource $fileHandler
     */
    public function __construct($fileHandler)
    {
        $this->fileHandler = $fileHandler;
        $this->readNext();
    }

    /**
     * {@inheritdoc}
     *
     * @return null|\Sweetchuck\GitHooksStdInputReader\Item\BaseItem
     */
    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->items[$this->currentIndex] ?? null;
    }

    abstract protected function parse(string $line): BaseItem;

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function next()
    {
        $this->readNext();
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->currentIndex;
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function valid()
    {
        return isset($this->items[$this->currentIndex]);
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function rewind()
    {
        $this->currentIndex = 0;
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function seek($position)
    {
        if (isset($this->items[$position])) {
            $this->currentIndex = $position;

            return;
        }

        if (!$this->isAllReaded()) {
            $this->currentIndex = count($this->items) - 1;
        }

        while ($this->valid() && $this->currentIndex < $position) {
            $this->next();
        }
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
        $this->readAll();

        return count($this->items);
    }

    protected function readNext()
    {
        $this->currentIndex++;
        if (!$this->isAllReaded() && !$this->valid()) {
            $line = fgets($this->fileHandler);
            if (!$line) {
                return;
            }

            $item = $this->parse($line);
            if (!$item) {
                return;
            }

            $this->items[$this->currentIndex] = $item;
        }
    }

    /**
     * @return $this
     */
    protected function readAll()
    {
        if ($this->isAllReaded()) {
            return $this;
        }

        $currentIndex = $this->currentIndex;
        while ($this->valid()) {
            $this->next();
        }

        $this->seek($currentIndex);

        return $this;
    }

    protected function isAllReaded(): bool
    {
        return feof($this->fileHandler);
    }
}
