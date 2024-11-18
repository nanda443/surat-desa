@extends('layouts.app')

@section('content')
    @php
        // Decode JSON deskripsi, atau gunakan array kosong jika deskripsi null/invalid
        $steps = [];
        if (!empty($prosedur->deskripsi)) {
            $steps = json_decode($prosedur->deskripsi, true) ?? [];
        }
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1 class="display-4 text-center">{{ $title }}</h1>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            @if (count($steps) > 0)
                                <ol>
                                    @foreach ($steps as $step)
                                        <li>{{ $step }}</li>
                                    @endforeach
                                </ol>
                            @else
                                <p class="text-muted">Prosedur belum tersedia. Silakan tambahkan langkah-langkahnya.</p>
                            @endif
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('prosedur.edit', $prosedur->id) }}" class="btn btn-warning btn-lg">Edit
                            Prosedur</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
