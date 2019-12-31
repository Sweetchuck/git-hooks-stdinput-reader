<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sweetchuck\GitHooksStdInputReader\BaseReader;
use Sweetchuck\GitHooksStdInputReader\ReaderFactory;

abstract class TestBase extends TestCase
{
    protected function getReader(string $gitHook, $lines): ?BaseReader
    {
        return ReaderFactory::createInstance($gitHook, $this->getFileHandler($lines));
    }

    /**
     * @return resource
     */
    protected function getFileHandler(array $lines)
    {
        return fopen($this->getFileName($lines), 'r');
    }

    protected function getFileName(array $lines): string
    {
        return 'data://text/plain;base64,' . base64_encode(implode(PHP_EOL, $lines));
    }
}
