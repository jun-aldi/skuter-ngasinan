<?php

namespace App\Http\Controllers;

use App\Models\surat_pengantar;
use App\Models\surat_pindah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use DateTime;
class Printpdf extends Controller
{
    public function printPengantar($id){
        // $agendas = Agenda::where('disposisis_id', $id)->first();

        $bulan = array (1 =>   'Januari',
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
        $split = explode('-', $this->tanggal_lahir=$pengantar2->tanggal_lahir,);
        $tanggal_lahir = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

        //CREATED AT
        $tanggal_berlaku = date("Y-m-d", strtotime($this->tanggal_berlaku=$pengantar2->tanggal_berlaku,));
        $split = explode('-', $tanggal_berlaku );
        $tanggal_berlaku = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

        //TAMBAH BULAN
        $bulan_akhir = $this->tanggal_berlaku=$pengantar2->tanggal_berlaku;
        $bulan_akhir = DateTime::createFromFormat('Y-m-d', $bulan_akhir);
        $bulan_akhir->modify('+1 month');
        $bulan_akhir = $bulan_akhir->format('Y-m-d');
        $bulan_akhir = date("Y-m-d", strtotime($bulan_akhir));
        $split = explode('-', $bulan_akhir );
        $bulan_akhir = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

        //pejabat penandatangan
        if($this->pejabat_penandatangan=$pengantar2->pejabat_penandatangan == "kepala desa"){
            $pejabat = "KEPALA DESA";
            $nama_pejabat = "IBNU WIYANTO";
        }else{
            $pejabat = "SEKRETARIS DESA";
            $nama_pejabat = "Dra. PARSINI";
        }

        $data = [
            $pengantar = surat_pengantar::findOrFail($id),
            "id" => $this->id=$pengantar->id,
            "nik" => $this->nik = $pengantar->nik,
            "nama_lengkap" => $this->nama_lengkap=$pengantar->nama_lengkap,
            "tempat_lahir" => $this->tempat_lahir = $pengantar->tempat_lahir,
            "tanggal_lahir" => $tanggal_lahir,
            "jenis_kelamin" => $this->jenis_kelamin = $pengantar->jenis_kelamin,
            "kewarganegaraan" => $this->kewarganegaraan=$pengantar->kewarganegaraan,
            "agama" => $this->agama = $pengantar->agama,
            "pekerjaan" => $this->pekerjaan=$pengantar->pekerjaan,
            "status_kawin" => $this->status_kawin = $pengantar->status_kawin,
            "alamat" => $this->alamat=$pengantar->alamat,
            "no_kk" => $this->no_kk = $pengantar->no_kk,
            "no_surat" => $this->no_surat=$pengantar->no_surat,
            "tujuan" => $this->tujuan = $pengantar->tujuan,
            "keperluan" => $this->keperluan=$pengantar->keperluan,
            "keterangan" => $this->keterangan = $pengantar->keterangan,
            "tanggal_berlaku" => $tanggal_berlaku,
            "bulan_akhir" => $bulan_akhir,
            "pejabat" => $pejabat,
            "nama_pejabat" => $nama_pejabat,

        ];


            // $disposisis_id=$id;

            // $no_agenda = $agenda->$id;



        $filename ="Surat Pengantar" . $data['nik'].".pdf";



        $pdfContent = PDF::loadView('print.pengantar',$data)->output();
        $pdf = PDF::loadView('print.pengantar', $data);
        return $pdf->stream($filename);
    }


    public function printPindahan($id)
    {
        $pindah = surat_pindah::findOrFail($id);

        if($this->pejabat_penandatangan=$pindah->pejabat_penandatangan == "kepala desa"){
            $pejabat = "KEPALA DESA";
            $nama_pejabat = "IBNU WIYANTO";
        }else{
            $pejabat = "SEKRETARIS DESA";
            $nama_pejabat = "Dra. PARSINI";
        }

        if(str_contains($alamat = $this->alamat=$pindah->alamat, 'DESA NGASINAN')){
            $dukuh = str_replace(", DESA NGASINAN","",$alamat);
        }
        else if(str_contains($alamat = $this->alamat=$pindah->alamat, 'ngasinan')){
            $dukuh = str_replace(", ngasinan","",$alamat);
        }
        else if(str_contains($alamat = $this->alamat=$pindah->alamat, 'desa ngasinan')){
            $dukuh = str_replace(", desa ngasinan","",$alamat);
        }
        else if(str_contains($alamat = $this->alamat=$pindah->alamat, 'NGASINAN')){
            $dukuh = str_replace(", DESA NGASINAN","",$alamat);
        }

        $bulan = array (1 =>   'Januari',
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

        $created_at = date("Y-m-d", strtotime($this->created_at=$pindah->created_at,));
        $split = explode('-', $created_at );
        $created_at = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

        $data = [
            $pengantar = surat_pindah::findOrFail($id),
            "nik_kepala_keluarga" => $this->nik_kepala_keluarga = $pengantar->nik_kepala_keluarga,
            "no_kk" => $this->no_kk = $pengantar->no_kk,
            "nama_kepala_keluarga" => $this->nama_kepala_keluarga=$pengantar->nama_kepala_keluarga,
            "alamat" => $this->alamat = $pengantar->alamat,
            "nik_pemohon" => $this->nik_pemohon = $pengantar->nik_pemohon,
            "nama_lengkap" => $this->nama_lengkap = $pengantar->nama_lengkap,
            "telepon" => $this->telepon=$pengantar->telepon,
            "no_surat" => $this->no_surat = $pengantar->no_surat,
            "alasan" => $this->alasan=$pengantar->alasan,
            "alamat_tujuan" => $this->alamat_tujuan = $pengantar->alamat_tujuan,
            "jenis_kepindahan" => $this->jenis_kepindahan=$pengantar->jenis_kepindahan,
            "status_kk_tidak_pindah" => $this->status_kk_tidak_pindah = $pengantar->status_kk_tidak_pindah,
            "status_kk_pindah" => $this->status_kk_pindah=$pengantar->status_kk_pindah,
            // "tanggal_berlaku" => $tanggal_berlaku,
            // "bulan_akhir" => $bulan_akhir,
            "pejabat" => $pejabat,
            "nama_pejabat" => $nama_pejabat,

            "dukuh" => $dukuh,

            "created_at" => $created_at,

        ];


            // $disposisis_id=$id;

            // $no_agenda = $agenda->$id;



        $filename ="Surat Pindah " . $data['nama_lengkap'].".pdf";



        $pdfContent = PDF::loadView('print.pindah',$data)->output();
        return response()->streamDownload(
        fn () => print($pdfContent),
        "$filename"
        );
    }
}
