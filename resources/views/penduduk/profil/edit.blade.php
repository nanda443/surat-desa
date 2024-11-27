@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('penduduk.profil.update', $penduduk) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputName">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="inputName" placeholder="" value="{{ $penduduk->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="Email" value="{{ $penduduk->email }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="inputPassword4" placeholder="Kosongkan jika tidak ingin mengubah">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tempatLahir">Tempat Lahir</label>
                                <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror"
                                    name="place_of_birth" id="tempatLahir" value="{{ $penduduk->place_of_birth }}">
                                @error('place_of_birth')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalLahir">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                    name="date_of_birth" id="tanggalLahir" value="{{ $penduduk->date_of_birth }}">
                                @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Nik">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                                    oninput="this.value = this.value.replace(/\D/g, '')" id="Nik"
                                    value="{{ $penduduk->nik }}">
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kk">No Kartu Keluarga</label>
                                <input type="text" class="form-control @error('kk') is-invalid @enderror" name="kk"
                                    oninput="this.value = this.value.replace(/\D/g, '')" id="kk"
                                    value="{{ $penduduk->kk }}">
                                @error('kk')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                    name="pekerjaan" id="pekerjaan" value="{{ $penduduk->pekerjaan }}">
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/\D/g, '')" name="phone" id="telepon"
                                    value="{{ $penduduk->phone }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Agama</label>
                                <select class="form-control @error('religion') is-invalid @enderror" name="religion">
                                    <option value="" disabled hidden selected>Pilih Agama</option>
                                    <option value="Islam" {{ $penduduk->religion == 'Islam' ? 'selected' : '' }}>Islam
                                    </option>
                                    <option value="Kristen" {{ $penduduk->religion == 'Kristen' ? 'selected' : '' }}>
                                        Kristen
                                    </option>
                                    <option value="Hindu" {{ $penduduk->religion == 'Hindu' ? 'selected' : '' }}>
                                        Hindu</option>
                                    <option value="Budha" {{ $penduduk->religion == 'Budha' ? 'selected' : '' }}>
                                        Budha</option>
                                    <option value="Konghucu" {{ $penduduk->religion == 'Konghucu' ? 'selected' : '' }}>
                                        Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option value="" disabled hidden selected>Pilih Jenis kelamin</option>
                                    <option value="Laki-laki" {{ $penduduk->gender == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ $penduduk->gender == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="RT">RT<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rt') is-invalid @enderror"
                                    name="rt" oninput="this.value = this.value.replace(/\D/g, '')" id="RT"
                                    value="{{ $penduduk->rt }}">
                                @error('rt')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="RW">RW<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rw') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/\D/g, '')" name="rw" id="RW"
                                    value="{{ $penduduk->rw }}">
                                @error('rw')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image1">Foto</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                name="photo" id="image1">
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if ($penduduk->photo_path)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $penduduk->photo_path) }}" alt="Foto Penduduk"
                                        class="img-thumbnail" style="width: 150px;">
                                    <p>Foto lama akan tetap digunakan jika tidak diubah.</p>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Simpan</button>
                            <a href="{{ route('penduduk.index') }}" class="btn btn-light ml-3">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
