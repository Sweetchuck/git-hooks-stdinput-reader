<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Item;

class PostRewriteItem extends BaseItem
{

    /**
     * @var string
     */
    public $oldSha1;

    /**
     * @var string
     */
    public $newSha1;

    /**
     * @var null|string
     */
    public $extraInfo;

    public function __construct(string $oldSha1, string $newSha1, ?string $extraInfo = null)
    {
        $this->oldSha1 = $oldSha1;
        $this->newSha1 = $newSha1;
        $this->extraInfo = $extraInfo;
    }

    /**
     * {@inheritdoc}
     */
    protected function getPropertyValues(): array
    {
        return $this->extraInfo === null ?
            [$this->oldSha1, $this->newSha1]
            : [$this->oldSha1, $this->newSha1, $this->extraInfo];
    }
}
