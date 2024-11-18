<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\Penduduk;
use App\Models\WaktuPelayanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $penduduk = Penduduk::count();
        $waktuPelayanan = WaktuPelayanan::count();
        $jenisSurat = JenisSurat::count();
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'penduduk' => $penduduk,
            'waktuPelayanan' => $waktuPelayanan,
            'jenisSurat' => $jenisSurat
        ]);
    }
}
