<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShortUrlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'origin' => $this->faker->url(),
            'short_id' => $this->faker->uuid()
        ];
    }
}
