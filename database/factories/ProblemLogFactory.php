<?php

namespace Database\Factories;

use App\Models\ProblemLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProblemLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hardware_id' => $this->faker->numberBetween(1,25),
            'software_id' => $this->faker->numberBetween(1,25),
            'specialist_assigned' => false,
            'operating_system_id' => $this->faker->numberBetween(1,8),
            'problem_id' => $this->faker->numberBetween(1,25),
            'title' => $this->faker->sentence(3,true),
            'description' => $this->faker->sentence(15,true),
            'status' => $this->faker->randomElement(array('In queue','Verified','Solved')),
            'importance' => $this->faker->numberBetween(1,20),
            'client_id' => $this->faker->randomElement(array(1,6)),

        ];
    }
}
