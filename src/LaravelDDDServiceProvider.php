<?php

namespace Jafar\LaravelDDD;

use Jafar\LaravelDDD\Commands\GenerateNewActionCommand;
use Jafar\LaravelDDD\Commands\GenerateNewDomainCommand;
use Jafar\LaravelDDD\Commands\GenerateNewServiceCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Jafar\LaravelDDD\Commands\LaravelDDDCommand;

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
            ->hasCommand(LaravelDDDCommand::class)
            ->hasCommands([
               GenerateNewActionCommand::class,
               GenerateNewServiceCommand::class,
               GenerateNewDomainCommand::class,
            ]);
    }
}
