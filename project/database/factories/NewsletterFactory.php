<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Newsletter>
 */
class NewsletterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // TODO UPDATE FAKER TO USE LOREM IMPSUM TEXT AND GOOD IMAGES
        return [
            'Title' => $this->faker->company(),
            'Content' => $this->faker->text(1024),
            'ImageURL' => $this->faker->company(),
            ];
    }
}
