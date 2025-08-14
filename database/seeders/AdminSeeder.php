<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@carrental.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
    }
}
