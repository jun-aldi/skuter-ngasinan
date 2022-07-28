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
        Schema::create('surat_pengantars', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 25);
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->dateTime('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->enum('kewarganegaraan', ['indonesia'])->default('indonesia');
            $table->enum('agama', ['islam','kristen', 'katolik', 'hindu', 'budha', 'konghucu']);
            $table->string('pekerjaan');
            $table->enum('status_kawin', ['kawin', 'belum kawin']);
            $table->longText('alamat');
            $table->string('no_kk', 25);
            $table->string('no_surat');
            $table->longText('tujuan');
            $table->longText('keperluan');
            $table->longText('keterangan');
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
        Schema::dropIfExists('surat_pengantar');
    }
};
