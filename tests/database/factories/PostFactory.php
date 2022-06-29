<?php

namespace Oddvalue\FilamentDrafts\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Oddvalue\FilamentDrafts\Tests\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
        ];
    }
}
