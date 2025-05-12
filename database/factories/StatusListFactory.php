<?php

namespace Database\Factories;

use App\Models\StatusList;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusListFactory extends Factory
{
    protected $model = StatusList::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
        ];
    }
}
