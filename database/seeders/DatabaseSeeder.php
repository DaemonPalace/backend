<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProductTableSeeder::class);
        $existingUser = User::where('email', 'test@example.com')->first();

        if (!$existingUser) {
            // Proceed with the insert
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                // other fields
            ]);
        } else {
            // Handle the case where the email already exists
            echo "Email already exists!";
        }
    }
}
