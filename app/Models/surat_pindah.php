<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat_pindah extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'nik_kepala_keluarga',
      'no_kk',
      'nama_kepala_keluarga',
      'alamat',
      'nik_pemohon',
      'nama_lengkap',
      'telepon',
      'no_surat',
      'alasan',
      'alamat_tujuan',
      'jenis_kepindahan',
      'status_kk_tidak_pindah',
      'status_kk_pindah',
      'pejabat_penandatangan',
    ];
}
