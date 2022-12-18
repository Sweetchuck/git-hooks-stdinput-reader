<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Item;

class PrePushItem extends BaseItem
{
    public string $localRef;

    public string $localSha1;

    public string $remoteRef;

    public string $remoteSha1;

    public function __construct(string $localRef, string $localSha1, string $remoteRef, string $remoteSha1)
    {
        $this->localRef = $localRef;
        $this->localSha1 = $localSha1;
        $this->remoteRef = $remoteRef;
        $this->remoteSha1 = $remoteSha1;
    }

    protected function getPropertyValues(): array
    {
        return [
            $this->localRef,
            $this->localSha1,
            $this->remoteRef,
            $this->remoteSha1,
        ];
    }
}
