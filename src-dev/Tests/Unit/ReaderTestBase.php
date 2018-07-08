<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Tests\Unit;

abstract class ReaderTestBase extends TestBase
{

    /**
     * @var string
     */
    protected $gitHook = '';

    abstract public function caseAllInOne(): array;

    /**
     * @dataProvider caseAllInOne
     */
    public function testAllInOne(array $lines)
    {
        $reader = $this->getReader($this->gitHook, $lines);

        $reader->seek(2);
        $this->assertSame($lines[2], (string) $reader->current());
        $this->assertSame(2, $reader->key());

        $reader->seek(1);
        $this->assertSame($lines[1], (string) $reader->current());

        $reader->rewind();
        $this->assertSame($lines[0], (string) $reader->current());

        $reader->seek(3);
        $this->assertSame(count($lines), count($reader));
        $this->assertSame(
            $lines[3],
            (string) $reader->current(),
            "After count() the position hasn't changed."
        );

        /** @var \Sweetchuck\GitHooksStdInputReader\Item\BaseItem $item */
        foreach ($reader as $key => $item) {
            $this->assertSame($lines[$key], (string) $item);
        }
        $this->assertSame(count($lines), count($reader));
    }
}
