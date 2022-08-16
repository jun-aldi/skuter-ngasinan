<?php

namespace App\Http\Controllers;

use App\Models\surat_kelahiran;
use App\Models\surat_kematian;
use App\Models\surat_pengantar;
use App\Models\surat_pindah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use DateTime;

class Printpdf extends Controller
{
    public function printPengantar($id)
    {
        // $agendas = Agenda::where('disposisis_id', $id)->first();

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        //TANGGAL LAHIR
        $pengantar2 = surat_pengantar::findOrFail($id);
        $split = explode('-', $this->tanggal_lahir = $pengantar2->tanggal_lahir,);
        $tanggal_lahir = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //CREATED AT
        $tanggal_berlaku = date("Y-m-d", strtotime($this->tanggal_berlaku = $pengantar2->tanggal_berlaku,));
        $split = explode('-', $tanggal_berlaku);
        $tanggal_berlaku = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //TAMBAH BULAN
        $bulan_akhir = $this->tanggal_berlaku = $pengantar2->tanggal_berlaku;
        $bulan_akhir = DateTime::createFromFormat('Y-m-d', $bulan_akhir);
        $bulan_akhir->modify('+1 month');
        $bulan_akhir = $bulan_akhir->format('Y-m-d');
        $bulan_akhir = date("Y-m-d", strtotime($bulan_akhir));
        $split = explode('-', $bulan_akhir);
        $bulan_akhir = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //pejabat penandatangan
        if ($this->pejabat_penandatangan = $pengantar2->pejabat_penandatangan == "kepala desa") {
            $pejabat = "KEPALA DESA";
            $nama_pejabat = "IBNU WIYANTO";
        } else {
            $pejabat = "SEKRETARIS DESA";
            $nama_pejabat = "Dra. PARSINI";
        }

        $data = [
            $pengantar = surat_pengantar::findOrFail($id),
            "id" => $this->id = $pengantar->id,
            "nik" => $this->nik = $pengantar->nik,
            "nama_lengkap" => $this->nama_lengkap = $pengantar->nama_lengkap,
            "tempat_lahir" => $this->tempat_lahir = $pengantar->tempat_lahir,
            "tanggal_lahir" => $tanggal_lahir,
            "jenis_kelamin" => $this->jenis_kelamin = $pengantar->jenis_kelamin,
            "kewarganegaraan" => $this->kewarganegaraan = $pengantar->kewarganegaraan,
            "agama" => $this->agama = $pengantar->agama,
            "pekerjaan" => $this->pekerjaan = $pengantar->pekerjaan,
            "status_kawin" => $this->status_kawin = $pengantar->status_kawin,
            "alamat" => $this->alamat = $pengantar->alamat,
            "no_kk" => $this->no_kk = $pengantar->no_kk,
            "no_surat" => $this->no_surat = $pengantar->no_surat,
            "tujuan" => $this->tujuan = $pengantar->tujuan,
            "keperluan" => $this->keperluan = $pengantar->keperluan,
            "keterangan" => $this->keterangan = $pengantar->keterangan,
            "tanggal_berlaku" => $tanggal_berlaku,
            "bulan_akhir" => $bulan_akhir,
            "pejabat" => $pejabat,
            "nama_pejabat" => $nama_pejabat,

        ];


        // $disposisis_id=$id;

        // $no_agenda = $agenda->$id;



        $filename = "Surat Pengantar" . $data['nik'] . ".pdf";



        $pdfContent = PDF::loadView('print.pengantar', $data)->output();
        // $pdf = PDF::loadView('print.pengantar', $data);
        return response()->streamDownload(
            fn () => print($pdfContent),
            "$filename"
        );
    }


    public function printPindahan($id)
    {
        $pindah = surat_pindah::findOrFail($id);

        if ($this->pejabat_penandatangan = $pindah->pejabat_penandatangan == "kepala desa") {
            $pejabat = "KEPALA DESA";
            $nama_pejabat = "IBNU WIYANTO";
        } else {
            $pejabat = "SEKRETARIS DESA";
            $nama_pejabat = "Dra. PARSINI";
        }

        if (str_contains($alamat = $this->alamat = $pindah->alamat, 'DESA NGASINAN')) {
            $dukuh = str_replace(", DESA NGASINAN", "", $alamat);
        } else if (str_contains($alamat = $this->alamat = $pindah->alamat, 'ngasinan')) {
            $dukuh = str_replace(", ngasinan", "", $alamat);
        } else if (str_contains($alamat = $this->alamat = $pindah->alamat, 'desa ngasinan')) {
            $dukuh = str_replace(", desa ngasinan", "", $alamat);
        } else if (str_contains($alamat = $this->alamat = $pindah->alamat, 'NGASINAN')) {
            $dukuh = str_replace(", DESA NGASINAN", "", $alamat);
        }

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $created_at = date("Y-m-d", strtotime($this->created_at = $pindah->created_at,));
        $split = explode('-', $created_at);
        $created_at = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        $data = [
            $pengantar = surat_pindah::findOrFail($id),
            "nik_kepala_keluarga" => $this->nik_kepala_keluarga = $pengantar->nik_kepala_keluarga,
            "no_kk" => $this->no_kk = $pengantar->no_kk,
            "nama_kepala_keluarga" => $this->nama_kepala_keluarga = $pengantar->nama_kepala_keluarga,
            "alamat" => $this->alamat = $pengantar->alamat,
            "nik_pemohon" => $this->nik_pemohon = $pengantar->nik_pemohon,
            "nama_lengkap" => $this->nama_lengkap = $pengantar->nama_lengkap,
            "telepon" => $this->telepon = $pengantar->telepon,
            "no_surat" => $this->no_surat = $pengantar->no_surat,
            "alasan" => $this->alasan = $pengantar->alasan,
            "alamat_tujuan" => $this->alamat_tujuan = $pengantar->alamat_tujuan,
            "jenis_kepindahan" => $this->jenis_kepindahan = $pengantar->jenis_kepindahan,
            "status_kk_tidak_pindah" => $this->status_kk_tidak_pindah = $pengantar->status_kk_tidak_pindah,
            "status_kk_pindah" => $this->status_kk_pindah = $pengantar->status_kk_pindah,
            // "tanggal_berlaku" => $tanggal_berlaku,
            // "bulan_akhir" => $bulan_akhir,
            "pejabat" => $pejabat,
            "nama_pejabat" => $nama_pejabat,

            "dukuh" => $dukuh,

            "created_at" => $created_at,

        ];


        // $disposisis_id=$id;

        // $no_agenda = $agenda->$id;



        $filename = "Surat Pindah " . $data['nama_lengkap'] . ".pdf";



        $pdfContent = PDF::loadView('print.pindah', $data)->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "$filename"
        );
    }


    public function printKelahiran($id)
    {
        setlocale(LC_TIME, 'id_ID.utf8');

        $kematian = surat_kelahiran::findOrFail($id);

        if ($this->pejabat_penandatangan = $kematian->pejabat_penandatangan == "kepala desa") {
            $pejabat = "KEPALA DESA";
            $nama_pejabat = "IBNU WIYANTO";
        } else {
            $pejabat = "SEKRETARIS DESA";
            $nama_pejabat = "Dra. PARSINI";
        }


        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $daftar_hari = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );
        $hari_kelahiran = $this->tanggal_lahir_anak = $kematian->tanggal_lahir_anak;
        $namahari = date('l', strtotime($hari_kelahiran));
        $namahari = $daftar_hari[$namahari];

        $created_at = date("Y-m-d", strtotime($this->created_at = $kematian->created_at,));
        $split = explode('-', $created_at);
        $created_at = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //umur pelapor
        $tanggal_lahir = new DateTime($this->tanggal_lahir_pelapor = $kematian->tanggal_lahir_pelapor);
        $sekarang = new DateTime("today");
        if ($tanggal_lahir > $sekarang) {
            $thn = "0";
            $bln = "0";
            $tgl = "0";
        }
        $thn = $sekarang->diff($tanggal_lahir)->y;
        $bln = $sekarang->diff($tanggal_lahir)->m;
        $tgl = $sekarang->diff($tanggal_lahir)->d;

        //umur meninggal
        $tanggal_lahir = new DateTime($this->tanggal_lahir_meninggal = $kematian->tanggal_lahir_meninggal);
        $sekarang = new DateTime($kematian->tanggal_meninggal);
        if ($tanggal_lahir > $sekarang) {
            $thn = "0";
            $bln = "0";
            $tgl = "0";
        }
        $thnmeninggal = $sekarang->diff($tanggal_lahir)->y;
        $bln = $sekarang->diff($tanggal_lahir)->m;
        $tgl = $sekarang->diff($tanggal_lahir)->d;

        // tanggal kematian
        $tanggal_kematian = date("Y-m-d", strtotime($this->tanggal_meninggal = $kematian->tanggal_meninggal,));
        $split = explode('-', $tanggal_kematian);
        $tanggal_kematian = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        // tanggal LAHIR KEMATIAN
        $tanggal_lahir_meninggal = date("Y-m-d", strtotime($this->tanggal_lahir_meninggal = $kematian->tanggal_lahir_meninggal,));
        $split = explode('-', $tanggal_lahir_meninggal);
        $tanggal_lahir_meninggal = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //pukul meninggal
        $waktu_meninggal = date('h:i', $this->waktu_meninggal = $kematian->waktu_meninggal);

        //tanggal LAHIR AYAH
        $tanggal_lahir_ayah = date("Y-m-d", strtotime($this->tanggal_ayah = $kematian->tanggal_ayah,));
        $split = explode('-', $tanggal_lahir_ayah);
        $tanggal_lahir_ayah = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //tanggal LAHIR AYAH
        $tanggal_lahir_ibu = date("Y-m-d", strtotime($this->tanggal_ibu = $kematian->tanggal_ibu,));
        $split = explode('-', $tanggal_lahir_ibu);
        $tanggal_lahir_ibu = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //tanggal LAHIR pelapor
        $tanggal_lahir_pelapor = date("Y-m-d", strtotime($this->tanggal_pelapor = $kematian->tanggal_pelapor,));
        $split = explode('-', $tanggal_lahir_pelapor);
        $tanggal_lahir_pelapor = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //tanggal LAHIR AYAH
        $tanggal_lahir_saksi_1 = date("Y-m-d", strtotime($this->tanggal_saksi_1 = $kematian->tanggal_saksi_1,));
        $split = explode('-', $tanggal_lahir_saksi_1);
        $tanggal_lahir_saksi_1 = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //tanggal LAHIR AYAH
        $tanggal_lahir_saksi_2 = date("Y-m-d", strtotime($this->tanggal_saksi_2 = $kematian->tanggal_saksi_2,));
        $split = explode('-', $tanggal_lahir_saksi_2);
        $tanggal_lahir_saksi_2 = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];


        //tanggal lahir
        $tanggal_lahir_anak = $this->tanggal_lahir_anak;
        $tanggal_lahir_anak = explode('-', $tanggal_lahir_anak);
        $bulan_lahir = $tanggal_lahir_anak[1];
        $tanggal_lahir = $tanggal_lahir_anak[2];
        $tahun_lahir = $tanggal_lahir_anak[0];

        $data = [
            $pengantar = surat_kelahiran::findOrFail($id),
            "no_surat" => $this->no_surat = $pengantar->no_surat,
            "no_kk" => $this->no_kk = $pengantar->no_kk,
            "nama_kk" => $this->nama_kk = $pengantar->nama_kk,
            "nama_lengkap_anak" => $this->nama_lengkap_anak = $pengantar->nama_lengkap_anak,
            "jenis_kelamin_anak" => $this->jenis_kelamin_anak = $pengantar->jenis_kelamin_anak,
            "tempat_dilahirkan" => $this->tempat_dilahirkan = $pengantar->tempat_dilahirkan,
            "tempat_kelahiran" => $this->tempat_kelahiran = $pengantar->tempat_kelahiran,
            "tanggal_lahir_anak" => $this->tanggal_lahir_anak = $pengantar->tanggal_lahir_anak,
            "jam_lahir_anak" => $this->jam_lahir_anak = $pengantar->jam_lahir_anak,
            "jenis_kelahiran" => $this->jenis_kelahiran = $pengantar->jenis_kelahiran,
            "kelahiran_ke" => $this->kelahiran_ke = $pengantar->kelahiran_ke,
            "pertolongan_kelahiran" => $this->pertolongan_kelahiran = $pengantar->pertolongan_kelahiran,
            "berat_bayi" => $this->berat_bayi = $pengantar->berat_bayi,
            "panjang_bayi" => $this->panjang_bayi = $pengantar->panjang_bayi,


            //saksi ayah
            "nik_ayah" => $this->nik_ayah = $pengantar->nik_ayah,
            "nama_ayah" => $this->nama_ayah = $pengantar->nama_ayah,
            "tanggal_lahir_ayah" => $this->tanggal_lahir_ayah = $pengantar->tanggal_lahir_ayah,
            "pekerjaan_ayah" => $this->pekerjaan_ayah = $pengantar->pekerjaan_ayah,
            "alamat_ayah" => $this->alamat_ayah = $pengantar->alamat_ayah,
            // "tanggal_berlaku" => $tanggal_berlaku,
            // "bulan_akhir" => $bulan_akhir,

            //ibu
            "nik_ibu" => $this->nik_ibu = $pengantar->nik_ibu,
            "nama_ibu" => $this->nama_ibu = $pengantar->nama_ibu,
            "tanggal_lahir_ibu" => $this->tanggal_lahir_ibu = $pengantar->tanggal_lahir_ibu,
            "pekerjaan_ibu" => $this->pekerjaan_ibu = $pengantar->pekerjaan_ibu,
            "alamat_ibu" => $this->alamat_ibu = $pengantar->alamat_ibu,


            //pelapor
            "nik_pelapor" => $this->nik_pelapor = $pengantar->nik_pelapor,
            "nama_pelapor" => $this->nama_pelapor = $pengantar->nama_pelapor,
            "tanggal_lahir_pelapor" => $this->tanggal_lahir_pelapor = $pengantar->tanggal_lahir_pelapor,
            "pekerjaan_pelapor" => $this->pekerjaan_pelapor = $pengantar->pekerjaan_pelapor,
            "alamat_pelapor" => $this->alamat_pelapor = $pengantar->alamat_pelapor,

            //saksi
            "nik_saksi_1" => $this->nik_saksi_1 = $pengantar->nik_saksi_1,
            "nama_saksi_1" => $this->nama_saksi_1 = $pengantar->nama_saksi_1,
            "tanggal_lahir_saksi_1" => $this->tanggal_lahir_saksi_1 = $pengantar->tanggal_lahir_saksi_1,
            "pekerjaan_saksi_1" => $this->pekerjaan_saksi_1 = $pengantar->pekerjaan_saksi_1,
            "alamat_saksi_1" => $this->alamat_saksi_1 = $pengantar->alamat_saksi_1,

            //saksi2
            "nik_saksi_2" => $this->nik_saksi_2 = $pengantar->nik_saksi_2,
            "nama_saksi_2" => $this->nama_saksi_2 = $pengantar->nama_saksi_2,
            "tanggal_lahir_saksi_2" => $this->tanggal_lahir_saksi_2 = $pengantar->tanggal_lahir_saksi_2,
            "pekerjaan_saksi_2" => $this->pekerjaan_saksi_2 = $pengantar->pekerjaan_saksi_2,
            "alamat_saksi_2" => $this->alamat_saksi_2 = $pengantar->alamat_saksi_2,

            "pejabat" => $pejabat,
            "nama_pejabat" => $nama_pejabat,

            // "dukuh" => $dukuh,

            "created_at" => $created_at,

            // "tanggal_kematian" => $tanggal_kematian,
            // "tanggal_lahir_meninggal" => $tanggal_lahir_meninggal,

            "hari_kelahiran" => $namahari,

            "umur_pelapor" => $thn,
            // "umur_meninggal" => $thnmeninggal,

            // "pejabat" => $pejabat,
            // "nama_pejabat" => $nama_pejabat,

            "tgl_ayah" => $tanggal_lahir_ayah,
            "tgl_ibu" => $tanggal_lahir_ibu,
            "tgl_pelapor" => $tanggal_lahir_pelapor,
            "tgl_saksi_1" => $tanggal_lahir_saksi_1,
            "tgl_saksi_2" => $tanggal_lahir_saksi_2,


            //ttl anak
            "bulan_lahir" => $bulan_lahir,
            "tanggal_lahir" => $tanggal_lahir,
            "tahun_lahir" => $tahun_lahir


        ];


        // $disposisis_id=$id;

        // $no_agenda = $agenda->$id;



        $filename = "Surat Kelahiran_" . $data['nama_lengkap_anak'] . ".pdf";



        $pdfContent = PDF::loadView('print.kelahiran', $data)->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "$filename"
        );
    }

    public function printKematian($id)
    {
        setlocale(LC_TIME, 'id_ID.utf8');

        $kematian = surat_kematian::findOrFail($id);

        if ($this->pejabat_penandatangan = $kematian->pejabat_penandatangan == "kepala desa") {
            $pejabat = "KEPALA DESA";
            $nama_pejabat = "IBNU WIYANTO";
        } else {
            $pejabat = "SEKRETARIS DESA";
            $nama_pejabat = "Dra. PARSINI";
        }


        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $daftar_hari = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );
        $hari_meninggal = $this->tanggal_meninggal = $kematian->tanggal_meninggal;
        $namahari = date('l', strtotime($hari_meninggal));
        $namahari = $daftar_hari[$namahari];

        $created_at = date("Y-m-d", strtotime($this->created_at = $kematian->created_at,));
        $split = explode('-', $created_at);
        $created_at = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //umur pelapor
        $tanggal_lahir = new DateTime($this->tanggal_lahir_pelapor = $kematian->tanggal_lahir_pelapor);
        $sekarang = new DateTime("today");
        if ($tanggal_lahir > $sekarang) {
            $thn = "0";
            $bln = "0";
            $tgl = "0";
        }
        $thn = $sekarang->diff($tanggal_lahir)->y;
        $bln = $sekarang->diff($tanggal_lahir)->m;
        $tgl = $sekarang->diff($tanggal_lahir)->d;

        //umur meninggal
        $tanggal_lahir = new DateTime($this->tanggal_lahir_meninggal = $kematian->tanggal_lahir_meninggal);
        $sekarang = new DateTime($kematian->tanggal_meninggal);
        if ($tanggal_lahir > $sekarang) {
            $thn = "0";
            $bln = "0";
            $tgl = "0";
        }
        $thnmeninggal = $sekarang->diff($tanggal_lahir)->y;
        $bln = $sekarang->diff($tanggal_lahir)->m;
        $tgl = $sekarang->diff($tanggal_lahir)->d;

        // tanggal kematian
        $tanggal_kematian = date("Y-m-d", strtotime($this->tanggal_meninggal = $kematian->tanggal_meninggal,));
        $split = explode('-', $tanggal_kematian);
        $tanggal_kematian = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        // tanggal LAHIR KEMATIAN
        $tanggal_lahir_meninggal = date("Y-m-d", strtotime($this->tanggal_lahir_meninggal = $kematian->tanggal_lahir_meninggal,));
        $split = explode('-', $tanggal_lahir_meninggal);
        $tanggal_lahir_meninggal = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //pukul meninggal
        $waktu_meninggal = date('h:i', $this->waktu_meninggal = $kematian->waktu_meninggal);

        //tanggal LAHIR AYAH
        $tanggal_lahir_ayah = date("Y-m-d", strtotime($this->tanggal_ayah = $kematian->tanggal_ayah,));
        $split = explode('-', $tanggal_lahir_ayah);
        $tanggal_lahir_ayah = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //tanggal LAHIR AYAH
        $tanggal_lahir_ibu = date("Y-m-d", strtotime($this->tanggal_ibu = $kematian->tanggal_ibu,));
        $split = explode('-', $tanggal_lahir_ibu);
        $tanggal_lahir_ibu = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //tanggal LAHIR pelapor
        $tanggal_lahir_pelapor = date("Y-m-d", strtotime($this->tanggal_pelapor = $kematian->tanggal_pelapor,));
        $split = explode('-', $tanggal_lahir_pelapor);
        $tanggal_lahir_pelapor = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //tanggal LAHIR AYAH
        $tanggal_lahir_saksi_1 = date("Y-m-d", strtotime($this->tanggal_saksi_1 = $kematian->tanggal_saksi_1,));
        $split = explode('-', $tanggal_lahir_saksi_1);
        $tanggal_lahir_saksi_1 = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        //tanggal LAHIR AYAH
        $tanggal_lahir_saksi_2 = date("Y-m-d", strtotime($this->tanggal_saksi_2 = $kematian->tanggal_saksi_2,));
        $split = explode('-', $tanggal_lahir_saksi_2);
        $tanggal_lahir_saksi_2 = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        $data = [
            $pengantar = surat_kematian::findOrFail($id),
            "no_surat" => $this->no_surat = $pengantar->no_surat,
            "nik_meninggal" => $this->nik_meninggal = $pengantar->nik_meninggal,

            "no_kk" => $this->no_kk = $pengantar->no_kk,
            "nama_kk" => $this->nama_kk = $pengantar->nama_kk,

            "nama_lengkap_meninggal" => $this->nama_lengkap_meninggal = $pengantar->nama_lengkap_meninggal,
            "jenis_kelamin_meninggal" => $this->jenis_kelamin_meninggal = $pengantar->jenis_kelamin_meninggal,
            "tempat_lahir_meninggal" => $this->tempat_lahir_meninggal = $pengantar->tempat_lahir_meninggal,
            "tanggal_lahir_meninggal" => $this->tanggal_lahir_meninggal = $pengantar->tanggal_lahir_meninggal,
            "agama_meninggal" => $this->agama_meninggal = $pengantar->agama_meninggal,
            "pekerjaan_meninggal" => $this->pekerjaan_meninggal = $pengantar->pekerjaan_meninggal,
            "alamat_meninggal" => $this->alamat_meninggal = $pengantar->alamat_meninggal,
            "no_kk_meninggal" => $this->no_kk_meninggal = $pengantar->no_kk_meninggal,
            "status_anak_meninggal" => $this->status_anak_meninggal = $pengantar->status_anak_meninggal,
            "tempat_meninggal" => $this->tempat_meninggal = $pengantar->tempat_meninggal,
            "pukul_meninggal" => $this->pukul_meninggal = $pengantar->pukul_meninggal,
            "sebab_meninggal" => $this->sebab_meninggal = $pengantar->sebab_meninggal,
            "yang_menerangkan" => $this->yang_menerangkan = $pengantar->yang_menerangkan,
            "bukti_kematian" => $this->bukti_kematian = $pengantar->bukti_kematian,
            "status_anak_meninggal" => $this->status_anak_meninggal = $pengantar->status_anak_meninggal,

            //saksi ayah
            "nik_ayah" => $this->nik_ayah = $pengantar->nik_ayah,
            "nama_ayah" => $this->nama_ayah = $pengantar->nama_ayah,
            "tanggal_lahir_ayah" => $this->tanggal_lahir_ayah = $pengantar->tanggal_lahir_ayah,
            "pekerjaan_ayah" => $this->pekerjaan_ayah = $pengantar->pekerjaan_ayah,
            "alamat_ayah" => $this->alamat_ayah = $pengantar->alamat_ayah,
            // "tanggal_berlaku" => $tanggal_berlaku,
            // "bulan_akhir" => $bulan_akhir,

            //ibu
            "nik_ibu" => $this->nik_ibu = $pengantar->nik_ibu,
            "nama_ibu" => $this->nama_ibu = $pengantar->nama_ibu,
            "tanggal_lahir_ibu" => $this->tanggal_lahir_ibu = $pengantar->tanggal_lahir_ibu,
            "pekerjaan_ibu" => $this->pekerjaan_ibu = $pengantar->pekerjaan_ibu,
            "alamat_ibu" => $this->alamat_ibu = $pengantar->alamat_ibu,


            //pelapor
            "nik_pelapor" => $this->nik_pelapor = $pengantar->nik_pelapor,
            "nama_pelapor" => $this->nama_pelapor = $pengantar->nama_pelapor,
            "tanggal_lahir_pelapor" => $this->tanggal_lahir_pelapor = $pengantar->tanggal_lahir_pelapor,
            "pekerjaan_pelapor" => $this->pekerjaan_pelapor = $pengantar->pekerjaan_pelapor,
            "alamat_pelapor" => $this->alamat_pelapor = $pengantar->alamat_pelapor,
            "hubungan_pelapor" => $this->hubungan_pelapor = $pengantar->hubungan_pelapor,

            //saksi
            "nik_saksi_1" => $this->nik_saksi_1 = $pengantar->nik_saksi_1,
            "nama_saksi_1" => $this->nama_saksi_1 = $pengantar->nama_saksi_1,
            "tanggal_lahir_saksi_1" => $this->tanggal_lahir_saksi_1 = $pengantar->tanggal_lahir_saksi_1,
            "pekerjaan_saksi_1" => $this->pekerjaan_saksi_1 = $pengantar->pekerjaan_saksi_1,
            "alamat_saksi_1" => $this->alamat_saksi_1 = $pengantar->alamat_saksi_1,

            //saksi2
            "nik_saksi_2" => $this->nik_saksi_2 = $pengantar->nik_saksi_2,
            "nama_saksi_2" => $this->nama_saksi_2 = $pengantar->nama_saksi_2,
            "tanggal_lahir_saksi_2" => $this->tanggal_lahir_saksi_2 = $pengantar->tanggal_lahir_saksi_2,
            "pekerjaan_saksi_2" => $this->pekerjaan_saksi_2 = $pengantar->pekerjaan_saksi_2,
            "alamat_saksi_2" => $this->alamat_saksi_2 = $pengantar->alamat_saksi_2,

            "pejabat" => $pejabat,
            "nama_pejabat" => $nama_pejabat,

            // "dukuh" => $dukuh,

            "created_at" => $created_at,

            "tanggal_kematian" => $tanggal_kematian,
            "tanggal_lahir_meninggal" => $tanggal_lahir_meninggal,

            "hari_meninggal" => $namahari,

            "umur_pelapor" => $thn,
            "umur_meninggal" => $thnmeninggal,

            "pejabat" => $pejabat,
            "nama_pejabat" => $nama_pejabat,

            "tgl_ayah" => $tanggal_lahir_ayah,
            "tgl_ibu" => $tanggal_lahir_ibu,
            "tgl_pelapor" => $tanggal_lahir_pelapor,
            "tgl_saksi_1" => $tanggal_lahir_saksi_1,
            "tgl_saksi_2" => $tanggal_lahir_saksi_2,


        ];


        // $disposisis_id=$id;

        // $no_agenda = $agenda->$id;



        $filename = "Surat Kematian_" . $data['nik_meninggal'] . ".pdf";



        $pdfContent = PDF::loadView('print.kematian', $data)->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "$filename"
        );
    }
}
