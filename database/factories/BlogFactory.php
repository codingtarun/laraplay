<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excrept' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'user_id' => \App\Models\User::factory(),
            'status' => rand(0, 1) ? 'Published' : 'Draft',
            'published_at' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
        ];
    }
}
