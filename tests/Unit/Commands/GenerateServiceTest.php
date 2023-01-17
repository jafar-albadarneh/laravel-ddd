<?php

use Illuminate\Support\Facades\File;

$domainName = 'SampleDomain';

beforeEach(function () use ($domainName) {
    $this->artisan("make:domain --name=$domainName");
});

afterAll(fn () => cleanupDirectory(app_path('Domains')));

uses()->group('services');

it('can generate a default service class within the domain', function () use ($domainName) {
    $this->artisan("make:service --domain={$domainName}")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/Services/{$domainName}Service.php")))
        ->toBe(true);
});

it('can generate a custom service class within the domain', function () use ($domainName) {
    $this->artisan("make:service --domain={$domainName} --name=ABCService")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/Services/ABCService.php")))
        ->toBe(true);
});

it('should append Service suffix to class name if not specified', function () use ($domainName) {
    $this->artisan("make:service --domain={$domainName} --name=ABC")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/Services/ABCService.php")))
        ->toBe(true);
});
