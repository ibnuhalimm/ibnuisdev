<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'flag_type' => $this->faker->randomElement([ Skill::FLAG_TYPE_DAY_TO_DAY, Skill::FLAG_TYPE_EXPERIENCE ]),
            'name' => $this->faker->randomElement(['HTML', 'Javascript', 'CSS', 'Git', 'Laravel', 'Codeigniter', 'ReactJs', 'SCSS', 'TailwindCss', 'Bootstrap']),
            'order_number' => $this->faker->numberBetween(1, 10)
        ];
    }
}
