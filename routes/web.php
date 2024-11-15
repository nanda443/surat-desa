<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilDesaController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


//profil desa
Route::resource('profilDesa', ProfilDesaController::class);

Route::resource('penduduk', PendudukController::class);
