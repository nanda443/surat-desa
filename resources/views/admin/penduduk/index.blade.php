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
                        <div class="card-header">
                            <div class="buttons">
                                <a href="{{ route('penduduk.create') }}" class="btn btn-primary">Tambah Penduduk</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Lengkap</th>
                                        <th class="text-center">Email</th>
                                        {{-- <th class="text-center">Telepon</th> --}}
                                        <th class="text-center">Tannggal Lahir</th>
                                        <th class="text-center">Tempat Lahir</th>
                                        <th class="text-center">NIK</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Agama</th>
                                        {{-- <th class="text-center">Alamat</th> --}}
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    <?php $no = 1; ?>
                                    @foreach ($penduduk as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            {{-- <td>{{ $item->phone }}</td> --}}
                                            <td>{{ $item->date_of_birth }}</td>
                                            <td>{{ $item->place_of_birth }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->religion }}</td>
                                            {{-- <td>{{ $item->address }}</td> --}}
                                            <td>
                                                @php
                                                    // Cek apakah ada field yang kosong
                                                    $isIncomplete =
                                                        empty($item->name) ||
                                                        empty($item->date_of_birth) ||
                                                        empty($item->place_of_birth) ||
                                                        empty($item->nik) ||
                                                        empty($item->kk) ||
                                                        empty($item->rt) ||
                                                        empty($item->rw) ||
                                                        empty($item->phone) ||
                                                        empty($item->religion) ||
                                                        empty($item->gender);
                                                @endphp

                                                @if ($isIncomplete)
                                                    <div class="badge badge-danger">Belum Lengkap</div>
                                                @else
                                                    <div class="badge badge-success">Lengkap</div>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('penduduk.show', $item->id) }}" class="btn btn-info mr-2"
                                                    data-toggle="tooltip" data-placement="top" title="Detail"><i
                                                        class="fas fa-info-circle"></i></a>
                                                <a href="{{ route('penduduk.edit', $item->id) }}"
                                                    class="btn btn-icon btn-primary mr-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><i class="far fa-edit"></i></a>

                                                <form action="{{ route('penduduk.destroy', $item->id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaju ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-danger"
                                                        data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="d-flex justify-content-center">
            {{ $penduduk->links() }}
        </div>
    </div>
@endsection
