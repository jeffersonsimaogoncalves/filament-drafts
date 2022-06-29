<?php

namespace Oddvalue\FilamentDrafts\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Livewire\LivewireServiceProvider;
use Oddvalue\FilamentDrafts\FilamentDraftsServiceProvider;
use Oddvalue\FilamentDrafts\Tests\Models\User;
use Oddvalue\LaravelDrafts\LaravelDraftsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use LazilyRefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Oddvalue\\FilamentDrafts\\Tests\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        $this->actingAs(User::factory()->create());
    }

    protected function getPackageProviders($app): array
    {
        return [
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            LivewireServiceProvider::class,
            SupportServiceProvider::class,
            TablesServiceProvider::class,
            LaravelDraftsServiceProvider::class,
            FilamentDraftsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        config()->set('filament.pages.namespace', 'Oddvalue\\FilamentDrafts\\Tests\\Filament\\Pages');
        config()->set('filament.pages.path', __DIR__.'/Filament/Pages');

        config()->set('filament.resources.namespace', 'Oddvalue\\FilamentDrafts\\Tests\\Filament\\Resources');
        config()->set('filament.resources.path', __DIR__.'/Filament/Resources');

        $app['config']->set('auth.providers.users.model', User::class);

        $migration = include __DIR__.'/../database/migrations/create_users_table.php';
        $migration->up();
        $migration = include __DIR__.'/../database/migrations/create_posts_table.php';
        $migration->up();
    }
}
