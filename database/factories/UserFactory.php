<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'user_name' => 'admin',
            'password' => password_hash('1234', PASSWORD_DEFAULT),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
