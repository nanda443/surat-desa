@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengajuan {{ $pengajuan->jenisSurat->nama_surat }}</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Field Data Penduduk --}}
                        <div class="form-group">
                            <label for="inputName">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="inputName" placeholder="" value="{{ $pengajuan->user->name }}" readonly>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tempatLahir">Tempat Lahir<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror"
                                    name="place_of_birth" id="tempatLahir" value="{{ $pengajuan->user->place_of_birth }}"
                                    readonly>
                                @error('place_of_birth')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalLahir">Tanggal Lahir<span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                    name="date_of_birth" id="tanggalLahir" value="{{ $pengajuan->user->date_of_birth }}"
                                    readonly>
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
                                    value="{{ $pengajuan->user->nik }}" readonly>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kk">No Kartu Keluarga<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kk') is-invalid @enderror" name="kk"
                                    oninput="this.value = this.value.replace(/\D/g, '')" id="kk"
                                    value="{{ $pengajuan->user->kk }}" readonly>
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
                                    name="pekerjaan" id="pekerjaan" value="{{ $pengajuan->user->pekerjaan }}" readonly>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="telepon">Telepon<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/\D/g, '')" name="phone" id="telepon"
                                    value="{{ $pengajuan->user->phone }}" readonly>
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
                                    value="{{ $pengajuan->user->religion }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                                <input type="text" id="jenisKelamin"
                                    class="form-control @error('gender') is-invalid @enderror" name="gender"
                                    value="{{ $pengajuan->user->gender }}" readonly>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="RT">RT<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rt') is-invalid @enderror"
                                    name="rt" oninput="this.value = this.value.replace(/\D/g, '')" id="RT"
                                    value="{{ $pengajuan->user->rt }}" readonly>
                                @error('rt')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="RW">RW<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rw') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/\D/g, '')" name="rw" id="RW"
                                    value="{{ $pengajuan->user->rw }}" readonly>
                                @error('rw')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- Field Tambahan Khusus Jenis Surat --}}
                        @if ($pengajuan->jenisSurat->kode == 'SKTM')
                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="ketuaRt">Nama Ketua RT<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('ketua_rt') is-invalid @enderror"
                                        name="ketua_rt" id="ketuaRt" value="{{ $pengajuan->data['ketua_rt'] }}"
                                        readonly>
                                    @error('ketua_rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="ketuaRw">Nama Ketua RW<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('ketua_rw') is-invalid @enderror"
                                        name="ketua_rw" id="ketuaRw" value="{{ $pengajuan->data['ketua_rw'] }}"
                                        readonly>
                                    @error('ketua_rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="penghasilan">Penghasilan Perbulan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('penghasilan') is-invalid @enderror"
                                        oninput="this.value = this.value.replace(/\D/g, '')" name="penghasilan"
                                        id="penghasilan" value="{{ $pengajuan->data['penghasilan'] }}" readonly>
                                    @error('penghasilan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-grup col-md-12">
                                    <label for="alasan">Alasan Pengajuan<span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('alasan') is-invalid @enderror" name="alasan" id="alasan" rows="10"
                                        readonly>{{ $pengajuan->data['alasan'] }}</textarea>
                                    @error('alasan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @elseif ($pengajuan->jenisSurat->kode == 'SKM')
                            <div class="form-group">
                                <label for="hariTanggalMeninggal">Tanggal Meninggal<span
                                        class="text-danger">*</span></label>
                                <input type="date"
                                    class="form-control @error('hari_tanggal_meninggal') is-invalid @enderror"
                                    name="hari_tanggal_meninggal" id="hariTanggalMeninggal"
                                    value="{{ $pengajuan->data['hari_tanggal_meninggal'] }}">
                                @error('hari_tanggal_meninggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tempatPemakaman">Tempat Pemakaman<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('tempat_pemakaman') is-invalid @enderror"
                                    name="tempat_pemakaman" id="tempatPemakaman"
                                    value="{{ $pengajuan->data['tempat_pemakaman'] }}">
                                @error('tempat_pemakaman')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @elseif ($pengajuan->jenisSurat->kode == 'SKD')
                            <div class="form-group">
                                <label for="alamatDomisili">Alamat Domisili<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('alamat_domisili') is-invalid @enderror"
                                    name="alamat_domisili" id="alamatDomisili"
                                    value="{{ $pengajuan->data['alamat_domisili'] }}">
                                @error('alamat_domisili')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @elseif ($pengajuan->jenisSurat->kode == 'SKU')
                            <div class="form-group">
                                <label for="namaUsaha">Nama Usaha<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_usaha') is-invalid @enderror"
                                    name="nama_usaha" id="namaUsaha" value="{{ $pengajuan->data['nama_usaha'] }}">
                                @error('nama_usaha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @elseif ($pengajuan->jenisSurat->kode == 'SKAW')
                            <div class="form-group">
                                <label for="namaAlmarhum">Nama Orang yang Meninggal<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_almarhum') is-invalid @enderror"
                                    name="nama_almarhum" id="namaAlmarhum"
                                    value="{{ $pengajuan->data['nama_almarhum'] }}">
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
                                    value="{{ $pengajuan->data['hari_tanggal_meninggal'] }}">
                                @error('hari_tanggal_meninggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tempatPemakaman">Tempat Pemakaman<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('tempat_pemakaman') is-invalid @enderror"
                                    name="tempat_pemakaman" id="tempatPemakaman"
                                    value="{{ $pengajuan->data['tempat_pemakaman'] }}">
                                @error('tempat_pemakaman')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamatAlmarhum">Alamat Orang yang Meninggal<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('alamat_almarhum') is-invalid @enderror"
                                    name="alamat_almarhum" id="alamatAlmarhum"
                                    value="{{ $pengajuan->data['alamat_almarhum'] }}">
                                @error('alamat_almarhum')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        {{-- Tombol Submit --}}

                    </form>
                    <div class="mt-3">

                        <form action="{{ route('pengajuan.approve', $pengajuan->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success me-4">Setujui</button>
                        </form>
                        <form action="{{ route('pengajuan.reject', $pengajuan->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
