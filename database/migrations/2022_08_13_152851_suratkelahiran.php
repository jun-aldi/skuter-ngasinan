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
        Schema::create('surat_kelahirans', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('nama_lengkap_anak');
            $table->enum('jenis_kelamin_anak', ['laki-laki', 'perempuan']);
            $table->string('tempat_dilahirkan');
            $table->dateTime('tanggal_lahir_anak');
            $table->time('jam_lahir_anak');
            $table->enum('jenis_kelahiran', ['tunggal', 'kembar 2', 'kembar 3', 'kembar 4', 'lainnya']);
            $table->integer('kelahiran_ke');
            $table->enum('pertolongan_kelahiran', ['dokter','bidan/perawat','dukun','lainnya']);
            $table->integer('berat_bayi');
            $table->integer('panjang_bayi');
            $table->enum('pejabat_penandatangan', ['kepala desa', 'sekretaris desa']);

            //ayah
            $table->string('nik_ayah', 16);
            $table->string('nama_ayah');
            $table->date('tanggal_lahir_ayah');
            $table->string('pekerjaan_ayah');
            $table->longText('alamat_ayah');

            //ibu
            $table->string('nik_ibu', 16);
            $table->string('nama_ibu');
            $table->date('tanggal_lahir_ibu');
            $table->string('pekerjaan_ibu');
            $table->longText('alamat_ibu');

            //pelapor
            $table->string('nik_pelapor', 16);
            $table->string('nama_pelapor');
            $table->date('tanggal_lahir_pelapor');
            $table->string('pekerjaan_pelapor');
            $table->longText('alamat_pelapor');

            //saksi
            $table->string('nik_saksi_1', 16);
            $table->string('nama_saksi_1');
            $table->date('tanggal_lahir_saksi_1');
            $table->string('pekerjaan_saksi_1');
            $table->longText('alamat_saksi_1');

            //saksi
            $table->string('nik_saksi_2', 16);
            $table->string('nama_saksi_2');
            $table->date('tanggal_lahir_saksi_2');
            $table->string('pekerjaan_saksi_2');
            $table->longText('alamat_saksi_2');


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
