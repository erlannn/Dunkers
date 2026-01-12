<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Erlan',
                'email' => 'erlan@gmail.com',
                'username' => 'erlan',
                'alamat' => 'Jl. Padang no.01',
                'nomor_hp' => '0811223345',
                'role_id' => 1, // admin
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Rayhan',
                'email' => 'rayhan@gmail.com',
                'username' => 'rayhan',
                'alamat' => 'Jl. Padang no.02',
                'nomor_hp' => '0811223346',
                'role_id' => 1,
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Maulana',
                'email' => 'maulana@gmail.com',
                'username' => 'maulana',
                'alamat' => 'Jl. Padang no.03',
                'nomor_hp' => '0811223347',
                'role_id' => 2, // pelanggan
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Vindi',
                'email' => 'vindi@gmail.com',
                'username' => 'vindi',
                'alamat' => 'Jl. Padang no.04',
                'nomor_hp' => '0811223348',
                'role_id' => 2,
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
