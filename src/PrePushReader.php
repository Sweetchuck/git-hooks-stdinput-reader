<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader;

use Sweetchuck\GitHooksStdInputReader\Item\BaseItem;

/**
 * @method \Sweetchuck\GitHooksStdInputReader\Item\PrePushItem current()
 */
class PrePushReader extends BaseReader
{

    /**
     * @return \Sweetchuck\GitHooksStdInputReader\Item\PrePushItem
     */
    protected function parse(string $line): BaseItem
    {
        // @todo Validate.
        return new Item\PrePushItem(...explode(' ', trim($line)));
    }
}
