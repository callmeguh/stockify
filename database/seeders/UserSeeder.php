<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Gudang',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'manajer@gmail.com'],
            [
                'name' => 'Manajer Gudang',
                'password' => Hash::make('password123'),
                'role' => 'manajer',
            ]
        );

        User::firstOrCreate(
            ['email' => 'staff@gmail.com'],
            [
                'name' => 'Staff Gudang',
                'password' => Hash::make('password123'),
                'role' => 'staff',
            ]
        );
    }
}
