<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'employeeId' => 1,
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        $this->call([
            CategorySeeder::class,
            DishSeeder::class,
            TableSeeder::class,
        ]);
    }
}
