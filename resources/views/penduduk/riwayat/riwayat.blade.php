@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="GET"
                            action="{{ auth()->user()->role == 'admin' ? route('admin.pengajuan.riwayat') : route('penduduk.riwayat.surat') }}"
                            class="form-inline ml-auto">
                            <ul class="navbar-nav mr-3">
                                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                            class="fas fa-search"></i></a></li>
                            </ul>
                            <div class="search-element">
                                <input class="form-control" type="search" name="search" placeholder="Search"
                                    aria-label="Search" data-width="250" value="{{ old('search', $search ?? '') }}">
                                @if (request()->has('search') && request('search') != '')
                                    <a href="{{ auth()->user()->role == 'admin' ? route('admin.pengajuan.riwayat') : route('penduduk.riwayat.surat') }}"
                                        class="btn btn-primary ml-2">Reset
                                        Pencarian</a>
                                @else
                                    <button class="btn btn-primary ml-2" type="submit"><i
                                            class="fas fa-search"></i></button>
                                @endif
                            </div>
                        </form>
                        <div class="card-header">
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th class="">No</th>
                                        <th class="">Nama Pemohon</th>
                                        <th class="">Jenis Surat</th>
                                        <th class="">Kode Surat</th>
                                        <th class="">Tanggal Pengajuan</th>
                                        <th class="">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    @forelse ($riwayatSurat as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->jenisSurat->nama_surat }}</td>
                                            <td>{{ $item->jenisSurat->kode }}</td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td>
                                                @if ($item->status == 'Rejected')
                                                    <div class="badge badge-danger">{{ $item->status }}</div>
                                                @elseif ($item->status == 'Approved')
                                                    <div class="badge badge-success">{{ $item->status }}</div>
                                                @else
                                                    <div class="badge badge-warning">{{ $item->status }}</div>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                @if (auth()->user()->role == 'admin')
                                                    <a href="{{ route('pengajuan.download', $item->id) }}"
                                                        class="btn btn-primary btn-sm">Unduh Surat</a>
                                                @elseif ($item->status == 'Approved')
                                                    <a href="{{ route('penduduk.pengajuan.download', $item->id) }}"
                                                        class="btn btn-primary btn-sm">Unduh Surat</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada pengajuan surat saat ini.</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="d-flex justify-content-center">
            {{ $riwayatSurat->links() }}
        </div>
    </div>
@endsection
