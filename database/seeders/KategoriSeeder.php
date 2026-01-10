<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'id_kategori' => 'K001',
            'nama_kategori' => 'Sepatu',
        ]);

        Kategori::create([
            'id_kategori' => 'K002',
            'nama_kategori' => 'Baju',
        ]);

        Kategori::create([
            'id_kategori' => 'K003',
            'nama_kategori' => 'Aksesoris',
        ]);
    }
}
