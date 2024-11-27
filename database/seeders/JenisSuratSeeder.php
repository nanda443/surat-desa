<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('jenis_surats')->insert([
            [
                'nama_surat' => 'Surat Keterangan Tidak Mampu',
                'kode'  => 'SKTM',
                'deskripsi'  => 'Surat untuk mengajukan bantuan sosial, beasiswa, dll.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_surat' => 'Surat Kematian',
                'kode'  => 'SKM',
                'deskripsi'  => 'Surat keterangan resmi tentang kematian seseorang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_surat' => 'Surat Keterangan Domisili',
                'kode'  => 'SKD',
                'deskripsi'  => 'Surat pernyataan tempat tinggal resmi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_surat' => 'Surat Keterangan Ahli Waris',
                'kode'  => 'SKAW',
                'deskripsi'  => 'Surat resmi penetapan ahli waris.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_surat' => 'Surat Keterangan Usaha',
                'kode'  => 'SKU',
                'deskripsi'  => 'Surat pernyataan keberadaan usaha.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
