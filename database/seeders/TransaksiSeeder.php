<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaksi::create([
            'id_transaksi' => 'T001',
            'tanggal' => '2025-12-25',
            'id' => '1',
            'id_metode' => 'MP001',
        ]);

        Transaksi::create([
            'id_transaksi' => 'T002',
            'tanggal' => '2025-12-26',
            'id' => '2',
            'id_metode' => 'MP001',
        ]);

        Transaksi::create([
            'id_transaksi' => 'T003',
            'tanggal' => '2026-01-02',
            'id' => '3',
            'id_metode' => 'MP002',
        ]);

        Transaksi::create([
            'id_transaksi' => 'T004',
            'tanggal' => '2026-01-03',
            'id' => '4',
            'id_metode' => 'MP002',
        ]);

        Transaksi::create([
            'id_transaksi' => 'T005',
            'tanggal' => '2026-01-05',
            'id' => '5',
            'id_metode' => 'MP001',
        ]);

        Transaksi::create([
            'id_transaksi' => 'T006',
            'tanggal' => '2026-01-06',
            'id' => '6',
            'id_metode' => 'MP001',
        ]);

        Transaksi::create([
            'id_transaksi' => 'T007',
            'tanggal' => '2026-01-07',
            'id' => '7',
            'id_metode' => 'MP002',
        ]);

        Transaksi::create([
            'id_transaksi' => 'T008',
            'tanggal' => '2026-01-08',
            'id' => '1',
            'id_metode' => 'MP001',
        ]);
    }
}
