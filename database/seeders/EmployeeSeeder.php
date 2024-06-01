<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'Employee 1',
            'email' => 'employee_1@example.com',
            'password' => Hash::make('password'),
            'department_id' => 1,
        ]);
        Employee::create([
            'name' => 'Employee 2',
            'email' => 'employee_2@example.com',
            'password' => Hash::make('password'),
            'department_id' => 2,
        ]);
    }
}
