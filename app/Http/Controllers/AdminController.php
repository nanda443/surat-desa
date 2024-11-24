<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admin = User::admin()->latest()->get();
        return view('admin.index', [
            'title' => 'Admin',
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create', [
            'title' => 'Tambah Admin'
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
            'email' => 'required|email|unique:users',
            'phone' => 'required|string',
            'password' => 'required|string|min:8',
            'date_of_birth' => 'required|date|before:today',
            'place_of_birth' => 'required|string|max:255',
            'nik' => 'required|string|unique:users',
            'kk' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'religion' => 'required|string',
            'gender' => 'required|string',
            'photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->date_of_birth = $request->date_of_birth;
        $admin->place_of_birth = $request->place_of_birth;
        $admin->nik = $request->nik;
        $admin->kk = $request->kk;
        $admin->rt = $request->rt;
        $admin->rw = $request->rw;
        $admin->religion = $request->religion;
        $admin->gender = $request->gender;
        $admin->role = 'admin';

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('photos', 'public');
            $admin->photo_path = $path;
        }

        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        //
        return view('admin.show', [
            'title' => 'Detail Data Admin',
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        //
        return view('admin.edit', [
            'title' => 'Edit data admin',
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'phone' => 'required|string',
            'password' => 'nullable|string|min:8', // Tambahkan konfirmasi password jika diperlukan
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'nik' => 'required|string|unique:users,nik,' . $admin->id,
            'kk' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'gender' => 'nullable|string',
            'religion' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update data admin
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->place_of_birth = $request->place_of_birth;
        $admin->date_of_birth = $request->date_of_birth;
        $admin->nik = $request->nik;
        $admin->kk = $request->kk;
        $admin->rt = $request->rt;
        $admin->rw = $request->rw;
        $admin->gender = $request->gender;
        $admin->religion = $request->religion;

        // Cek apakah ada foto baru yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($admin->photo_path) {
                Storage::delete($admin->photo_path);
            }

            // Upload foto baru
            $path = $request->file('photo')->store('photos', 'public');
            $admin->photo_path = $path; // Pastikan kolom ini sesuai dengan nama kolom di database
        }

        // Simpan perubahan
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Data admin berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        //
        //hapus foto
        if ($admin->photo_path && Storage::exists($admin->photo_path)) {
            Storage::delete($admin->photo_path);
        }

        $admin->delete(); // Hapus pengguna
        return redirect()->back()->with('success', 'admin berhasil dihapus!');
    }
}
