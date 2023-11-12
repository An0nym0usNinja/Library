<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Adriaan',
            'email' => 'arouxmouton@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
