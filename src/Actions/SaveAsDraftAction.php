<?php

namespace Oddvalue\FilamentDrafts\Actions;

use Filament\Pages\Actions\Action;

class SaveAsDraftAction extends Action
{
    public const DEFAULT_NAME = 'saveAsDraft';

    public static function make(string $name = null): static
    {
        $name ??= static::DEFAULT_NAME;

        return tap(parent::make($name), function ($action) use ($name) {
            if ($name === static::DEFAULT_NAME) {
                $action->label(_('Save as draft'));
            }
        });
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->keyBindings(['mod+shift+s'])
            ->action('saveAsDraft');
    }
}
