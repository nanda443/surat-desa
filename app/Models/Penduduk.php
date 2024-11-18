<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'password',
        'date_of_birth',
        'place_of_birth',
        'nik',
        'kk',
        'gender',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'address',
        'religion',
        'photo_path',
    ];
}
