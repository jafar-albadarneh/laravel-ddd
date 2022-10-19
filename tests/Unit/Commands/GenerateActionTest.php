<?php

use Illuminate\Support\Facades\File;

$domainName = 'SampleDomain';

beforeEach(function () use ($domainName) {
    $this->artisan("create:domain --name=$domainName");
});

afterAll(fn () => cleanupDirectory(app_path('Domains')));

uses()->group('actions');

it('can generate an action class within the domain', function () use ($domainName) {
    $this->artisan("create:action --domain={$domainName} --name=DoABCAction")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/Actions/DoABCAction.php")))
        ->toBe(true);
});

it('should append Action suffix to class name if not specified', function () use ($domainName) {
    $this->artisan("create:action --domain={$domainName} --name=DoABC")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/Actions/DoABCAction.php")))
        ->toBe(true);
});
