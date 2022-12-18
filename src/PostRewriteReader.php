<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader;

use Sweetchuck\GitHooksStdInputReader\Item\BaseItem;

/**
 * @method \Sweetchuck\GitHooksStdInputReader\Item\PostRewriteItem current()
 */
class PostRewriteReader extends BaseReader
{

    /**
     * @return \Sweetchuck\GitHooksStdInputReader\Item\PostRewriteItem
     */
    protected function parse(string $line): BaseItem
    {
        // @todo Validate.
        return new Item\PostRewriteItem(...explode(' ', trim($line)));
    }
}
