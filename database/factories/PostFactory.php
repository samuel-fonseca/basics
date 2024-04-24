<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
            'slug' => str($title)->slug(),
            'content' => $this->faker->paragraph,
            'user_id' => User::factory(),
            'status' => fake()->randomElement(PostStatus::cases()),
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
