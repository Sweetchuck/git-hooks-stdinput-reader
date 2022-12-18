<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Item;

class PostRewriteItem extends BaseItem
{

    public string $oldSha1;

    public string $newSha1;

    public ?string $extraInfo;

    public function __construct(string $oldSha1, string $newSha1, ?string $extraInfo = null)
    {
        $this->oldSha1 = $oldSha1;
        $this->newSha1 = $newSha1;
        $this->extraInfo = $extraInfo;
    }

    protected function getPropertyValues(): array
    {
        return $this->extraInfo === null ?
            [$this->oldSha1, $this->newSha1]
            : [$this->oldSha1, $this->newSha1, $this->extraInfo];
    }
}
