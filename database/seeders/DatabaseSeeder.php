<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin@gmail.com'),
            'phone' => '1234567890',
            'address' => '123 Admin St.',
            'course' => 'Computer Science',
            'graduation_year' => 2023,
            'bio' => 'I am the system administrator.',
        ]);

        User::factory()->create([
            'name' => 'Alumni User',
            'email' => 'alumni@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('alumni@gmail.com'),
            'phone' => '1234567890',
            'address' => '123 Admin St.',
            'course' => 'Computer Science',
            'graduation_year' => 2023,
            'bio' => 'I am the system administrator.',
        ]);
    
        // Create 5 random alumni users
        User::factory(5)->create();
    }    
}
