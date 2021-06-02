<?php

namespace Database\Factories\Blog;

use App\Models\Blog\UniqueVisitor;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniqueVisitorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UniqueVisitor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ip_address' => $this->faker->ipv4(),
            'hit' => $this->faker->randomNumber(3),
            'device' => $this->faker->randomElement(['mobile', 'desktop', 'tablet']),
            'os' => $this->faker->randomElement(['windows', 'linux', 'mac']),
            'date' => $this->faker->dateTimeBetween('-2 years', '+2 years')->format('Y-m-d'),
            'time_start' => $this->faker->time(),
            'time_end' => date('H:i:s', strtotime($this->faker->time().'+1 hours')),
        ];
    }
}
