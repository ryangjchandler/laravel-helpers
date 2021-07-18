<?php

namespace RyanChandler\LaravelHelpers;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RyanChandler\LaravelHelpers\Commands\LaravelHelpersCommand;

class LaravelHelpersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-helpers')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-helpers_table')
            ->hasCommand(LaravelHelpersCommand::class);
    }
}
