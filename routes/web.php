<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/keranjang', function () {
    return view('keranjang');
})->name('keranjang');

// Route::get('/produk', [RecommendationController::class, 'index'])->name('produk');
// Route::get('/keranjang', [ProdukController::class, 'index'])->name('keranjang');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

Route::get('/cart', [CartController::class, 'index'])->middleware(['auth', 'verified'])->name('cart.index');
Route::post('/cart/{produk}', [CartController::class, 'add'])->middleware(['auth', 'verified'])->name('cart.add');
Route::post('/checkout', [CartController::class, 'checkout'])->middleware(['auth', 'verified'])->name('cart.checkout');

Route::patch('/cart/{cart}', [CartController::class, 'update'])->middleware(['auth', 'verified'])->name('cart.update');
Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->middleware(['auth', 'verified'])->name('cart.destroy');
Route::post('/checkout', [CartController::class, 'checkout'])->middleware(['auth', 'verified'])->name('cart.checkout');

Route::get('/checkout', [CartController::class,'checkoutPage'])->name('checkout.page');
Route::post('/checkout', [CartController::class,'checkoutStore'])->name('checkout.store');

// Route::get('/detil', function () {
//     return view('detail-produk');
// })->name('detail-produk');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
