<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_Transaksi;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $produkTerlaris = Detail_Transaksi::select(
                'produk_id',
                DB::raw('SUM(jumlah) as total_terjual')
            )
            ->groupBy('produk_id')
            ->orderByDesc('total_terjual')
            ->with('produk')
            ->limit(3)
            ->get();

        // Jika ada terlaris → pakai ranking 1
        if ($produkTerlaris->count() > 0) {
            $spotlight = $produkTerlaris->first();
        } 
        // Jika belum ada transaksi → ambil produk biasa
        else {
            $spotlight = Produk::inRandomOrder()->first();
        }

        return view('dashboard', compact('produkTerlaris', 'spotlight'));
    }
}
