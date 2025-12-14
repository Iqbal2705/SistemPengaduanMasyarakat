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
            ['email' => 'admin@spm.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]
        );

        User::firstOrCreate(
            ['email' => 'iqbal@spm.com'],
            [
                'name' => 'Staff',
                'password' => Hash::make('iqbal123'),
                'role' => 'staff'
            ]
        );

    }
}
