<?php

use Jafar\LaravelDDD\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

uses()
    ->afterAll(fn() => cleanupDirectory(app_path('Domains')));

function cleanupDirectory($directory): bool
{
    if (is_dir($directory)) {
        $files = array_diff(scandir($directory), ['.', '..']);
        foreach ($files as $file) {
            (is_dir("$directory/$file")) ? cleanupDirectory("$directory/$file") : unlink("$directory/$file");
        }

        return rmdir($directory);
    } else {
        return false;
    }
}
