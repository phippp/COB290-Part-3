<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Branch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address_line_1' => $this->faker->secondaryAddress,
            'address_line_2' => $this->faker->streetName,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'postcode' => $this->faker->postcode,
            'phone_number_base' => $this->faker->numerify("#########")
        ];
    }
}
