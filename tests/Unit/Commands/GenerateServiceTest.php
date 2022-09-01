<?php

use Illuminate\Support\Facades\File;

beforeEach(function () {
    $this->artisan('create:domain --name=SampleDomain');
});

afterAll(function () {
    cleanupDirectory(app_path('Domains'));
});

it('can generate a default service class within the domain', function () {
    $domainName = 'SampleDomain';
    $this->artisan("create:service --domain={$domainName}")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/Services/{$domainName}Service.php")))
        ->toBe(true);
});

it('can generate a custom service class within the domain', function () {
    $domainName = 'SampleDomain';
    $this->artisan("create:service --domain={$domainName} --name=ABCService")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/Services/ABCService.php")))
        ->toBe(true);
});

it('should append Service suffix to class name if not specified', function () {
    $domainName = 'SampleDomain';
    $this->artisan("create:service --domain={$domainName} --name=ABC")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/Services/ABCService.php")))
        ->toBe(true);
});
