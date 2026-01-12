<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        Transaksi::insert([
            [
                'user_id' => 3,
                'metode_pembayaran_id' => 1,
                'tanggal' => '2026-01-02',
                'total' => 1100000,
                'status' => 'paid',
            ],
            [
                'user_id' => 4,
                'metode_pembayaran_id' => 2,
                'tanggal' => '2026-01-03',
                'total' => 700000,
                'status' => 'paid',
            ],
        ]);
    }
}
