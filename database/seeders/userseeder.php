<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User as ModelsUser;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsUser::create([
            'name' => 'Erlan',
            'email' => 'erlan@gmail.com',
            'username' => 'erlan',
            'alamat' => 'Jl. Padang no.01',
            'nomor_hp' => '0811223345',
            'roles' => 'admin',
            'password' => bcrypt('12345678'),
            
        ]);

        ModelsUser::create([
            'name' => 'Rayhan',
            'email' => 'rayhan@gmail.com',
            'username' => 'rayhan',
            'alamat' => 'Jl. Padang no.02',
            'nomor_hp' => '0811223346',
            'roles' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        ModelsUser::create([
            'name' => 'Maulana',
            'email' => 'maulana@gmail.com',
            'username' => 'maulana',
            'alamat' => 'Jl. Padang no.03',
            'nomor_hp' => '0811223347',
            'roles' => 'pelanggan',
            'password' => bcrypt('12345678'),
        ]);

        ModelsUser::create([
            'name' => 'Vindi',
            'email' => 'vindi@gmail.com',
            'username' => 'vindi',
            'alamat' => 'Jl. Padang no.04',
            'nomor_hp' => '0811223348',
            'roles' => 'pelanggan',
            'password' => bcrypt('12345678'),
        ]);

        ModelsUser::create([
            'name' => 'Ucup',
            'email' => 'ucup@gmail.com',
            'username' => 'ucup',
            'alamat' => 'Jl. Padang no.05',
            'nomor_hp' => '0811223349',
            'roles' => 'pelanggan',
            'password' => bcrypt('12345678'),
        ]);

        ModelsUser::create([
            'name' => 'Vero',
            'email' => 'vero@gmail.com',
            'username' => 'vero',
            'alamat' => 'Jl. Padang no.06',
            'nomor_hp' => '0811223340',
            'roles' => 'pelanggan',
            'password' => bcrypt('12345678'),
        ]);
    }
}
