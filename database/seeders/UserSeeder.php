<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $user = User::where('email', 'admin@admin.com')->first();

        if(!$user){
            User::create([
                'role' => 'admin',
                'name' => 'Central Stores Administrator',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password')
            ]);
        }

        User::create([
            'role' => 'user',
            'name' => 'Stores Man',
            'email' => 'storesman@zrp.com',
            'password' => Hash::make('password')
        ]);
    }
}
