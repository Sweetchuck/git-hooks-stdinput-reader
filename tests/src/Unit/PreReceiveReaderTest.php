<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Tests\Unit;

class PreReceiveReaderTest extends ReaderTestBase
{

    protected string $gitHook = 'pre-receive';

    public function caseAllInOne(): array
    {
        return [
            'basic' => [
                [
                    'a1 a2 a3',
                    'b1 b2 b3',
                    'c1 c2 c3',
                    'd1 d2 d3',
                    'e1 e2 e3',
                ],
            ],
        ];
    }
}
