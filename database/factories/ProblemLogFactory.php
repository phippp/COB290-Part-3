<?php

namespace Database\Factories;

use App\Models\ProblemLog;
use Carbon\CarbonImmutable;
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
            'hardware_id' => $this->faker->boolean(75) ? $this->faker->numberBetween(1,25) : null,
            'software_id' => $this->faker->boolean(75) ? $this->faker->numberBetween(1,25) : null,
            'specialist_assigned' => false,
            'operating_system_id' => $this->faker->boolean(65) ? $this->faker->numberBetween(1,8) : null,
            'problem_id' => $this->faker->numberBetween(1,25),
            'title' => $this->faker->sentence(3,true),
            'description' => $this->faker->sentence(15,true),
            'status' => $this->faker->randomElement(array('In queue','Verified','Solved')),
            'importance' => $this->faker->randomElement(array("Low","Medium","High")),
            'client_id' => $this->faker->numberBetween(0,20)
        ];
    }

}
