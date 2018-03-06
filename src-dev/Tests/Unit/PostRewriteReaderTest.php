<?php

namespace Sweetchuck\GitHooksStdInputReader\Tests\Unit;

class PostRewriteReaderTest extends ReaderTestBase
{

    /**
     * {@inheritdoc}
     */
    protected $gitHook = 'post-rewrite';

    /**
     * {@inheritdoc}
     */
    public function caseSeekable(): array
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
