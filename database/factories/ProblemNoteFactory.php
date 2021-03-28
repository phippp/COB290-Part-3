<?php

namespace Database\Factories;

use App\Models\ProblemNote;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemNoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProblemNote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence(10,false),
            'problem_log_id' => $this->faker->numberBetween(1,20),
            'solution' => null,
        ];
    }
}
