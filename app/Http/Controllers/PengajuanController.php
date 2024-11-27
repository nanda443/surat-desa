<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    //
    public function create($kode)
    {
        // Cari jenis surat berdasarkan kode
        $jenisSurat = JenisSurat::where('kode', $kode)->firstOrFail();
        $penduduk = Auth::user();

        return view('penduduk.pengajuan.form', [
            'title' => 'formulir ' . $jenisSurat->nama_surat,
            'jenisSurat' => $jenisSurat,
            'penduduk' => $penduduk
        ]);
    }

    public function submit(Request $request, $kode)
    {
        // Validasi inputan berdasarkan jenis surat
        $jenisSurat = JenisSurat::where('kode', $kode)->first();
        if (!$jenisSurat) {
            return redirect()->route('dashboard.penduduk')->with('error', 'Jenis surat tidak ditemukan!');
        }

        // Tentukan aturan validasi yang sesuai dengan jenis surat
        $rules = [
            'name' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nik' => 'required|numeric',
            'kk' => 'required|numeric',
            'pekerjaan' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:12',
            'religion' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
        ];

        // Tambahkan aturan validasi khusus jika jenis surat membutuhkan data tambahan
        if ($kode === 'SKTM') {
            $rules['ketua_rt'] = 'required|string|max:255';
            $rules['ketua_rw'] = 'required|string|max:255';
            $rules['penghasilan'] = 'required|numeric';
            $rules['alasan'] = 'required|string|max:1000';
        } elseif ($kode === 'SKM') {
            $rules['hari_tanggal_meninggal'] = 'required|date';
            $rules['tempat_pemakaman'] = 'required|string|max:255';
        } elseif ($kode === 'SKD') {
            $rules['alamat_domisili'] = 'required|string|max:255';
        } elseif ($kode === 'SKU') {
            $rules['nama_usaha'] = 'required|string|max:255';
        } elseif ($kode === 'SKAW') {
            $rules['nama_almarhum'] = 'required|string|max:255';
            $rules['hari_tanggal_meninggal'] = 'required|date';
            $rules['tempat_pemakaman'] = 'required|string|max:255';
            $rules['alamat_almarhum'] = 'required|string|max:255';
        }

        // Validasi data request
        $validated = $request->validate($rules);

        // Proses pengajuan sesuai dengan jenis surat
        $pengajuan = new Pengajuan();
        $pengajuan->penduduk_id = Auth::user()->id; // Asumsikan penduduk_id didapatkan dari login user
        $pengajuan->jenis_surat_id = $jenisSurat->id;
        $pengajuan->status = 'Menunggu'; // Status pengajuan default

        // Menambahkan data tambahan berdasarkan jenis surat
        switch ($kode) {
            case 'SKTM':
                $dataPengajuan['ketua_rt'] = $request->input('ketua_rt');
                $dataPengajuan['ketua_rw'] = $request->input('ketua_rw');
                $dataPengajuan['penghasilan'] = $request->input('penghasilan');
                $dataPengajuan['alasan'] = $request->input('alasan');
                break;
            case 'SKM':
                $dataPengajuan['hari_tanggal_meninggal'] = $request->input('hari_tanggal_meninggal');
                $dataPengajuan['tempat_pemakaman'] = $request->input('tempat_pemakaman');
                break;
            case 'SKD':
                $dataPengajuan['alamat_domisili'] = $request->input('alamat_domisili');
                break;
            case 'SKU':
                $dataPengajuan['nama_usaha'] = $request->input('nama_usaha');
                break;
            case 'SKAW':
                $dataPengajuan['nama_almarhum'] = $request->input('nama_almarhum');
                $dataPengajuan['hari_tanggal_meninggal'] = $request->input('hari_tanggal_meninggal');
                $dataPengajuan['tempat_pemakaman'] = $request->input('tempat_pemakaman');
                $dataPengajuan['alamat_almarhum'] = $request->input('alamat_almarhum');
                break;
            default;
        }

        // Mengonversi data pengajuan menjadi format JSON
        $pengajuan->data = json_encode($dataPengajuan);
        // Simpan perubahan
        $pengajuan->save();

        // Redirect atau beri respons
        return redirect()->route('penduduk.riwayat.surat')->with('success', 'Pengajuan berhasil dikirim.');
    }


    public function list($kode)
    {
        // Cari ID jenis_surat berdasarkan kode
        $jenisSurat = JenisSurat::where('kode', $kode)->first();

        if (!$jenisSurat) {
            abort(404, 'Jenis surat tidak ditemukan');
        }

        // Ambil semua pengajuan dengan jenis_surat_id yang sesuai
        $pengajuans = Pengajuan::where('jenis_surat_id', $jenisSurat->id)->latest()->paginate(10);
        return view('admin.pengajuan.list', [
            'title' => 'pengajuan',
            'pengajuans' => $pengajuans,
            'kode' => $kode
        ]);
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->data = json_decode($pengajuan->data, true);
        return view('admin.pengajuan.detail', [
            'title' => 'detail pengajuan',
            'pengajuan' => $pengajuan
        ]);
    }

    public function approve($id)
    {
        // Menemukan pengajuan berdasarkan ID
        $pengajuan = Pengajuan::findOrFail($id);

        // Mengubah status pengajuan menjadi Approved
        $pengajuan->status = 'Approved';

        // Membuat nomor surat: Nomor Urut / Kode Surat / Tanggal
        $tanggal = now()->format('Ymd'); // Format tanggal: YYYYMMDD
        $nomorUrut = Pengajuan::whereDate('created_at', now()->toDateString())->count() + 1; // Nomor urut hari ini
        $kodeSurat = $pengajuan->jenisSurat->kode; // Kode surat

        // Format nomor surat: Nomor Urut / Kode Surat / Tanggal
        $nomorSurat = sprintf('%03d/%s/%s', $nomorUrut, $kodeSurat, $tanggal);

        // Simpan nomor surat ke dalam pengajuan (langsung di database)
        $pengajuan->nomor_surat = $nomorSurat;

        // Ganti "/" dengan "-" untuk digunakan dalam nama file
        $nomorSuratFile = str_replace('/', '-', $nomorSurat);

        // Pilih template berdasarkan jenis surat
        $template = '';
        switch ($kodeSurat) {
            case 'SKTM':
                $template = 'surat.sktm';
                break;
            case 'SKM':
                $template = 'surat.skm';
                break;
            case 'SKD':
                $template = 'surat.skd';
                break;
            case 'SKU':
                $template = 'surat.sku';
                break;
            case 'SKAW':
                $template = 'surat.skaw';
                break;
            default:
                return redirect()->back()->with('error', 'Template surat tidak ditemukan.');
        }

        // Data untuk surat
        $data = [
            'profilDesa' => ProfilDesa::first(),
            'nomor_surat' => $nomorSurat,
            'name' => $pengajuan->user->name,
            'nik' => $pengajuan->user->nik,
            'kk' => $pengajuan->user->kk,
            'place_of_birth' => $pengajuan->user->place_of_birth,
            'date_of_birth' => $pengajuan->user->date_of_birth,
            'gender' => $pengajuan->user->gender,
            'rt' => $pengajuan->user->rt,
            'rw' => $pengajuan->user->rw,
            'pekerjaan' => $pengajuan->user->pekerjaan,
            'religion' => $pengajuan->user->religion,
            'kode_surat' => $kodeSurat,
            'tanggal' => now()->format('d-m-Y'),
            'data_pengajuan' => json_decode($pengajuan->data, true), // Data JSON spesifik
        ];

        // Generate PDF menggunakan template yang sesuai
        $pdf = Pdf::loadView($template, $data);

        // Simpan file PDF ke server
        $filePath = 'surat/' . $kodeSurat . '/' . $nomorSuratFile . '.pdf';
        Storage::disk('public')->put($filePath, $pdf->output());

        // Simpan path file ke database
        $pengajuan->file_surat = $filePath;

        // Simpan perubahan
        $pengajuan->save();

        // Redirect ke halaman pengajuan list dengan pesan sukses
        return redirect()->route('pengajuan.list', ['kode' => $kodeSurat])
            ->with('success', 'Pengajuan berhasil di-ACC dengan nomor surat: ' . $nomorSurat);
    }

    public function reject(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id); // Sesuaikan model
        $pengajuan->status = 'Rejected';
        $pengajuan->save();

        $kode = $pengajuan->jenisSurat->kode;
        return redirect()->route('pengajuan.list', ['kode' => $kode])->with('success', 'Pengajuan berhasil ditolak.');
    }

    public function download($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->status !== 'Approved') {
            return redirect()->route('pengajuan.list', ['kode' => $pengajuan->jenisSurat->kode])
                ->with('error', 'Surat belum di-ACC, tidak dapat diunduh.');
        }

        try {
            $filePath = $pengajuan->getRawOriginal('file_surat');

            if (!Storage::disk('public')->exists($filePath)) {
                throw new \Exception('File tidak ditemukan di path: ' . $filePath);
            }

            return Storage::disk('public')->download($filePath);
        } catch (\Exception $e) {
            Log::error('Error downloading file: ' . $e->getMessage());
            return redirect()
                ->route('pengajuan.list', ['kode' => $pengajuan->jenisSurat->kode])
                ->with('error', 'Error saat mengunduh file: ' . $e->getMessage());
        }
    }

    public function riwayat(Request $request)
    {
        // Ambil data pencarian dari input
        $search = $request->input('search');

        // Ambil data pengajuan milik pengguna saat ini
        if (Auth::user()->role == 'admin') {
            // Jika admin, dapat melihat semua riwayat surat yang disetujui
            $riwayatSurat = Pengajuan::where('status', 'Approved')
                ->when($search, function ($query, $search) {
                    // Filter berdasarkan kode surat (jenisSurat->kode), nama pemohon, jenis surat, atau status
                    $query->whereHas('jenisSurat', function ($q) use ($search) {
                        $q->where('kode', 'like', '%' . $search . '%');
                    })
                        ->orWhereHas('user', function ($q) use ($search) {
                            $q->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('jenisSurat', function ($q) use ($search) {
                            $q->where('nama_surat', 'like', '%' . $search . '%');
                        })
                        ->orWhere('status', 'like', '%' . $search . '%');
                })
                ->latest()
                ->paginate(10)
                ->appends(['search' => $search]); // Menjaga query pencarian saat paginasi
            return view('penduduk.riwayat.riwayat', [
                'title' => 'Riwayat Surat',
                'riwayatSurat' => $riwayatSurat,
                'search' => $search
            ]);
        } else {
            // Jika pengguna biasa, hanya melihat riwayat surat miliknya
            $riwayatSurat = Pengajuan::where('penduduk_id', Auth::user()->id)
                ->when($search, function ($query, $search) {
                    // Filter berdasarkan kode surat (jenisSurat->kode), jenis surat, atau status
                    $query->whereHas('jenisSurat', function ($q) use ($search) {
                        $q->where('kode', 'like', '%' . $search . '%');
                    })
                        ->orWhereHas('jenisSurat', function ($q) use ($search) {
                            $q->where('nama_surat', 'like', '%' . $search . '%');
                        })
                        ->orWhere('status', 'like', '%' . $search . '%');
                })
                ->latest()
                ->paginate(10)
                ->appends(['search' => $search]); // Menjaga query pencarian saat paginasi
            return view('penduduk.riwayat.riwayat', [
                'title' => 'Riwayat Surat',
                'riwayatSurat' => $riwayatSurat,
                'search' => $search
            ]);
        }
    }
}
