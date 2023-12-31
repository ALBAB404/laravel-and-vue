<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\student::factory(50)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'phone' => '01686381998',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);


        $this->call([
            AdminTableSeeder::class,
            SellerTableSeeder::class,
        ]);

    }
}