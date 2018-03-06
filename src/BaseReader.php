<?php

namespace Sweetchuck\GitHooksStdInputReader;

abstract class BaseReader implements \Iterator, \SeekableIterator
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var int
     */
    protected $currentIndex = -1;

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
     */
    public function current()
    {
        return $this->items[$this->currentIndex] ?? null;
    }

    abstract protected function parse(string $line);

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->readNext();
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->currentIndex;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return isset($this->items[$this->currentIndex]);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->currentIndex = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function seek($position)
    {
        if (isset($this->items[$position])) {
            $this->currentIndex = $position;

            return;
        }

        if (!feof($this->fileHandler)) {
            $this->currentIndex = count($this->items) - 1;
        }

        while ($this->valid() && $this->currentIndex < $position) {
            $this->next();
        }
    }

    protected function readNext()
    {
        $this->currentIndex++;
        if (!feof($this->fileHandler) && !isset($this->items[$this->currentIndex])) {
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
}
