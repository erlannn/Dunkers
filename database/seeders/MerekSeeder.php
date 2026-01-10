<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Merek;

class MerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Merek::create([
            'id_merek' => 'M001',
            'nama_merek' => 'Nike',
        ]);

        Merek::create([
            'id_merek' => 'M002',
            'nama_merek' => 'Adidas',
        ]);

        Merek::create([
            'id_merek' => 'M003',
            'nama_merek' => 'Molten',
        ]);

        Merek::create([
            'id_merek' => 'M004',
            'nama_merek' => 'Lakers',
        ]);

        Merek::create([
            'id_merek' => 'M005',
            'nama_merek' => 'Spalding',
        ]);
    }
}
