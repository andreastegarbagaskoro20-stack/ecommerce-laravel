<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;

// Halaman utama
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('katalog');
    }

    return redirect()->route('login');
});

// Login dan Register
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Hak akses Admin dan Staff
Route::middleware(['auth', 'role:admin,staff'])->group(function () {

    // Read
    Route::get('/katalog', [ProdukController::class, 'index'])
        ->name('katalog');

    // Create, Read, Update
    Route::resource('produk', ProdukController::class)
        ->except(['destroy']);
});

// Delete hanya untuk Admin
Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])
    ->middleware(['auth', 'role:admin'])
    ->name('produk.destroy');