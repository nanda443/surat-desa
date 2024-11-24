<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendudukProfilController extends Controller
{
    //

    public function index()
    {
        $penduduk = Auth::user();
        return view('penduduk.profil.index', [
            'title' => 'Profil Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function edit()
    {
        $penduduk = Auth::user();
        return view('penduduk.profil.edit', [
            'title' => 'Edit Profil Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function update(Request $request)
    {
        // Validasi input
        $user = Auth::user();
        $penduduk = User::findOrFail($user->id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $penduduk->id,
            'phone' => 'required|string',
            'password' => 'nullable|string|min:8', // Tambahkan konfirmasi password jika diperlukan
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'nik' => 'required|string|unique:users,nik,' . $penduduk->id,
            'kk' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'gender' => 'nullable|string',
            'religion' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update data penduduk
        $penduduk->name = $request->name;
        $penduduk->email = $request->email;
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
        $penduduk->gender = $request->gender;
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

        return redirect()->route('penduduk.profil')->with('success', 'Data penduduk berhasil diperbarui!');
    }
}
