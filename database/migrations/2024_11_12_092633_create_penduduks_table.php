<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama lengkap
            $table->string('phone')->unique(); // Nomor telepon
            $table->string('password'); // Password
            $table->date('date_of_birth'); // Tanggal lahir
            $table->string('place_of_birth'); // Tempat lahir
            $table->string('nik')->unique(); // Nomor Induk Kependudukan
            $table->string('kk'); //Nomor Kartu Keluarga
            $table->enum('gender', ['Laki-laki', 'Perempuan']); // Nomor Induk Kependudukan
            $table->string('rt'); // RT
            $table->string('rw'); // RW
            $table->string('desa'); // Kelurahan
            $table->string('kecamatan'); // Kecamatan
            $table->string('kabupaten'); // Kabupaten
            $table->string('religion')->nullable(); // Agama
            $table->string('photo_path')->nullable(); // Path foto
            $table->timestamps(); // Kolom timestamp untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
