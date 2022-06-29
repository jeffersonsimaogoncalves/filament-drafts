<?php

namespace Oddvalue\FilamentDrafts\Tests\Filament\Resources\PostResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Oddvalue\FilamentDrafts\Actions\SaveAsDraftAction;
use Oddvalue\FilamentDrafts\Concerns\Draftable;
use Oddvalue\FilamentDrafts\Tests\Filament\Resources\PostResource;

class EditPost extends EditRecord
{
    use Draftable;

    protected static string $resource = PostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            SaveAsDraftAction::make(),
        ];
    }
}
