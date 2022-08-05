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
        Schema::create('surat_kematians', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('nik_meninggal', 16);
            $table->string('nama_lengkap_meninggal');
            $table->enum('jenis_kelamin_meninggal', ['laki-laki', 'perempuan']);
            $table->string('tempat_lahir_meninggal');
            $table->dateTime('tanggal_lahir_meninggal');
            $table->enum('agama_meninggal', ['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu']);
            $table->string('pekerjaan_meninggal');
            $table->longText('alamat_meninggal');
            $table->string('no_kk_meninggal', 20);
            $table->string('status_anak_meninggal');
            $table->date('tempat_meninggal');
            $table->enum('sebab_meninggal', ['sakit']);
            $table->enum('yang_menerangkan', ['dokter']);
            $table->string('bukti_kematian');
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
