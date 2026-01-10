<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'id_produk' => 'P001',
            'nama_produk' => 'Sepatu Basket Nike Zoom',
            'id_kategori' => 'K001',
            'harga' => '1200000',
            'stok' => '10',
        ]);

        Produk::create([
            'id_produk' => 'P002',
            'nama_produk' => 'Wristband Adidas',
            'id_kategori' => 'K003',
            'harga' => '100000',
            'stok' => '15',
        ]);

        Produk::create([
            'id_produk' => 'P003',
            'nama_produk' => 'Jersey Basket Lakers',
            'id_kategori' => 'K002',
            'harga' => '350000',
            'stok' => '10',
        ]);

        Produk::create([
            'id_produk' => 'P004',
            'nama_produk' => 'Bola Basket Molten',
            'id_kategori' => 'K003',
            'harga' => '450000',
            'stok' => '20',
        ]);

        Produk::create([
            'id_produk' => 'P005',
            'nama_produk' => 'Headband Nike',
            'id_kategori' => 'K003',
            'harga' => '80000',
            'stok' => '30',
        ]);

        Produk::create([
            'id_produk' => 'P006',
            'nama_produk' => 'Sepatu Basket Adidas Subzone',
            'id_kategori' => 'K001',
            'harga' => '1100000',
            'stok' => '12',
        ]);

        Produk::create([
            'id_produk' => 'P007',
            'nama_produk' => 'Bola Basket Spalding',
            'id_kategori' => 'K003',
            'harga' => '500000',
            'stok' => '10',
        ]);
    }
}
