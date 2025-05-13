<?php

namespace Database\Factories;

use App\Models\Tasks;
use Illuminate\Database\Eloquent\Factories\Factory;

class TasksFactory extends Factory
{
    protected $model = Tasks::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'status' => $this->faker->numberBetween(1, 10),
        ];
    }
}
