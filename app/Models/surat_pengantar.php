<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat_pengantar extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kewarganegaraan',
        'agama',
        'pekerjaan',
        'status_kawin',
        'alamat',
        'no_kk',
        'no_surat',
        'tujuan',
        'keperluan',
        'keterangan',
        'pejabat_penandatangan',
        'tanggal_berlaku',
    ];


}
