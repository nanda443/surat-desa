@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Admin</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @php
                            // Cek apakah ada field yang kosong
                            $isIncomplete =
                                empty($admin->name) ||
                                empty($admin->date_of_birth) ||
                                empty($admin->place_of_birth) ||
                                empty($admin->nik) ||
                                empty($admin->kk) ||
                                empty($admin->pekerjaan) ||
                                empty($admin->rt) ||
                                empty($admin->rw) ||
                                empty($admin->phone) ||
                                empty($admin->religion) ||
                                empty($admin->gender);
                        @endphp

                        <div class="col-md-4">
                            @if ($isIncomplete)
                                <div class="badge badge-danger">Belum Lengkap</div>
                            @else
                                <div class="badge badge-success">Lengkap</div>
                            @endif
                            <div class="text-center">
                                @if ($admin->photo_path)
                                    <img src="{{ asset('storage/' . $admin->photo_path) }}" alt="Foto Admin"
                                        class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                                @else
                                    <img src="{{ asset('template/dist/assets/img/avatar/avatar-1.png') }}"
                                        alt="Foto Penduduk" class="img-thumbnail rounded-circle"
                                        style="width: 150px; height: 150px;">
                                @endif
                                <h4 class="mt-3">{{ $admin->name }}</h4>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>NIK:</strong> {{ $admin->nik }}</p>
                                    <p><strong>Nomor Kartu keluarga:</strong> {{ $admin->kk }}</p>
                                    <p><strong>Tempat Lahir:</strong> {{ $admin->place_of_birth }}</p>
                                    <p><strong>Tanggal Lahir:</strong>
                                        {{ \Carbon\Carbon::parse($admin->date_of_birth)->format('d-m-Y') }}</p>
                                    <p><strong>Jenis Kelamin:</strong> {{ $admin->gender }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Agama:</strong> {{ $admin->religion }}</p>
                                    <p><strong>Email:</strong> {{ $admin->email }}</p>
                                    <p><strong>Telepon:</strong> {{ $admin->phone }}</p>
                                    <p><strong>RT:</strong> {{ $admin->rt }}</p>
                                    <p><strong>RW:</strong> {{ $admin->rw }}</p>
                                    <p><strong>Pekerjaan:</strong> {{ $admin->pekerjaan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        @if ($isIncomplete)
                            <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning">Lengkapi Data</a>
                        @endif
                        <a href="{{ route('admin.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
