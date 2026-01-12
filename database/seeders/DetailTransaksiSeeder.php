<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Detail_Transaksi;

class DetailTransaksiSeeder extends Seeder
{
    public function run(): void
    {
        Detail_Transaksi::insert([
            [
                'transaksi_id' => 1,
                'produk_id' => 1,
                'jumlah' => 1,
                'harga' => 1200000,
            ],
            [
                'transaksi_id' => 2,
                'produk_id' => 3,
                'jumlah' => 2,
                'harga' => 350000,
            ],
        ]);
    }
}
