<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

final class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(5, true),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->sentence(),
            'content' => $this->faker->sentences(10, true),
        ];
    }
}
