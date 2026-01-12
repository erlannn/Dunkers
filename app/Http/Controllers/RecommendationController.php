<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Detail_Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    /**
     * Membentuk vektor user berdasarkan histori pembelian
     * v_u = (q1, q2, ..., qn)
     */
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

    /**
     * Menghitung Cosine Similarity
     * sim(u,v) = (u·v) / (||u|| ||v||)
     */
    private function cosineSimilarity(array $A, array $B): float
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

        $normA = sqrt(array_sum(array_map(fn ($v) => $v ** 2, $A)));
        $normB = sqrt(array_sum(array_map(fn ($v) => $v ** 2, $B)));

        return $dotProduct / ($normA * $normB);
    }

    public function index()
    {
        // ================== JIKA BELUM LOGIN ==================
        if (!Auth::check()) {
            return view('produk', [
                'products' => collect(),
                'guest' => true
            ]);
        }

        $targetUser = Auth::user();

        // ================== VEKTOR USER TARGET ==================
        $targetVector = $this->getUserVector($targetUser->id);

        // Jika user belum pernah beli apapun
        if (empty($targetVector)) {
            return view('produk', [
                'products' => Produk::latest()->limit(6)->get(),
                'guest' => false
            ]);
        }

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

        if (empty($similarities)) {
            return view('produk', [
                'products' => Produk::latest()->limit(6)->get(),
                'guest' => false
            ]);
        }

        arsort($similarities);
        $topUsers = array_slice(array_keys($similarities), 0, 3);

        // ================== AMBIL PRODUK REKOMENDASI ==================
        $recommendedProductIds = Detail_Transaksi::whereHas('transaksi', function ($q) use ($topUsers) {
                $q->whereIn('user_id', $topUsers);
            })
            ->whereNotIn('produk_id', array_keys($targetVector))
            ->select('produk_id', DB::raw('SUM(jumlah) as score'))
            ->groupBy('produk_id')
            ->orderByDesc('score')
            ->limit(6)
            ->pluck('produk_id')
            ->toArray();

        if (empty($recommendedProductIds)) {
            return view('produk', [
                'products' => Produk::latest()->limit(6)->get(),
                'guest' => false
            ]);
        }

        $products = Produk::whereIn('id', $recommendedProductIds)
            ->orderByRaw('FIELD(id,' . implode(',', $recommendedProductIds) . ')')
            ->get();

        return view('produk', [
            'products' => $products,
            'guest' => false
        ]);
    }
}
