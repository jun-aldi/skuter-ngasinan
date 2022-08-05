<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pindahs', function (Blueprint $table) {
            $table->id();
            $table->string('nik_kepala_keluarga', 16);
            $table->string('no_kk', 16);
            $table->string('nama_kepala_keluarga', 25);
            $table->longText('alamat');
            $table->string('nik_pemohon', 25);
            $table->string('nama_lengkap');
            $table->string('telepon');
            $table->string('no_surat');
            $table->longText('alasan');
            $table->longText('alamat_tujuan');
            $table->enum('jenis_kepindahan', ['pindah']);
            $table->enum('status_kk_tidak_pindah', ['pindah']);
            $table->enum('status_kk_pindah', ['pindah']);
            $table->enum('pejabat_penandatangan',['kepala desa', 'sekretaris desa']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
