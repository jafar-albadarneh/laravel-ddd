<?php

use Illuminate\Support\Facades\File;

beforeEach(function () {
    $this->artisan('create:domain --name=SampleDomain');
});

it('can generate an action class within the domain', function () {
    $domainName = 'SampleDomain';
    $this->artisan("create:action --domain={$domainName} --name=DoABCAction")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/Actions/DoABCAction.php")))
        ->toBe(true);
});

it('should append Action suffix to class name if not specified', function () {
    $domainName = 'SampleDomain';
    $this->artisan("create:action --domain={$domainName} --name=DoABC")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/Actions/DoABCAction.php")))
        ->toBe(true);
});
