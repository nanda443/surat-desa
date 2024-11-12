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
            $table->string('email')->unique(); // Email
            $table->string('password'); // Password
            $table->date('date_of_birth'); // Tanggal lahir
            $table->string('place_of_birth'); // Tempat lahir
            $table->string('nik')->unique(); // Nomor Induk Kependudukan
            $table->enum('gender', ['Laki-laki', 'Perempuan']); // Nomor Induk Kependudukan
            $table->string('address'); // Alamat
            $table->string('phone')->nullable(); // Nomor telepon
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
