<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Tidak Mampu</title>
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
            line-height: 1.6;
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
            margin: 30px 50px;
            font-size: 14px;
        }

        .footer table {
            width: 100%;
        }

        .footer table td {
            vertical-align: top;
            text-align: center;
        }

        .footer .signature {
            margin-top: 50px;
        }

        .footer .stamp img {
            width: 100px;
        }

        .sub-header hr {
            margin-top: 5px;
            border: none;
            border-bottom: 2px solid black;
            /* Garis hitam di bawah teks */
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('storage/' . $profilDesa->logo) }}" alt="Logo" width="50">
        <h4>PEMERINTAH KABUPATEN WAY KANAN</h4>
        <h4>KECAMATAN KASUI</h4>
        <h4 class="sub-header">KAMPUNG SUKAJADI</h4>
        <hr>
    </div>

    <div class="content">
        <p class="title">SURAT KETERANGAN TIDAK MAMPU</p>
        <p class="number">{{ $nomor_surat }}</p>

        <p>Yang bertanda tangan di bawah ini Kepala Kampung Sukajadi Kec. Kasui Kab. Way Kanan Provinsi Lampung.
            Menerangkan bahwa:</p>

        <table>
            <tr>
                <td>Nama</td>
                <td>: {{ $name }}</td>
            </tr>
            <tr>
                <td>Tempat/Tanggal Lahir</td>
                <td>: {{ $place_of_birth }}, {{ Carbon\Carbon::parse($date_of_birth)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $nik }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{ $religion }}</td>
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

        <p>Nama tersebut di atas benar penduduk Kampung Sukajadi Kecamatan Kasui Kabupaten Way Kanan dan dengan ini,
            menerangkan bahwa berdasarkan data yang ada pada kami benar tergolong dalam Keluarga <strong>TIDAK
                MAMPU</strong>.</p>

        <p>Demikian Surat Keterangan Tidak Mampu ini dibuat dengan sebenarnya untuk dapat digunakan sebagaimana
            mestinya.</p>
    </div>

    <div class="footer">
        <table>
            <tr>
                <td></td>
                <td></td>
                <td>Sukajadi, {{ $tanggal }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Mengetahui, Kepala Kampung Sukajadi</td>
            </tr>
            <tr>
                <td class="signature">
                    <img src="{{ public_path('storage/logos/ttd.jpg') }}" style="visibility: hidden" width="150px"
                        alt="Stempel" class="stamp">
                    <br>

                </td>
                <td class="signature"><img src="{{ public_path('storage/logos/ttd.jpg') }}" style="visibility: hidden"
                        width="150px" alt="Stempel" class="stamp">
                    <br>
                    
                </td>
                <td class="signature">
                    <img src="{{ public_path('storage/logos/ttd.jpg') }}" width="150px" alt="Stempel" class="stamp">
                    <br>
                    {{ $profilDesa->nama_kepala_desa }}
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
