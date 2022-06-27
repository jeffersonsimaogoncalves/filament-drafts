<?php

namespace Oddvalue\FilamentDrafts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Oddvalue\FilamentDrafts\FilamentDrafts
 */
class FilamentDrafts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-drafts';
    }
}
