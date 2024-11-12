<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfilDesa extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nama_kepala_desa',
        'nama_kelurahan',
        'email',
        'kontak',
        'website',
        'provinsi',
        'kabupaten',
        'alamat',
        'logo',
    ];
}
