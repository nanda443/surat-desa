<?php

namespace App\Http\Controllers;

use App\Models\Prosedur;
use App\Http\Requests\StoreProsedurRequest;
use App\Http\Requests\UpdateProsedurRequest;
use Illuminate\Http\Request;

class ProsedurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $prosedur = Prosedur::first();
        return view('admin.prosedur.index', [
            'title' => 'Prosedur pengajuan Surat',
            'prosedur' => $prosedur
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProsedurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Prosedur $prosedur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prosedur $prosedur)
    {
        //
        return view('admin.prosedur.edit', [
            'title' => 'Edit Prosedur',
            'prosedur' => $prosedur
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prosedur $prosedur)
    {
        //

        $request->validate([
            'deskripsi' => 'required|string'
        ]);

        $prosedur->update([
            'deskripsi' => json_encode(explode("\n", $request->deskripsi)), // Simpan setiap baris sebagai elemen array
        ]);

        return redirect()->route('prosedur.index')->with('success', 'Data Prosedur berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prosedur $prosedur)
    {
        //
    }
}
