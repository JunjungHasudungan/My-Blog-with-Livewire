<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'kategori'  => KategoriController::class,
    ]);
    // Route::resource('kategori',[ KategoriController::class, 'index']);
});
require __DIR__.'/auth.php';
