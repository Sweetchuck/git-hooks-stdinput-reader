<?php

namespace Sweetchuck\GitHooksStdInputReader\Tests\Unit;

use Sweetchuck\GitHooksStdInputReader\PostReceiveReader;
use Sweetchuck\GitHooksStdInputReader\PostRewriteReader;
use Sweetchuck\GitHooksStdInputReader\PrePushReader;
use Sweetchuck\GitHooksStdInputReader\PreReceiveReader;

class ReaderFactoryTest extends TestBase
{
    public function casesCreateInstance(): array
    {
        return [
            'post-receive 01' => [
                PostReceiveReader::class,
                'post-receive',
            ],
            'post-rewrite 01' => [
                PostRewriteReader::class,
                'post-rewrite',
            ],
            'pre-push 01' => [
                PrePushReader::class,
                'pre-push',
            ],
            'pre-receive 01' => [
                PreReceiveReader::class,
                'pre-receive',
            ],
        ];
    }

    /**
     * @dataProvider casesCreateInstance
     */
    public function testCreateInstance(string $expected, string $gitHook)
    {
        $reader = $this->getReader($gitHook, []);
        $this->assertSame($expected, get_class($reader));
    }
}
