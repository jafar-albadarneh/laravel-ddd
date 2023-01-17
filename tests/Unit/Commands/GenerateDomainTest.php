<?php

use Illuminate\Support\Facades\File;

$domainName = 'SampleDomain';

beforeEach(function () {
    cleanupDirectory(app_path('Domains'));
});

afterAll(fn () => cleanupDirectory(app_path('Domains')));

uses()->group('domains');

it('can generate a domain', function () use ($domainName) {
    $this->artisan("make:domain --name={$domainName}")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
});

it('should not create a domain if it already exists', function () use ($domainName) {
    $this->artisan("make:domain --name={$domainName}")->assertExitCode(0);
    $this->artisan("make:domain --name={$domainName}")->assertExitCode(1);
});

it('should not generate samples if not specified', function () use ($domainName) {
    $this->artisan("make:domain --name={$domainName}")->assertExitCode(0);
    expect(File::exists(app_path("Domains/$domainName/Actions/SampleAction.php")))
        ->toBe(false);
    expect(File::exists(app_path("Domains/$domainName/Services/{$domainName}Service.php")))
        ->toBe(false);
});

it('should generate samples if specified', function () use ($domainName) {
    $this->artisan("make:domain --name={$domainName} --with-samples=true")->assertExitCode(0);
    expect(File::exists(app_path("Domains/$domainName/Actions/SampleAction.php")))
        ->toBe(true);
    expect(File::exists(app_path("Domains/$domainName/Services/{$domainName}Service.php")))
        ->toBe(true);
});
