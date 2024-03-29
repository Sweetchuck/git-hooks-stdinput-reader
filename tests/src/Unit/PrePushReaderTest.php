<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Tests\Unit;

class PrePushReaderTest extends ReaderTestBase
{

    protected string $gitHook = 'pre-push';

    /**
     * {@inheritdoc}
     */
    public function caseAllInOne(): array
    {
        return [
            'basic' => [
                [
                    'a1 a2 a3 a4',
                    'b1 b2 b3 b4',
                    'c1 c2 c3 c4',
                    'd1 d2 d3 d4',
                    'e1 e2 e3 e4',
                ],
            ],
        ];
    }
}
