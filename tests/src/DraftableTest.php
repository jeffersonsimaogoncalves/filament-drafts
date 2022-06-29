<?php


use Oddvalue\FilamentDrafts\Tests\Filament\Resources\PostResource;
use Oddvalue\FilamentDrafts\Tests\Models\Post;
use function Pest\Livewire\livewire;

it('can save a draft of an existing record', function () {
    $post = Post::factory()->create();
    $draft = Post::factory()->make();
    livewire(PostResource\Pages\EditPost::class, ['record' => $post->getKey()])
        ->set('data.title', $draft->title)
        ->call('saveAsDraft');
    $publishedPost = $post->fresh();
    expect($publishedPost->isPublished())->toBeTrue()
        ->and($publishedPost->title)->toBe($post->title)
        ->and($publishedPost->draft->title)->toBe($draft->title)
        ->and(Post::withDrafts()->count())->toBe(2);
});

it('can create a record as a draft', function () {
    livewire(PostResource\Pages\CreatePost::class)
        ->set('data.title', 'Foo')
        ->call('saveAsDraft');
    $post = Post::onlyDrafts()->first();
    expect($post->isPublished())->toBeFalse()
        ->and($post->title)->toBe('Foo')
        ->and(Post::withDrafts()->count())->toBe(1);
});

it('can create a published page', function () {
    livewire(PostResource\Pages\CreatePost::class)
        ->set('data.title', 'Foo')
        ->call('create');
    $post = Post::first();
    expect($post->isPublished())->toBeTrue()
        ->and($post->title)->toBe('Foo')
        ->and(Post::withDrafts()->count())->toBe(1);
});
