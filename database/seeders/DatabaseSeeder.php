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
        $this->call(OrderTableSeeder::class);
        $existingUser = User::where('email', 'admin@admin@poke.com')->first();

        if (!$existingUser) {
            // Proceed with the insert
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@poke.com',
                'password' => bcrypt('admin'),
                // other fields
            ]);
        } else {
            // Handle the case where the email already exists
            echo "Email already exists!";
        }
    }
}
