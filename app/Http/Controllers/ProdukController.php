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

    private function getUserVector(int $userId): array
    {
        return Detail_Transaksi::whereHas('transaksi', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->select('produk_id', DB::raw('SUM(jumlah) as total'))
            ->groupBy('produk_id')
            ->pluck('total', 'produk_id')
            ->toArray();
    }

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

        return $dotProduct / ($normA * $normB);
    }

    // ================== SHOW DETAIL + CF ==================

    public function show($id)
    {
        $produk = Produk::with('kategori.ukurans', 'merek')->findOrFail($id);

        $rekomendasi = collect();
        $guest = true;

        // ================== JIKA LOGIN ==================
        if (Auth::check()) {
            $guest = false;
            $targetUser = Auth::user();

            $targetVector = $this->getUserVector($targetUser->id);

            // ================== JIKA BELUM ADA HISTORI ==================
            if (empty($targetVector)) {
                $rekomendasi = Produk::where('id', '!=', $produk->id)
                    ->latest()
                    ->limit(4)
                    ->get();
            } 
            else {
                // ================== HITUNG SIMILARITY ==================
                $users = User::where('id', '!=', $targetUser->id)->get();
                $similarities = [];

                foreach ($users as $user) {
                    $vector = $this->getUserVector($user->id);
                    $sim = $this->cosineSimilarity($targetVector, $vector);

                    if ($sim > 0) {
                        $similarities[$user->id] = $sim;
                    }
                }

                if (!empty($similarities)) {
                    arsort($similarities);
                    $topUsers = array_slice(array_keys($similarities), 0, 3);

                    $recommendedProductIds = Detail_Transaksi::whereHas('transaksi', function ($q) use ($topUsers) {
                            $q->whereIn('user_id', $topUsers);
                        })
                        ->whereNotIn('produk_id', array_keys($targetVector))
                        ->select('produk_id', DB::raw('SUM(jumlah) as score'))
                        ->groupBy('produk_id')
                        ->orderByDesc('score')
                        ->limit(4)
                        ->pluck('produk_id')
                        ->toArray();

                    if (!empty($recommendedProductIds)) {
                        $rekomendasi = Produk::whereIn('id', $recommendedProductIds)
                            ->where('id', '!=', $produk->id)
                            ->orderByRaw('FIELD(id,' . implode(',', $recommendedProductIds) . ')')
                            ->get();
                    }
                }

                // fallback
                if ($rekomendasi->isEmpty()) {
                    $rekomendasi = Produk::where('id', '!=', $produk->id)
                        ->latest()
                        ->limit(4)
                        ->get();
                }
            }
        }

        return view('detail-produk', compact('produk', 'rekomendasi', 'guest'));
    }
}
