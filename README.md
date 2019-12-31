# Read and parse the stdInput of Git hook scripts

[![CircleCI](https://circleci.com/gh/Sweetchuck/git-hooks-stdinput-reader.svg?style=svg)](https://circleci.com/gh/Sweetchuck/git-hooks-stdinput-reader)
[![codecov](https://codecov.io/gh/Sweetchuck/git-hooks-stdinput-reader/branch/master/graph/badge.svg)](https://codecov.io/gh/Sweetchuck/git-hooks-stdinput-reader)


## Supported Git hooks

* [post-receive](https://git-scm.com/docs/githooks#post-receive)
* [post-rewrite](https://git-scm.com/docs/githooks#_post_rewrite)
* [pre-push](https://git-scm.com/docs/githooks#_pre_push)
* [pre-receive](https://git-scm.com/docs/githooks#pre-receive)


## Usage

**.git/hooks/pre-receive**
```PHP
#!/usr/bin/env php
<?php

use Sweetchuck\GitHooksStdInputReader\PreReceiveReader;

$reader = new PreReceiveReader(STDIN);

foreach ($reader as $item) {
    echo 'Old value: ', $item->oldValue, PHP_EOL;
    echo 'New value: ', $item->newValue, PHP_EOL;
    echo 'Ref name:  ', $item->refName, PHP_EOL;
    echo '-----------', PHP_EOL;
}
```
