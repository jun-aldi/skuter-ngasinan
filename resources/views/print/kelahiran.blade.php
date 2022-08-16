<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      .header {
        margin-left: 3rem;
        justify-content: center;
      }
      .header-tulisan.grid-item {
        margin-top: -7.5rem;
        line-height: 6px;
      }
      p.ket {
        margin-left: 25rem;
      }
      p.surat {
    margin-left: 15rem;
}
.page-2 {
    /* border: 2px solid black; */
    padding: 2px 2px 9px 4px;
}
p.pengantar {
    margin-left: 25rem;
}
p.nomor {
    margin-left: 20rem;
}
.kode-desa {
    line-height: 4px;
}
.isikan-apa {
  margin-left: 3rem;
}
.isi {
    font-size: 12px;
}
p.kepala-desa {
    margin-top: -30px;
    padding-left: 33rem;
}
p.nama {
    padding-top: 3rem;
}
p.namakepala {
    margin-top: -30px;
    padding-left: 30rem;
}
p.keperluan {
    padding-left: 11.6rem;
    margin-top: -27px;
}
p.tujuan {
    margin-top: -27px;
    padding-left: 11.6rem;
}
p.ket-lain {
    margin-top: -27px;
    padding-left: 11.6rem;
}
.page-break {
    page-break-after: always;
}
    </style>
  </head>
  <body>



    <div class="header" style="font-size: small;line-height: 10%;" >
        <div class="right">
            <p class="ket">Ket :</p>
            <div class="lembar" style="margin-left: 400px">
                <p>Lembar 1 Untuk Yang Bersangkutan</p>
                <p>Lembar 2 Untuk UPTD/Instansi Pelaksana</p>
                <p>Lembar 3 Untuk Desa atau Kelurahan</p>
                <p>Lembar 4 Untuk Kecamatan</p>
            </div>
        </div>
        <div class="left" style="text-align: left;margin-top: -80px;">
            <p>Pemerintah Desa / Kelurahan : Ngasinan</p>
            <p>Kecamatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Bulu</p>
            <p>Kabupaten / Kota&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Sukoharjo</p>
            <p>Kode Wilayah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 33 11 022012</p>
        </div>
    </div>
    <div class="judul" style="text-align: center;">
        <h4>SURAT KETERANGAN KELAHIRAN</h4>
    </div>
    <div class="nomer-2" style="text-align: center;margin-top: -40px">
        <p>No. : {{$no_surat}}</p>
    </div>
    <div class="no_kk_kk" style="font-size: 60%;line-height: 10%;margin-top: -10px;">
        <p>Nama Kepala Keluarga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($nama_kk)}}</p>
        <p>Nomor Kepala Keluarga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$no_kk}}</p>
    </div>
    <div class="page-2" style="font-size: 75%;line-height: 20%">
        <div class="identitas">
            <p style="font-weight: bold">BAYI</p>
            <p>1. Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{strtoupper($nama_lengkap_anak)}}</p>
            <p>2. Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($jenis_kelamin_anak)}}</p>
            <p>3. Tempat Dilahirkan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($tempat_dilahirkan)}}</p>
            <p>4. Tempat Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($tempat_kelahiran)}}</p>
            <p>5. Hari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($hari_kelahiran)}} Tgl {{($tanggal_lahir)}} Bln {{$bulan_lahir}} Thn {{$tahun_lahir}}</p>
            <p>7. Pukul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{($jam_lahir_anak)}}</p>
            <p>8. Jenis Kelahiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($jenis_kelahiran)}}</p>
            <p>9. Kelahiran Ke&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($kelahiran_ke)}}</p>
            <p>10. Penolong Kelahiran&nbsp;&nbsp;&nbsp;: {{strtoupper($pertolongan_kelahiran)}}</p>
            <p>11. Berat Bayi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  {{$berat_bayi}} Kg</p>
            <p>12. Panjang Bayi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($panjang_bayi)}} Cm</p>
        </div>
        <div class="identitas">
            <p style="font-weight: bold">AYAH</p>
            <p>1. NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$nik_ayah}}</p>
            <p>2. Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{strtoupper($nama_ayah)}}</p>
            <p>3. Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($tgl_ayah)}}</p>
            <p>4. Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($pekerjaan_ayah)}}</p>
            <p>5. Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($alamat_ayah)}}</p>
        </div>
        <div class="identitas">
            <p style="font-weight: bold">IBU</p>
            <p>1. NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($nik_ibu)}}</p>
            <p>2. Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{strtoupper($nama_ibu)}}</p>
            <p>3. Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($tgl_ibu)}}</p>
            <p>4. Pekerjaan  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($pekerjaan_ibu)}}</p>
            <p>5. Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($alamat_ibu)}}</p>
        </div>
        <div class="identitas">
            <p style="font-weight: bold">PELAPOR</p>
            <p>1. NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$nik_pelapor}}</p>
            <p>2. Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($nama_pelapor)}}</p>
            <p>3. Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($tgl_pelapor)}}</p>
            <p>4. Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($pekerjaan_pelapor)}}</p>
            <p>5. Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($alamat_pelapor)}}</p>
        </div>
        <div class="identitas">
            <p style="font-weight: bold">SAKSI 1</p>
            <p>1. NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$nik_saksi_1}}</p>
            <p>2. Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($nama_saksi_1)}}</p>
            <p>3. Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($tgl_saksi_1)}}</p>
            <p>4. Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($pekerjaan_saksi_1)}}</p>
            <p>5. Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($alamat_saksi_1)}}</p>
        </div>
        <div class="identitas">
            <p style="font-weight: bold">SAKSI 2</p>
            <p>1. NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$nik_saksi_2}}</p>
            <p>2. Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($nama_saksi_2)}}</p>
            <p>3. Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($tgl_saksi_2)}}</p>
            <p>4. Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($pekerjaan_saksi_2)}}</p>
            <p>5. Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strtoupper($alamat_saksi_2)}}</p>
        </div>
    </div>

    <div class="tanda-tangan" style="font-size: 70%">
        <p style="text-align: right">Ngasinan, {{$created_at}}</p>
        <p class="pemegang">{{$pejabat}}</p>
        <p class="kepala-desa" style="margin-left: 3rem;text-align:center">Pelapor</p>
        <p class="nama" >{{strtoupper($nama_pejabat)}}</p>
        <p class="namakepala"style="margin-left:4rem;text-align:center">{{strtoupper($nama_pelapor)}}</p>
    </div>



  </body>
</html>
