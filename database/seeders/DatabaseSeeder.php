<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create an admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'), // You can change the password
            'user_type' => 'admin', // Specify the user type (admin, landlord, user)
        ]);
        Category::create(['name' => 'Personal Room']);
        Category::create(['name' => 'Condo']);

        // Create a landlord user
        User::create([
            'name' => 'Landlord',
            'email' => 'landlord@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'landlord',
        ]);

        User::create([
            'name' => 'Landlord 2.0',
            'email' => 'landlord2@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'landlord',
        ]);

        // Create a regular user
        User::create([
            'name' => 'Regular',
            'email' => 'user@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'user',
        ]);

    }
}
