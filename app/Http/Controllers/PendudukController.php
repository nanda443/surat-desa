<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use Illuminate\Validation\Rules\Unique;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penduduk = Penduduk::latest()->paginate(10);
        return view('admin.penduduk.index', [
            'title' => 'Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.penduduk.create', [
            'title' => 'Tambah Penduduk'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:penduduks',
            'password' => 'required|string|min:8',
            'date_of_birth' => 'required|date|before:today',
            'place_of_birth' => 'required|string|max:255',
            'nik' => 'required|string|unique:penduduks',
            'kk' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'religion' => 'required|string',
            'gender' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $penduduk = new Penduduk();
        $penduduk->name = $request->name;
        $penduduk->phone = $request->phone;
        $penduduk->password = bcrypt($request->password);
        $penduduk->date_of_birth = $request->date_of_birth;
        $penduduk->place_of_birth = $request->place_of_birth;
        $penduduk->nik = $request->nik;
        $penduduk->kk = $request->kk;
        $penduduk->rt = $request->rt;
        $penduduk->rw = $request->rw;
        $penduduk->desa = $request->desa;
        $penduduk->kecamatan = $request->kecamatan;
        $penduduk->kabupaten = $request->kabupaten;
        $penduduk->religion = $request->religion;
        $penduduk->gender = $request->gender;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $penduduk->photo_path = $path;
        }

        $penduduk->save();

        return redirect()->route('penduduk.index')->with('success', 'penduduk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
        return view('admin.penduduk.show', [
            'title' => 'Detail Data Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        //
        return view('admin.penduduk.edit', [
            'title' => 'Edit data penduduk',
            'penduduk' => $penduduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:penduduks,phone,' . $penduduk->id,
            'password' => 'nullable|string|min:8', // Tambahkan konfirmasi password jika diperlukan
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nik' => 'required|string|unique:penduduks,nik,' . $penduduk->id,
            'kk' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'religion' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update data penduduk
        $penduduk->name = $request->name;
        $penduduk->phone = $request->phone;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $penduduk->password = bcrypt($request->password);
        }

        $penduduk->place_of_birth = $request->place_of_birth;
        $penduduk->date_of_birth = $request->date_of_birth;
        $penduduk->nik = $request->nik;
        $penduduk->kk = $request->kk;
        $penduduk->rt = $request->rt;
        $penduduk->rw = $request->rw;
        $penduduk->desa = $request->desa;
        $penduduk->kecamatan = $request->kecamatan;
        $penduduk->kabupaten = $request->kabupaten;
        $penduduk->religion = $request->religion;

        // Cek apakah ada foto baru yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($penduduk->photo_path) {
                Storage::delete($penduduk->photo_path);
            }

            // Upload foto baru
            $path = $request->file('photo')->store('photos', 'public');
            $penduduk->photo_path = $path; // Pastikan kolom ini sesuai dengan nama kolom di database
        }

        // Simpan perubahan
        $penduduk->save();

        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        //hapus foto
        if ($penduduk->photo_path && Storage::exists($penduduk->photo_path)) {
            Storage::delete($penduduk->photo_path);
        }

        $penduduk->delete(); // Hapus pengguna
        return redirect()->back()->with('success', 'Penduduk berhasil dihapus!');
    }
}
