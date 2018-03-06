<?php

namespace Sweetchuck\GitHooksStdInputReader;

class PrePushReader extends BaseReader
{
    protected function parse(string $line)
    {
        // @todo Validate.
        return new Item\PrePushItem(...explode(' ', trim($line)));
    }
}
