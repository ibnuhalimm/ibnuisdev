<?php

namespace Database\Factories\Blog;

use App\Models\Blog\ShareButton;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShareButtonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShareButton::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->randomElement(['Facebook', 'Twitter']),
            'ikon' => $this->faker->randomElement(['facebook', 'twitter']),
            'url' => $this->faker->url,
            'nomor_urut' => $this->faker->numberBetween(1, 2),
        ];
    }
}
