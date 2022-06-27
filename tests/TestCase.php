<?php

namespace Oddvalue\FilamentDrafts\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Oddvalue\FilamentDrafts\FilamentDraftsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Oddvalue\\FilamentDrafts\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentDraftsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-drafts_table.php.stub';
        $migration->up();
        */
    }
}
