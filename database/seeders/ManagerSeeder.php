<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manager::create([
            'name' => 'Manager 1',
            'email' => 'manager_1@example.com',
            'password' => Hash::make('password'),
        ]);
        Manager::create([
            'name' => 'Manager 2',
            'email' => 'manager_2@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
