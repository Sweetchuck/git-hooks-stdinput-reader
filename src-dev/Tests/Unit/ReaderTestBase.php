<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Tests\Unit;

abstract class ReaderTestBase extends TestBase
{

    /**
     * @var string
     */
    protected $gitHook = '';

    abstract public function caseSeekable(): array;

    /**
     * @dataProvider caseSeekable
     */
    public function testSeekable(array $lines)
    {
        $reader = $this->getReader($this->gitHook, $lines);

        $reader->seek(2);
        $this->assertSame($lines[2], (string) $reader->current());
        $this->assertSame(2, $reader->key());

        $reader->seek(1);
        $this->assertSame($lines[1], (string) $reader->current());

        $reader->rewind();
        $this->assertSame($lines[0], (string) $reader->current());
    }
}
