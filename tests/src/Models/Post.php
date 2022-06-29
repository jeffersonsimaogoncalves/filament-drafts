<?php

namespace Oddvalue\FilamentDrafts\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Oddvalue\FilamentDrafts\Tests\Database\Factories\PostFactory;
use Oddvalue\LaravelDrafts\Concerns\HasDrafts;

class Post extends Model
{
    use HasFactory;
    use HasDrafts;

    protected $casts = [
        'tags' => 'array',
    ];

    protected $guarded = [];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    protected static function newFactory()
    {
        return PostFactory::new();
    }
}
