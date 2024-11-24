<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\Penduduk;
use App\Models\User;
use App\Models\WaktuPelayanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $penduduk = User::penduduk()->count();
        $admin = User::admin()->count();
        $waktuPelayanan = WaktuPelayanan::count();
        $jenisSurat = JenisSurat::count();
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'penduduk' => $penduduk,
            'admin' => $admin,
            'waktuPelayanan' => $waktuPelayanan,
            'jenisSurat' => $jenisSurat
        ]);
    }
}
