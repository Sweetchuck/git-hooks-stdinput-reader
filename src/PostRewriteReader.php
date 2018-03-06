<?php

namespace Sweetchuck\GitHooksStdInputReader;

class PostRewriteReader extends BaseReader
{
    protected function parse(string $line)
    {
        // @todo Validate.
        return new Item\PostRewriteItem(...explode(' ', trim($line)));
    }
}
