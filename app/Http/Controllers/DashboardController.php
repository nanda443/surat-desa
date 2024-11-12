<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $penduduk = Penduduk::count();
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'penduduk' => $penduduk
        ]);
    }
}
