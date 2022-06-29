<?php

namespace Oddvalue\FilamentDrafts\Concerns;

use Illuminate\Database\Eloquent\Model;

trait Draftable
{
    protected bool $asDraft = false;

    public function saveAsDraft(bool $shouldRedirect = true): void
    {
        if (method_exists($this, 'getRecord')) {
            $this->getRecord()->asDraft();
            $this->save($shouldRedirect);
        } else {
            $this->asDraft()->create();
        }
    }

    protected function asDraft()
    {
        $this->asDraft = true;

        return $this;
    }

    protected function shouldDraft(): bool
    {
        return $this->asDraft;
    }

    protected function handleRecordCreation(array $data): Model
    {
        if ($this->shouldDraft()) {
            return $this->getModel()::createDraft($data);
        }

        return parent::handleRecordCreation($data);
    }
}
