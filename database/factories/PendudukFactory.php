<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'password' => bcrypt('password'), // Password yang dienkripsi
            'place_of_birth' => $this->faker->city, // Menggunakan nama kota sebagai tempat lahir
            'date_of_birth' => $this->faker->date(),
            'nik' => $this->faker->nik(), // NIK 10 digit
            'kk' => $this->faker->unique()->numerify('##########'), // kk 10 digit
            'gender' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']), //
            'rt' => $this->faker->randomDigitNotNull,
            'rw' => $this->faker->randomDigitNotNull,
            'desa' => $this->faker->city,
            'kecamatan' => $this->faker->city,
            'kabupaten' => $this->faker->city,
            'religion' => $this->faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha', 'Konghucu']),
            'photo_path' => null, // Atau Anda dapat mengisi dengan path foto dummy
        ];
    }
}
