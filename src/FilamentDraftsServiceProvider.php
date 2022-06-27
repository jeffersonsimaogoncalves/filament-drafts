<?php

namespace Oddvalue\FilamentDrafts;

use Oddvalue\FilamentDrafts\Commands\FilamentDraftsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentDraftsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-drafts')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-drafts_table')
            ->hasCommand(FilamentDraftsCommand::class);
    }
}
