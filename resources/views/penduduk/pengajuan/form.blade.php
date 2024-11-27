@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengajuan {{ $jenisSurat->nama_surat }}</h1>
            </div>
            <div class="card">
                <span class="text-warning">Jika ada data yang kosong / belum sesuai, lengkapi di <a class="text-warning"
                        href="{{ route('penduduk.profil') }}">profil</a></span>
                <div class="card-body">
                    <form action="{{ route('pengajuan.submit', $jenisSurat->kode) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- Field Data Penduduk --}}
                        <div class="form-group">
                            <label for="inputName">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="inputName" placeholder="" value="{{ $penduduk->name }}" readonly>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tempatLahir">Tempat Lahir<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror"
                                    name="place_of_birth" id="tempatLahir" value="{{ $penduduk->place_of_birth }}" readonly>
                                @error('place_of_birth')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalLahir">Tanggal Lahir<span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                    name="date_of_birth" id="tanggalLahir" value="{{ $penduduk->date_of_birth }}" readonly>
                                @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Nik">NIK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                                    oninput="this.value = this.value.replace(/\D/g, '')" id="Nik"
                                    value="{{ $penduduk->nik }}" readonly>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kk">No Kartu Keluarga<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kk') is-invalid @enderror" name="kk"
                                    oninput="this.value = this.value.replace(/\D/g, '')" id="kk"
                                    value="{{ $penduduk->kk }}" readonly>
                                @error('kk')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pekerjaan">Pekerjaan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                    name="pekerjaan" id="pekerjaan" value="{{ $penduduk->pekerjaan }}" readonly>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="telepon">Telepon<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/\D/g, '')" name="phone" id="telepon"
                                    value="{{ $penduduk->phone }}" readonly>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="agama">Agama<span class="text-danger">*</span></label>
                                <input type="text" id="agama"
                                    class="form-control @error('religion') is-invalid @enderror" name="religion"
                                    value="{{ $penduduk->religion }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                                <input type="text" id="jenisKelamin"
                                    class="form-control @error('gender') is-invalid @enderror" name="gender"
                                    value="{{ $penduduk->gender }}" readonly>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="RT">RT<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rt') is-invalid @enderror"
                                    name="rt" oninput="this.value = this.value.replace(/\D/g, '')" id="RT"
                                    value="{{ $penduduk->rt }}" readonly>
                                @error('rt')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="RW">RW<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rw') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/\D/g, '')" name="rw" id="RW"
                                    value="{{ $penduduk->rw }}" readonly>
                                @error('rw')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- Field Tambahan Khusus Jenis Surat --}}
                        @if ($jenisSurat->kode === 'SKTM')
                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="ketuaRt">Nama Ketua RT<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('ketua_rt') is-invalid @enderror"
                                        name="ketua_rt" id="ketuaRt" value="{{ old('ketua_rt') }}">
                                    @error('ketua_rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="ketuaRw">Nama Ketua RW<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('ketua_rw') is-invalid @enderror"
                                        name="ketua_rw" id="ketuaRw" value="{{ old('ketua_rw') }}">
                                    @error('ketua_rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="penghasilan">Penghasilan Perbulan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('penghasilan') is-invalid @enderror"
                                        oninput="this.value = this.value.replace(/\D/g, '')" name="penghasilan"
                                        id="penghasilan" value="{{ old('penghasilan') }}">
                                    @error('penghasilan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-grup col-md-12">
                                    <label for="alasan">Alasan Pengajuan<span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('alasan') is-invalid @enderror" name="alasan" id="alasan" rows="10">{{ old('alasan') }}</textarea>
                                    @error('alasan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @elseif ($jenisSurat->kode === 'SKM')
                            <div class="form-group">
                                <label for="hariTanggalMeninggal">Tanggal Meninggal<span
                                        class="text-danger">*</span></label>
                                <input type="date"
                                    class="form-control @error('hari_tanggal_meninggal') is-invalid @enderror"
                                    name="hari_tanggal_meninggal" id="hariTanggalMeninggal"
                                    value="{{ old('hari_tanggal_meninggal') }}">
                                @error('hari_tanggal_meninggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tempatPemakaman">Tempat Pemakaman<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('tempat_pemakaman') is-invalid @enderror"
                                    name="tempat_pemakaman" id="tempatPemakaman" value="{{ old('tempat_pemakaman') }}">
                                @error('tempat_pemakaman')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @elseif ($jenisSurat->kode === 'SKD')
                            <div class="form-group">
                                <label for="alamatDomisili">Alamat Domisili<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('alamat_domisili') is-invalid @enderror"
                                    name="alamat_domisili" id="alamatDomisili" value="{{ old('alamat_domisili') }}">
                                @error('alamat_domisili')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @elseif ($jenisSurat->kode === 'SKU')
                            <div class="form-group">
                                <label for="namaUsaha">Nama Usaha<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_usaha') is-invalid @enderror"
                                    name="nama_usaha" id="namaUsaha" value="{{ old('nama_usaha') }}">
                                @error('nama_usaha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @elseif ($jenisSurat->kode === 'SKAW')
                            <div class="form-group">
                                <label for="namaAlmarhum">Nama Orang yang Meninggal<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_almarhum') is-invalid @enderror"
                                    name="nama_almarhum" id="namaAlmarhum" value="{{ old('nama_almarhum') }}">
                                @error('nama_almarhum')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hariTanggalMeninggal">Tanggal Meninggal<span
                                        class="text-danger">*</span></label>
                                <input type="date"
                                    class="form-control @error('hari_tanggal_meninggal') is-invalid @enderror"
                                    name="hari_tanggal_meninggal" id="hariTanggalMeninggal"
                                    value="{{ old('hari_tanggal_meninggal') }}">
                                @error('hari_tanggal_meninggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tempatPemakaman">Tempat Pemakaman<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('tempat_pemakaman') is-invalid @enderror"
                                    name="tempat_pemakaman" id="tempatPemakaman" value="{{ old('tempat_pemakaman') }}">
                                @error('tempat_pemakaman')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamatAlmarhum">Alamat Orang yang Meninggal<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('alamat_almarhum') is-invalid @enderror"
                                    name="alamat_almarhum" id="alamatAlmarhum" value="{{ old('alamat_almarhum') }}">
                                @error('alamat_almarhum')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        {{-- Tombol Submit --}}
                        <div class="card-footer">
                            <button class="btn btn-primary">Kirim Pengajuan</button>
                            <a href="{{ route('dashboard.penduduk') }}" class="btn btn-light ml-3">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
