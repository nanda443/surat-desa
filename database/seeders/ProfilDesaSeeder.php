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
            'nama_kepala_desa' => $faker->name,
            'nama_kelurahan' => $faker->word,
            'email' => $faker->unique()->safeEmail,
            'kontak' => $faker->phoneNumber,
            'website' => $faker->url,
            'provinsi' => $faker->state,
            'kabupaten' => $faker->city,
            'alamat' => $faker->address,
        ]);
    }
}
