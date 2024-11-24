@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.update', $admin) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputName">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="inputName" placeholder="" value="{{ $admin->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="Email" value="{{ $admin->email }}">
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
                                    name="place_of_birth" id="tempatLahir" value="{{ $admin->place_of_birth }}">
                                @error('place_of_birth')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalLahir">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                    name="date_of_birth" id="tanggalLahir" value="{{ $admin->date_of_birth }}">
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
                                    value="{{ $admin->nik }}">
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kk">No Kartu Keluarga</label>
                                <input type="text" class="form-control @error('kk') is-invalid @enderror" name="kk"
                                    oninput="this.value = this.value.replace(/\D/g, '')" id="kk"
                                    value="{{ $admin->kk }}">
                                @error('kk')
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
                                    <option value="Islam" {{ $admin->religion == 'Islam' ? 'selected' : '' }}>Islam
                                    </option>
                                    <option value="Kristen" {{ $admin->religion == 'Kristen' ? 'selected' : '' }}>
                                        Kristen
                                    </option>
                                    <option value="Hindu" {{ $admin->religion == 'Hindu' ? 'selected' : '' }}>
                                        Hindu</option>
                                    <option value="Budha" {{ $admin->religion == 'Budha' ? 'selected' : '' }}>
                                        Budha</option>
                                    <option value="Konghucu" {{ $admin->religion == 'Konghucu' ? 'selected' : '' }}>
                                        Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option value="" disabled hidden selected>Pilih Jenis kelamin</option>
                                    <option value="Laki-laki" {{ $admin->gender == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ $admin->gender == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/\D/g, '')" name="phone" id="telepon"
                                    value="{{ $admin->phone }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="RT">RT<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rt') is-invalid @enderror"
                                    name="rt" oninput="this.value = this.value.replace(/\D/g, '')" id="RT"
                                    value="{{ $admin->rt }}">
                                @error('rt')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="RW">RW<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rw') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/\D/g, '')" name="rw" id="RW"
                                    value="{{ $admin->rw }}">
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
                            @if ($admin->photo_path)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $admin->photo_path) }}" alt="Foto admin"
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
