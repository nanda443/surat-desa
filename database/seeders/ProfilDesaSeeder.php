<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilDesa;
use Faker\Factory as Faker;

class ProfilDesaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Menambahkan satu baris data dummy
        ProfilDesa::create([
            'nama_kepala_desa' => 'nama Kelapa Desa',
            'nama_kelurahan' => 'nama Kelurahan',
            'email' => 'emailkeluarahan@gmail.com',
            'kontak' => 'kontak kelurahan',
            'website' => 'https://websitesukajadi.com',
            'provinsi' => 'provinsi',
            'kabupaten' => 'kabupaten',
            'alamat' => 'alamat',
        ]);
    }
}
