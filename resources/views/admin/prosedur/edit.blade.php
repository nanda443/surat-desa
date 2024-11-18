@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('prosedur.update', $prosedur) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label
                                                class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Prosedur</label>
                                            <div class="col-sm-12 col-md-12">
                                                <textarea class="form-control" name="deskripsi" rows="100">{{ implode("\n", json_decode($prosedur->deskripsi, true)) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Simpan</button>
                            <a href="{{ route('prosedur.index') }}" class="btn btn-light ml-3">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
