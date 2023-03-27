<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->asciify('Hello ***'),
            'description' => $this->faker->text($maxNbChars = 50),
            'type' => $this->faker->randomDigit(),
            'status' => $this->faker->randomElement($array = array (0,1,2)),
            'assignee'=> User::all()->random()->id,
            'start_date' => now(),
            'due_date' => now(),
            'estimate' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10), // 48.8932
            'actual' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10) // 48.8932
        ];
    }
}
