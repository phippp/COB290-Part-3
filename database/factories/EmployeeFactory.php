<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'forename' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email_address' => $this->faker->unique()->safeEmail,
            'job_id' => $this->faker->numberBetween(1,8),
            'branch_id' => $this->faker->numberBetween(1,10),
            'phone_number_extension' => $this->faker->numberBetween(1000,9999),
            'language' => $this->faker->languageCode
        ];
    }
}
