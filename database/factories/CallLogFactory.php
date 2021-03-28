<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\CallLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class CallLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CallLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' =>  $this->faker->sentence(10,false),
            'problem_log_id' =>  $this->faker->numberBetween(1,20),
            'specialist_id' =>  null,
            'client_id' =>  null,
            'edited_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
