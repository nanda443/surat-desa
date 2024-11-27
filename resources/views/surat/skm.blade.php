<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kematian</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            position: absolute;
            left: 50px;
        }

        .header h4 {
            margin: 5px 0;
        }

        .content {
            margin: 0 50px;
            font-size: 14px;
            line-height: 1.4;
        }

        .content .title {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 10px;
        }

        .content .number {
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            margin: 10px 50px;
            font-size: 14px;
        }

        .footer .ttd {
            text-align: right;
            margin-top: 50px;
        }

        .footer .stamp img {
            width: 100px;
        }

        table {
            width: 100%;
        }

        table td {
            vertical-align: top;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('storage/' . $profilDesa->logo) }}" alt="Logo" width="50">
        <h4>PEMERINTAH KABUPATEN WAYKANAN</h4>
        <h4>KECAMATAN KASUI</h4>
        <h4>KAMPUNG SUKAJADI</h4>
        <hr>
    </div>

    <div class="content">
        <p class="title">SURAT KETERANGAN KEMATIAN</p>
        <p class="number">{{ $nomor_surat }}</p>

        <p>Yang bertanda tangan di bawah ini:</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>: {{ $profilDesa->nama_kepala_desa }}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: Kepala Kampung</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: Kampung Sukajadi, Kec. Kasui Kab. Way Kanan</td>
            </tr>
        </table>

        <p>Dengan ini menerangkan bahwa:</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>: {{ $name }}</td>
            </tr>
            <tr>
                <td>Nomor KK</td>
                <td>: {{ $kk }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $nik }}</td>
            </tr>
            <tr>
                <td>Tempat/Tgl Lahir</td>
                <td>: {{ $place_of_birth }}, {{ Carbon\Carbon::parse($date_of_birth)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{ $religion }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $gender }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $pekerjaan }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: RT {{ $rt }}/RW {{ $rw }} Kampung Sukajadi, Kec. Kasui Kab. Way Kanan</td>
            </tr>
        </table>

        <p>Telah meninggal dunia pada:</p>
        <table>
            <tr>
                <td>Hari/Tanggal</td>
                <td>:
                    {{ Carbon\Carbon::parse($data_pengajuan['hari_tanggal_meninggal'])->translatedFormat('l, d F Y') }}
                </td>
            </tr>
            <tr>
                <td>Tempat Pemakaman</td>
                <td>: {{ $data_pengajuan['tempat_pemakaman'] }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: RT {{ $rt }}/RW {{ $rw }} Kampung Sukajadi, Kec. Kasui Kab. Way Kanan</td>
            </tr>
        </table>

        <p>Demikian surat keterangan kematian ini dibuat dengan sebenar-benarnya dan untuk dapat dipergunakan
            sebagaimana mestinya.</p>
    </div>

    <div class="footer">
        <table style="margin-left: auto; width: 300px;">
            <tr>
                <td style="text-align: center;">
                    <p>Sukajadi, {{ Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</p>
                    <p>Mengetahui,</p>
                    <p>Kepala Kampung Sukajadi</p>
                    <img src="{{ public_path('storage/logos/ttd.jpg') }}" width="150px" alt="Stempel" class="stamp">
                    <p><u>{{ $profilDesa->nama_kepala_desa }}</u></p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
