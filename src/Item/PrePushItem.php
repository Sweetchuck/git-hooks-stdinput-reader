<?php

namespace Sweetchuck\GitHooksStdInputReader\Item;

class PrePushItem extends BaseItem
{
    /**
     * @var string
     */
    public $localRef;

    /**
     * @var string
     */
    public $localSha1;

    /**
     * @var string
     */
    public $remoteRef;

    /**
     * @var string
     */
    public $remoteSha1;

    public function __construct(string $localRef, string $localSha1, string $remoteRef, string $remoteSha1)
    {
        $this->localRef = $localRef;
        $this->localSha1 = $localSha1;
        $this->remoteRef = $remoteRef;
        $this->remoteSha1 = $remoteSha1;
    }

    /**
     * {@inheritdoc}
     */
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
