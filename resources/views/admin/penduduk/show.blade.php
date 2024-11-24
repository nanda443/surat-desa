@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @php
                            // Cek apakah ada field yang kosong
                            $isIncomplete =
                                empty($penduduk->name) ||
                                empty($penduduk->date_of_birth) ||
                                empty($penduduk->place_of_birth) ||
                                empty($penduduk->nik) ||
                                empty($penduduk->kk) ||
                                empty($penduduk->rt) ||
                                empty($penduduk->rw) ||
                                empty($penduduk->phone) ||
                                empty($penduduk->religion) ||
                                empty($penduduk->gender);
                        @endphp
                        <div class="col-md-4">
                            @if ($isIncomplete)
                                <div class="badge badge-danger">Belum Lengkap</div>
                            @else
                                <div class="badge badge-success">Lengkap</div>
                            @endif
                            <div class="text-center">
                                @if ($penduduk->photo_path)
                                    <img src="{{ asset('storage/' . $penduduk->photo_path) }}" alt="Foto Penduduk"
                                        class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                                @else
                                    <img src="{{ asset('template/dist/assets/img/avatar/avatar-1.png') }}"
                                        alt="Foto Penduduk" class="img-thumbnail rounded-circle"
                                        style="width: 150px; height: 150px;">
                                @endif
                                <h4 class="mt-3">{{ $penduduk->name }}</h4>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>NIK:</strong> {{ $penduduk->nik }}</p>
                                    <p><strong>Nomor Kartu keluarga:</strong> {{ $penduduk->kk }}</p>
                                    <p><strong>Tempat Lahir:</strong> {{ $penduduk->place_of_birth }}</p>
                                    <p><strong>Tanggal Lahir:</strong>
                                        {{ \Carbon\Carbon::parse($penduduk->date_of_birth)->format('d-m-Y') }}</p>
                                    <p><strong>Jenis Kelamin:</strong> {{ $penduduk->gender }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Agama:</strong> {{ $penduduk->religion }}</p>
                                    <p><strong>Email:</strong> {{ $penduduk->email }}</p>
                                    <p><strong>Telepon:</strong> {{ $penduduk->phone }}</p>
                                    <p><strong>RT:</strong> {{ $penduduk->rt }}</p>
                                    <p><strong>RW:</strong> {{ $penduduk->rw }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        @if ($isIncomplete)
                            <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="btn btn-warning">Lengkapi Data</a>
                        @endif
                        <a href="{{ route('penduduk.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
