<?php

namespace Database\Factories;

use App\Models\SpecialistTracker;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialistTrackerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SpecialistTracker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'problem_log_id' => 1,
            'employee_id' => 1,
            'reason' => "Automatically assigned"
        ];
    }
}
