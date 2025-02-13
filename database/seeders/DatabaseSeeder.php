<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Uncomment to generate additional users using factories
        // \App\Models\User::factory(10)->create();

        // Call the UserSeeder
        $this->call(UserSeeder::class);
    }
}
