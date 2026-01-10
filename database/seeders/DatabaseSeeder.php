<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            userseeder::class,
            Detail_TransaksiSeeder::class,
            KategoriSeeder::class,
            MerekSeeder::class,
            Metode_PembayaranSeeder::class,
            ProdukSeeder::class,
            TransaksiSeeder::class,
            RolesSeeder::class,
            // Tambahkan seeder lain di sini
        ]);
    }
}
