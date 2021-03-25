<?php

namespace Database\Factories;

use App\Models\Hardware;
use Illuminate\Database\Eloquent\Factories\Factory;

class HardwareFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hardware::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serial_num' => $this->faker->uuid,
            'name' => $this->faker->sentence(3,true),
            'type' => $this->faker->word,
            'make' => $this->faker->company
        ];
    }
}
