<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name' => 'Client',
            'password' => Hash::make('client123'),
            'role' => 'client',
        ]);

        Client::create([
            'name' => 'Client 2',
            'password' => Hash::make('client123'),
            'role' => 'client',
        ]);

        Client::create([
            'name' => 'Client 3',
            'password' => Hash::make('client123'),
            'role' => 'client',
        ]);

        Client::create([
            'name' => 'Client 4',
            'password' => Hash::make('client123'),
            'role' => 'client',
        ]);

        Client::create([
            'name' => 'Client 5',
            'password' => Hash::make('client123'),
            'role' => 'client',
        ]);
    }
}
