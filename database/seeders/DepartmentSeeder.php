<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'RH',
            'manager_id' => 1,
        ]);
        Department::create([
            'name' => 'Finance',
            'manager_id' => 2,
        ]);
    }
}
