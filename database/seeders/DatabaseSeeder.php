<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            TriageSeeder::class,
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Account::create([
            'username' => 'admin',
            'password' => Hash::make('password'), 
            'role' => 'admin',
        ]);
        Account::create([
            'username' => 'perawat',
            'password' => Hash::make('password'), 
            'role' => 'perawat',
        ]);
    }
}
