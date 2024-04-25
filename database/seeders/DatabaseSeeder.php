<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $username = 'admin';

        \App\Models\User::create([
            'username' => 'admin',
            'email' => 'admin@mathchar.com',
            'password' => Hash::make('admin123'), // password
            'picture' => config('app.avatar_generator_url').$username,
        ]);

        $this->call([
            CategorySeeder::class,
        ]);
    }
}
