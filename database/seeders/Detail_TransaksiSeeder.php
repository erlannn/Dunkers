<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Detail_Transaksi;

class Detail_TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detail_Transaksi::create([
            'id_detail' => 'D001',
            'id_transaksi' => 'T001',
            'id_produk' => 'P006',
            'nama_produk' => 'Sepatu Basket Adidas Subzone',
            'jumlah' => '1',
            'total_harga' => '1100000',
        ]);

        Detail_Transaksi::create([
            'id_detail' => 'D002',
            'id_transaksi' => 'T002',
            'id_produk' => 'P003',
            'nama_produk' => 'Jersey Basket Lakers',
            'jumlah' => '2',
            'total_harga' => '7000000',
        ]);

        Detail_Transaksi::create([
            'id_detail' => 'D003',
            'id_transaksi' => 'T003',
            'id_produk' => 'P004',
            'nama_produk' => 'Bola Basket Molten',
            'jumlah' => '3',
            'total_harga' => '1350000',
        ]);

        Detail_Transaksi::create([
            'id_detail' => 'D004',
            'id_transaksi' => 'T004',
            'id_produk' => 'P002',
            'nama_produk' => 'Wristband Adidas',
            'jumlah' => '2',
            'total_harga' => '200000',
        ]);

        Detail_Transaksi::create([
            'id_detail' => 'D005',
            'id_transaksi' => 'T005',
            'id_produk' => 'P001',
            'nama_produk' => 'Sepatu Basket Nike Zoom',
            'jumlah' => '1',
            'total_harga' => '1200000',
        ]);

        Detail_Transaksi::create([
            'id_detail' => 'D006',
            'id_transaksi' => 'T006',
            'id_produk' => 'P005',
            'nama_produk' => 'Headband Nike',
            'jumlah' => '5',
            'total_harga' => '400000',
        ]);

        Detail_Transaksi::create([
            'id_detail' => 'D007',
            'id_transaksi' => 'T007',
            'id_produk' => 'P003',
            'nama_produk' => 'Jersey Basket Lakers',
            'jumlah' => '3',
            'total_harga' => '1050000',
        ]);

        Detail_Transaksi::create([
            'id_detail' => 'D008',
            'id_transaksi' => 'T001',
            'id_produk' => 'P003',
            'nama_produk' => 'Jersey Basket Lakers',
            'jumlah' => '1',
            'total_harga' => '350000',
        ]);
    }
}
