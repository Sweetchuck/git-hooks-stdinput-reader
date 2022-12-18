<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Tests\Unit;

class PostRewriteReaderTest extends ReaderTestBase
{

    protected string $gitHook = 'post-rewrite';

    /**
     * {@inheritdoc}
     */
    public function caseAllInOne(): array
    {
        return [
            'basic' => [
                [
                    'a1 a2 a3',
                    'b1 b2',
                    'c1 c2 c3',
                    'd1 d2',
                    'e1 e2 e3',
                ],
            ],
        ];
    }
}
