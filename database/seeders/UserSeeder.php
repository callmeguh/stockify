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
            ['email' => 'admin@gudang.com'],
            [
                'name' => 'Admin Gudang',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'manajer@gudang.com'],
            [
                'name' => 'Manajer Gudang',
                'password' => Hash::make('password123'),
                'role' => 'manajer',
            ]
        );

        User::firstOrCreate(
            ['email' => 'staff@gudang.com'],
            [
                'name' => 'Staff Gudang',
                'password' => Hash::make('password123'),
                'role' => 'staff',
            ]
        );
    }
}
