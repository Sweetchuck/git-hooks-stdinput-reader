<?php

declare(strict_types = 1);

namespace Sweetchuck\GitHooksStdInputReader;

class ReaderFactory
{
    const NULL_HASH = '0000';

    public static $classNameMapping = [
        'post-receive' => PostReceiveReader::class,
        'post-rewrite' => PostRewriteReader::class,
        'pre-push' => PrePushReader::class,
        'pre-receive' => PreReceiveReader::class,
    ];

    /**
     * @param string $gitHook
     * @param resource $fileHandler
     *
     * @throws \InvalidArgumentException
     *
     * @SuppressWarnings(UndefinedVariable)
     */
    public static function createInstance(string $gitHook, $fileHandler): ?BaseReader
    {
        $className = static::$classNameMapping[$gitHook] ?? null;

        return $className ? new $className($fileHandler) : null;
    }
}
