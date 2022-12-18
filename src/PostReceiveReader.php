<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader;

use Sweetchuck\GitHooksStdInputReader\Item\BaseItem;
use Sweetchuck\GitHooksStdInputReader\Item\ReceiveItem;

/**
 * @method \Sweetchuck\GitHooksStdInputReader\Item\ReceiveItem current()
 */
class PostReceiveReader extends BaseReader
{

    /**
     * @return \Sweetchuck\GitHooksStdInputReader\Item\ReceiveItem
     */
    protected function parse(string $line): BaseItem
    {
        // @todo Validate.
        return new ReceiveItem(...explode(' ', trim($line)));
    }
}
