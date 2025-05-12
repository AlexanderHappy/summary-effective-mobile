<?php

namespace Database\Factories;

use App\Models\Statuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusesFactory extends Factory
{
    protected $model = Statuses::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
        ];
    }
}
