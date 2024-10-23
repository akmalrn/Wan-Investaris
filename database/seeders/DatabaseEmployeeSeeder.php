<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'Aning',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Berlian',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Employee',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Fathima',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Hendra',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Panji',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Perdi',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Rainy',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Ranu',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Ratu',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Ryan',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Sani',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Tasya',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);

        Employee::create([
            'name' => 'Yesa',
            'password' => Hash::make('employee123'),
            'role' => 'employee',
        ]);
    }
}
