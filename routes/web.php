<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
Route::get('/', function () {
    return view('welcome');
});

// GANTI bagian ini
Route::get('/dashboard', [ObatController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tetap gunakan resource route untuk CRUD Obat
Route::middleware(['auth'])->group(function () {
    Route::resource('obat', App\Http\Controllers\ObatController::class);
});

Route::put('/obat/{obat}', [ObatController::class, 'update'])->name('obat.update');



require __DIR__.'/auth.php';
