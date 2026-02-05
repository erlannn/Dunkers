<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\Models\Detail_Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        // SEARCH
        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // LOAD 8 DATA
        $produk = $query->orderBy('id', 'desc')->paginate(8);

        // AJAX RESPONSE
        if ($request->ajax()) {
            return view('items-produk', compact('produk'))->render();
        }

        return view('produk', compact('produk'));
    }

    // ================== CF SUPPORT (VERSI) ==================

    /**
     * Membentuk vektor user berdasarkan jumlah pembelian produk
     */
    private function getUserVector(int $userId): array
    {
        return Detail_Transaksi::join('transaksi', 'transaksi.id', '=', 'detail_transaksi.transaksi_id')
            ->where('transaksi.user_id', $userId)
            ->select(
                'detail_transaksi.produk_id',
                DB::raw('SUM(detail_transaksi.jumlah) as total')
            )
            ->groupBy('detail_transaksi.produk_id')
            ->pluck('total', 'produk_id')
            ->toArray();
    }

    /**
     * Cosine similarity antar user (murni)
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

    private function getCFRecommendations(int $userId, int $limit = 4)
    {
        $user = Auth::user();

        if (!$user) return collect();

        if ($user->role_id == 1) return collect();

        $targetVector = $this->getUserVector($userId);
        if (count($targetVector) < 1) return collect();

        $users = User::where('id', '!=', $userId)
            ->where('role_id', '!=', 1)
            ->whereHas('transaksi')
            ->pluck('id');

        $similarities = [];

        foreach ($users as $otherUserId) {
            $otherVector = $this->getUserVector($otherUserId);
            if (empty($otherVector)) continue;

            $sim = $this->cosineSimilarity($targetVector, $otherVector);

             // 👇 LOG SCORE
            // Log::info("CF Similarity", [
            //     'target_user' => $userId,
            //     'other_user' => $otherUserId,
            //     'score' => $sim,
            //     'targetVector' => $targetVector,
            //     'otherVector' => $otherVector,
            // ]);

            // dd($sim);

            if ($sim >= 0.2) {
                $similarities[$otherUserId] = $sim;
            }
        }

        if (empty($similarities)) return collect();

        arsort($similarities);

        $scores = [];

        foreach ($similarities as $otherUserId => $sim) {
            $otherVector = $this->getUserVector($otherUserId);
            if (empty($otherVector)) continue;

            foreach ($otherVector as $produkId => $value) {
                if (!isset($targetVector[$produkId])) {
                    if (!isset($scores[$produkId])) {
                        $scores[$produkId] = 0;
                    }

                    $scores[$produkId] += $sim * $value;
                }
            }
        }

        if (empty($scores)) return collect();

        arsort($scores);

        $produkIds = array_keys(array_slice($scores, 0, $limit, true));

        return Produk::whereIn('id', $produkIds)->take($limit)->get();
    }

    // ================== SHOW DETAIL + CF ==================

    public function show($id)
    {
        $user = Auth::user();
        $produk = Produk::with('kategori.ukurans', 'merek')->findOrFail($id);

        $rekomendasi = collect();
        $guest = true;
        $isAdmin = false;

        if (Auth::check()) {
            $guest = false;

            $user = Auth::user();

            if ($user->role_id == 1) {
                $isAdmin = true;
            } else {
                $userId = $user->id;
                $rekomendasi = $this->getCFRecommendations($userId, 4);
            }
        }

        return view('detail-produk', compact('produk', 'rekomendasi', 'guest', 'isAdmin'));
    }

}
