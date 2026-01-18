<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Produk;
use App\Models\Metode_Pembayaran;
use App\Models\Transaksi;
use App\Models\Detail_Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, Produk $produk)
    {
        $produk->load('kategori.ukurans');

        if ($produk->kategori && $produk->kategori->ukurans->count()) {
            $request->validate([
                'ukuran_id' => 'required',
                'qty' => 'required|min:1'
            ]);
        } else {
            $request->validate([
                'qty' => 'required|min:1'
            ]);
        }

        $ukuranId = $request->ukuran_id ?? null;

        Cart::updateOrCreate([
            'user_id'   => Auth::id(),
            'produk_id' => $produk->id,
            'ukuran_id' => $ukuranId,
        ],[
            'qty' => DB::raw('qty + '.$request->qty)
        ]);

        return back()->with('success','Produk berhasil dimasukkan ke keranjang');
    }

    public function index()
    {
        $carts = Cart::with(['produk','ukuran'])
                    ->where('user_id', Auth::id())
                    ->get();

        return view('cart', compact('carts'));
    }

    public function checkout(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())->get();

        foreach ($carts as $cart) {
            $cart->produk->decrement('stok', $cart->qty);
        }

        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('produk')->with('success','Checkout berhasil');
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate(['qty'=>'required|min:1']);
        $cart->update(['qty'=>$request->qty]);

        return back()->with('success','Qty diperbarui');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('success','Item dihapus');
    }

    public function checkoutPage()
    {
        $carts = Cart::where('user_id',Auth::id())->with('produk','ukuran')->get();
        $metodes = Metode_Pembayaran::all();

        return view('checkout', compact('carts','metodes'));
    }

    public function checkoutStore(Request $request)
    {
        $request->validate([
            'metode_pembayaran_id'=>'required|exists:metode_pembayaran,id'
        ]);

        $carts = Cart::where('user_id',Auth::id())->with('produk')->get();

        DB::transaction(function() use ($request,$carts){

            $total = $carts->sum(fn($c)=> $c->produk->harga * $c->qty);

            $trx = Transaksi::create([
                'user_id'=>Auth::id(),
                'metode_pembayaran_id'=>$request->metode_pembayaran_id,
                'total'=>$total,
                'status'=>'paid',
                'tanggal' => now()
            ]);

            foreach($carts as $cart){
                Detail_Transaksi::create([
                    'transaksi_id'=>$trx->id,
                    'produk_id'=>$cart->produk_id,
                    'ukuran_id'=>$cart->ukuran_id,
                    'jumlah'=>$cart->qty,
                    'harga'=>$cart->produk->harga
                ]);

                $cart->produk->decrement('stok',$cart->qty);
            }

            Cart::where('user_id',Auth::id())->delete();
        });

        return redirect('/')->with('success','Checkout berhasil');
    }

}

