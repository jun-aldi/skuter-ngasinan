<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class surat_kelahiran extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'no_surat',
        'nama_lengkap_anak',
        'jenis_kelamin_anak',
        'tempat_dilahirkan',
        'tanggal_lahir_anak',
        'jam_lahir_anak',
        'jenis_kelahiran',
        'kelahiran_ke',
        'pertolongan_kelahiran',
        'berat_bayi',
        'panjang_bayi',
        'pejabat_penandatangan',

        //ayah
        'nik_ayah',
        'nama_ayah',
        'tanggal_lahir_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',

        //ibu
        'nik_ibu',
        'nama_ibu',
        'tanggal_lahir_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',

        //pelapor
        'nik_pelapor',
        'nama_pelapor',
        'tanggal_lahir_pelapor',
        'pekerjaan_pelapor',
        'alamat_pelapor',

        //saksi
        'nik_saksi_1',
        'nama_saksi_1',
        'tanggal_lahir_saksi_1',
        'pekerjaan_saksi_1',
        'alamat_saksi_1',

        //saksi
        'nik_saksi_2',
        'nama_saksi_2',
        'tanggal_lahir_saksi_2',
        'pekerjaan_saksi_2',
        'alamat_saksi_2',

    ];
}
