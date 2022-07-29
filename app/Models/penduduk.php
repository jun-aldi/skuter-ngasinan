<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class penduduk extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'no_kk',
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'status_kawin',
        'jenis_kelamin',
        'dukuh',
        'rt',
        'rw',
        'agama',
        'pekerjaan',
        'disabilitas',
        'status_perekaman',
        'keterangan'

    ];
}
