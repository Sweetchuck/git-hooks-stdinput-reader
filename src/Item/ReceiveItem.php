<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Item;

class ReceiveItem extends BaseItem
{
    /**
     * @var string
     */
    public $oldValue;

    /**
     * @var string
     */
    public $newValue;

    /**
     * @var string
     */
    public $refName;

    public function __construct(string $oldValue, string $newValue, string $refName)
    {
        $this->oldValue = $oldValue;
        $this->newValue = $newValue;
        $this->refName = $refName;
    }

    /**
     * {@inheritdoc}
     */
    protected function getPropertyValues(): array
    {
        return [
            $this->oldValue,
            $this->newValue,
            $this->refName,
        ];
    }
}
