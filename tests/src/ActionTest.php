<?php

use Oddvalue\FilamentDrafts\Tests\Filament\Resources\PostResource;
use Oddvalue\FilamentDrafts\Tests\Models\Post;
use function Pest\Laravel\get;

it('can add the `Save as draft` action to the record create page', function () {
    get(PostResource::getUrl('create'))
        ->assertSee(_('Save as draft'));
});

it('can add the `Save as draft` action to the record edit page', function () {
    $post = Post::factory()->create();
    get(PostResource::getUrl('edit', $post->getKey()))
        ->assertSee(_('Save as draft'));
});
