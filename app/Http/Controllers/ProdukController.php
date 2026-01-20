<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\Models\Detail_Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk', compact('produk'));
    }

    // ================== CF SUPPORT ==================

    /**
     * Membentuk vektor user dengan bobot histori terbaru
     */
    private function getUserVector(int $userId): array
    {
        return Detail_Transaksi::join('transaksi', 'transaksi.id', '=', 'detail_transaksi.transaksi_id')
            ->where('transaksi.user_id', $userId)
            ->select(
                'detail_transaksi.produk_id',
                DB::raw('SUM(detail_transaksi.jumlah * (1 / (1 + DATEDIFF(NOW(), transaksi.created_at)))) as total')
            )
            ->groupBy('detail_transaksi.produk_id')
            ->pluck('total', 'produk_id')
            ->toArray();
    }

    /**
     * Ambil kategori yang sudah dibeli user + totalnya
     */
    private function getUserCategoryStats(int $userId)
    {
        return Detail_Transaksi::join('transaksi', 'transaksi.id', '=', 'detail_transaksi.transaksi_id')
            ->join('produk', 'produk.id', '=', 'detail_transaksi.produk_id')
            ->where('transaksi.user_id', $userId)
            ->select(
                'produk.kategori_id',
                DB::raw('SUM(detail_transaksi.jumlah) as total')
            )
            ->groupBy('produk.kategori_id')
            ->orderByDesc('total')
            ->get();
    }


    /**
     * Cosine similarity antar user
     */
    private function cosineSimilarity(array $A, array $B): float
    {
        if (empty($A) || empty($B)) return 0;

        $dotProduct = 0;
        foreach ($A as $key => $value) {
            if (isset($B[$key])) {
                $dotProduct += $value * $B[$key];
            }
        }

        if ($dotProduct == 0) return 0;

        $normA = sqrt(array_sum(array_map(fn ($v) => $v ** 2, $A)));
        $normB = sqrt(array_sum(array_map(fn ($v) => $v ** 2, $B)));

        if ($normA == 0 || $normB == 0) return 0;

        return $dotProduct / ($normA * $normB);
    }

    // ================== SHOW DETAIL + CF ==================

    public function show($id)
    {
        $produk = Produk::with('kategori.ukurans', 'merek')->findOrFail($id);

        $rekomendasi = collect();
        $guest = true;

        if (Auth::check()) {
            $guest = false;

            $userId = Auth::id();

            // ================== AMBIL STATISTIK KATEGORI USER ==================
            $userCategories = $this->getUserCategoryStats($userId);

            if ($userCategories->isEmpty()) {
                $rekomendasi = Produk::where('id', '!=', $produk->id)
                    ->orderByDesc('created_at')
                    ->limit(4)
                    ->get();
            } 
            else {

                // ================== KATEGORI YANG SUDAH DIBELI ==================
                $boughtCategoryIds = $userCategories->pluck('kategori_id')->toArray();

                // ================== AMBIL SEMUA KATEGORI ==================
                $allCategoryIds = \App\Models\Kategori::pluck('id')->toArray();

                // ================== KATEGORI YANG BELUM DIBELI ==================
                $missingCategoryIds = array_diff($allCategoryIds, $boughtCategoryIds);

                // ================== PRIORITAS KATEGORI BELUM DIBELI ==================
                if (!empty($missingCategoryIds)) {
                    $targetCategoryIds = $missingCategoryIds;
                } else {
                    // kalau semua sudah dibeli, ulangi dari favorit
                    $targetCategoryIds = $boughtCategoryIds;
                }

                // ================== AMBIL PRODUK ==================
                $rekomendasi = Produk::whereIn('kategori_id', $targetCategoryIds)
                    ->where('id', '!=', $produk->id)
                    ->orderByDesc('created_at')
                    ->limit(4)
                    ->get();
            }
        }

        return view('detail-produk', compact('produk', 'rekomendasi', 'guest'));
    }

}
