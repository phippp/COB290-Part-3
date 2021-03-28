<?php

namespace Database\Factories;

use App\Models\Specialist;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Specialist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => null,
            'is_available' => true,
            'working_days' => $this->faker->randomElement(array("mo,tu,we,th,fr","sa,su,mo,we","mo,we,fr,sa","mo,fr,sa,su"))
        ];
    }
}
