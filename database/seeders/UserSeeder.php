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
                'email' => 'central@admin.com',
                'password' => Hash::make('@Victor!')
            ]);
        }

        User::create([
            'role' => 'admin',
            'name' => 'Work Shop Administrator',
            'email' => 'workshop@admin.com',
            'password' => Hash::make('@Divine!')
        ]);

        User::create([
            'role' => 'user',
            'name' => 'Central Stores Man',
            'email' => 'storesman@zrp.com',
            'password' => Hash::make('@Onwell!')
        ]);

        User::create([
            'role' => 'user',
            'name' => 'Work Stores Man',
            'email' => 'workshopstoresman@zrp.com',
            'password' => Hash::make('@Divine!12')
        ]);

    }
}
