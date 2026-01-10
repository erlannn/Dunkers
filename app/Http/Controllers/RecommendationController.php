<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Detail_Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    public function index()
    {
        // 🔴 JIKA BELUM LOGIN
        if (!Auth::check()) {
            return view('produk', [
                'recommendedProducts' => collect(),
                'message' => 'Silakan login untuk melihat rekomendasi produk.'
            ]);
        }

        // ✅ JIKA SUDAH LOGIN
        $activeUser = Auth::user();

        $activeVector = $this->getUserVector($activeUser->id);
        $scores = [];

        $users = User::where('id', '!=', $activeUser->id)->get();

        foreach ($users as $user) {
            $otherVector = $this->getUserVector($user->id);
            $similarity = $this->cosineSimilarity($activeVector, $otherVector);

            if ($similarity >= 0.5) {
                foreach ($otherVector as $productId => $qty) {
                    if (!isset($activeVector[$productId])) {
                        $scores[$productId] = ($scores[$productId] ?? 0) + $similarity;
                    }
                }
            }
        }

        arsort($scores);

        $recommendedProducts = Produk::whereIn('id_produk', array_keys($scores))
            ->get()
            ->map(function ($produk) use ($scores) {
                $produk->score = round($scores[$produk->id_produk] ?? 0, 3);
                return $produk;
            });

        return view('produk', [
            'recommendedProducts' => $recommendedProducts,
            'message' => null
        ]);
    }

    // ================= HELPER =================

    private function getUserVector($userId)
    {
        return Detail_Transaksi::whereHas('transaksi', function ($q) use ($userId) {
                $q->where('id', $userId);
            })
            ->select('id_produk', DB::raw('SUM(jumlah) as total'))
            ->groupBy('id_produk')
            ->pluck('total', 'id_produk')
            ->toArray();
    }

    private function cosineSimilarity($A, $B)
    {
        if (empty($A) || empty($B)) {
            return 0;
        }

        $dotProduct = 0;
        foreach ($A as $key => $value) {
            if (isset($B[$key])) {
                $dotProduct += $value * $B[$key];
            }
        }

        if ($dotProduct == 0) {
            return 0;
        }

        $normA = sqrt(array_sum(array_map(fn($v) => $v ** 2, $A)));
        $normB = sqrt(array_sum(array_map(fn($v) => $v ** 2, $B)));

        return $dotProduct / ($normA * $normB);
    }
}

