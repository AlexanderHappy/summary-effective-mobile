<?php

namespace Database\Seeders;

use App\Models\Statuses;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Statuses::factory(10)->create();
        Tasks::factory(10)->create();
        User::factory(1)->create();
    }
}
