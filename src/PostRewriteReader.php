<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader;

/**
 * @method Item\PostRewriteItem current()
 */
class PostRewriteReader extends BaseReader
{
    protected function parse(string $line)
    {
        // @todo Validate.
        return new Item\PostRewriteItem(...explode(' ', trim($line)));
    }
}
