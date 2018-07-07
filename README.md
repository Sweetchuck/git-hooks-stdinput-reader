# Read and parse the stdInput of Git hook scripts

[![CircleCI](https://circleci.com/gh/Sweetchuck/git-hooks-stdinput-reader.svg?style=svg)](https://circleci.com/gh/Sweetchuck/git-hooks-stdinput-reader)
[![codecov](https://codecov.io/gh/Sweetchuck/git-hooks-stdinput-reader/branch/master/graph/badge.svg)](https://codecov.io/gh/Sweetchuck/git-hooks-stdinput-reader)

## Usage

**.git/hooks/pre-receive**
```php
#!/usr/bin/env php
<?php

use Sweetchuck\GitHooksStdInputReader\PreReceiveReader;

$reader = PreReceiveReader(STDIN);

/** @var \Sweetchuck\GitHooksStdInputReader\Item\ReceiveItem $item */ 
foreach ($reader as $item) {
    echo 'Old value: ', $item->oldValue, PHP_EOL;
    echo 'New value: ', $item->newValue, PHP_EOL;
    echo 'Ref name: ', $item->refName, PHP_EOL;
    echo '---------', PHP_EOL;
}
```
