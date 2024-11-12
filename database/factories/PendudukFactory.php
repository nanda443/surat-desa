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
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Password yang dienkripsi
            'place_of_birth' => $this->faker->city, // Menggunakan nama kota sebagai tempat lahir
            'date_of_birth' => $this->faker->date(),
            'nik' => $this->faker->unique()->numerify('##########'), // NIK 10 digit
            'gender' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']), // NIK 10 digit
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'religion' => $this->faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya']),
            'photo_path' => null, // Atau Anda dapat mengisi dengan path foto dummy
        ];
    }
}
