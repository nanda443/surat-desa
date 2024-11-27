@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengajuan Surat - {{ $kode }}</h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jenis Surat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengajuans as $pengajuan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengajuan->user->name }}</td>
                                    <td>{{ $pengajuan->jenisSurat->nama_surat }}</td>
                                    <td>
                                        @if ($pengajuan->status == 'Rejected')
                                            <div class="badge badge-danger">{{ $pengajuan->status }}</div>
                                        @elseif ($pengajuan->status == 'Approved')
                                            <div class="badge badge-success">{{ $pengajuan->status }}</div>
                                        @else
                                            <div class="badge badge-warning">{{ $pengajuan->status }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pengajuan.show', $pengajuan->id) }}"
                                            class="btn btn-warning btn-sm mr-4">Periksa Data</a>
                                        <a href="{{ route('pengajuan.download', $pengajuan->id) }}"
                                            class="btn btn-primary btn-sm">Unduh Surat</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada pengajuan surat saat ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <div class="d-flex justify-content-center">
            {{ $pengajuans->links() }}
        </div>
    </div>
@endsection
