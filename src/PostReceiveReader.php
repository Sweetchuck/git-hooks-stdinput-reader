<?php

namespace Sweetchuck\GitHooksStdInputReader;

/**
 * @method Item\ReceiveItem current()
 */
class PostReceiveReader extends BaseReader
{
    protected function parse(string $line)
    {
        // @todo Validate.
        return new Item\ReceiveItem(...explode(' ', trim($line)));
    }
}
