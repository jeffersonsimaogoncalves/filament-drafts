<?php

namespace Oddvalue\FilamentDrafts\Commands;

use Illuminate\Console\Command;

class FilamentDraftsCommand extends Command
{
    public $signature = 'filament-drafts';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
