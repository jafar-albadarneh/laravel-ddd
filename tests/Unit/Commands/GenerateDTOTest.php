<?php

use Illuminate\Support\Facades\File;

$domainName = 'SampleDomain';

beforeEach(function () use ($domainName) {
    $this->artisan("make:domain --name=$domainName");
});

afterAll(fn () => cleanupDirectory(app_path('Domains')));

uses()->group('dtos');

it('can generate a DTO class within the domain', function () use ($domainName) {
    $this->artisan("make:dto --domain={$domainName} --name=AbcDTO")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/DTOs/AbcDTO.php")))
        ->toBe(true);
});

it('should append DTO suffix to class name if not specified', function () use ($domainName) {
    $this->artisan("make:dto --domain={$domainName} --name=Abc")->assertExitCode(0);
    $this->assertDirectoryExists(app_path("Domains/$domainName"));
    expect(File::exists(app_path("Domains/$domainName/DTOs/AbcDTO.php")))
        ->toBe(true);
});
