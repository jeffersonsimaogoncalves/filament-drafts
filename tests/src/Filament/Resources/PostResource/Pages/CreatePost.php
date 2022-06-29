<?php

namespace Oddvalue\FilamentDrafts\Tests\Filament\Resources\PostResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Oddvalue\FilamentDrafts\Actions\SaveAsDraftAction;
use Oddvalue\FilamentDrafts\Concerns\Draftable;
use Oddvalue\FilamentDrafts\Tests\Filament\Resources\PostResource;

class CreatePost extends CreateRecord
{
    use Draftable;

    protected static string $resource = PostResource::class;

    protected function getActions(): array
    {
        return [SaveAsDraftAction::make()];
    }
}
