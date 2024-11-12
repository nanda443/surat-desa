<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendudukController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('penduduk', PendudukController::class);
