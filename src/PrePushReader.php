<?php

namespace Sweetchuck\GitHooksStdInputReader;

/**
 * @method Item\PrePushItem current()
 */
class PrePushReader extends BaseReader
{
    protected function parse(string $line)
    {
        // @todo Validate.
        return new Item\PrePushItem(...explode(' ', trim($line)));
    }
}
