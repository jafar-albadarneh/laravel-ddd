<?php

use Illuminate\Support\Facades\File;

beforeEach(function () {
    cleanupDirectory(app_path('Domains'));
});

afterAll(function () {
    cleanupDirectory(app_path('Domains'));
});

it('can generate a domain', function () {
    $domainName = 'Authentication';
    $this->artisan("domain:create --name={$domainName}")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
});

it('should not create a domain if it already exists', function () {
    $domainName = 'Authentication';
    $this->artisan("domain:create --name={$domainName}")->assertExitCode(0);
    $this->artisan("domain:create --name={$domainName}")->assertExitCode(1);
});

it('should not generate samples if not specified', function () {
    $domainName = 'Authentication';
    $this->artisan("domain:create --name={$domainName}")->assertExitCode(0);
    expect(File::exists(app_path("Domains/$domainName/Actions/SampleAction.php")))
        ->toBe(false);
    expect(File::exists(app_path("Domains/$domainName/Services/{$domainName}Service.php")))
        ->toBe(false);
});

it('should generate samples if specified', function () {
    $domainName = 'Authentication';
    $this->artisan("domain:create --name={$domainName} --with-samples=true")->assertExitCode(0);
    expect(File::exists(app_path("Domains/$domainName/Actions/SampleAction.php")))
        ->toBe(true);
    expect(File::exists(app_path("Domains/$domainName/Services/{$domainName}Service.php")))
        ->toBe(true);
});

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
