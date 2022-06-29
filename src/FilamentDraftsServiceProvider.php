<?php

namespace Oddvalue\FilamentDrafts;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentDraftsServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-drafts')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews();
    }
}
