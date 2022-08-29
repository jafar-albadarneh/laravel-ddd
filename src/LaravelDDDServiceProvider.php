<?php

namespace Jafar\LaravelDDD;

use Jafar\LaravelDDD\Commands\LaravelDDDCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelDDDServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-ddd')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-ddd_table')
            ->hasCommand(LaravelDDDCommand::class);
    }
}
