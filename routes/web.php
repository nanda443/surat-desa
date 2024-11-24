<?php

use App\Models\JenisSurat;
use App\Models\ProfilDesa;
use App\Models\WaktuPelayanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\WaktuPelayananController;
use App\Http\Controllers\penduduk\PendudukDashboardController;
use App\Http\Controllers\PendudukProfilController;

Route::get('/', function () {
    $waktuPelayanan = WaktuPelayanan::get();
    $jenisSurat = JenisSurat::get();
    $profilDesa = ProfilDesa::first();
    return view('welcome', [
        'waktuPelayanan' => $waktuPelayanan,
        'jenisSurat' => $jenisSurat,
        'profilDesa' => $profilDesa
    ]);
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profilDesa', ProfilDesaController::class);
    Route::resource('penduduk', PendudukController::class);
    Route::resource('waktu-pelayanan', WaktuPelayananController::class);
    Route::resource('jenis-surat', JenisSuratController::class);
    Route::resource('admin', AdminController::class);
});

Route::middleware(['auth', 'role:penduduk'])->prefix('penduduk')->group(function () {
    Route::get('/dashboard', [PendudukDashboardController::class, 'index'])->name('dashboard.penduduk');
    Route::get('/profil', [PendudukProfilController::class, 'index'])->name('penduduk.profil');
    Route::get('profil/edit', [PendudukProfilController::class, 'edit'])->name('penduduk.profil.edit');
    Route::put('/profil', [PendudukProfilController::class, 'update'])->name('penduduk.profil.update');
});

require __DIR__ . '/auth.php';
