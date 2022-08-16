<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class surat_kematian extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'no_surat',
        'no_kk',
        'nama_kk',
        'nik_meninggal',
        'nama_lengkap_meninggal',
        'jenis_kelamin_meninggal',
        'tempat_lahir_meninggal',
        'tanggal_lahir_meninggal',
        'agama_meninggal',
        'pekerjaan_meninggal',
        'alamat_meninggal',
        'no_kk_meninggal',
        'status_anak_meninggal',
        'tempat_meninggal',
        'tanggal_meninggal',
        'pukul_meninggal',
        'sebab_meninggal',
        'yang_menerangkan',
        'bukti_kematian',
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
        'hubungan_pelapor',

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
