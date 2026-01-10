<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Metode_Pembayaran;

class Metode_PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Metode_Pembayaran::create([
            'id_metode' => 'MP001',
            'nama_metode' => 'Transfer Bank',
        ]);

        Metode_Pembayaran::create([
            'id_metode' => 'MP002',
            'nama_metode' => 'COD',
        ]);
    }
}
