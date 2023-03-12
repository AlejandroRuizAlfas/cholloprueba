<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ganga>
 */
class GangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->realText(),
            'url' => '-ganga-severa.jpg',
            'category' => $this->faker->randomNumber(1),
            'likes' => $this->faker->randomNumber(2),
            'unlikes' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomNumber(2),
            'price_sale' => $this->faker->randomNumber(2),
            'available' => $this->faker->boolean(),
            'user_id' => 1,
        ];
    }
}
