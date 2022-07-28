<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use App\Models\penduduk;
use App\Models\surat_pengantar;
use Illuminate\Http\Request;
use vendor\yajra\datatables\src\DataTables as DataTables;

class suratpengantarform extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('form.surat-pengantar-form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|max:25',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'status_kawin' => 'required',
            'alamat' => 'required',
            'no_kk' => 'required',
            'no_surat' => 'required',
            'tujuan' => 'required',
            'keperluan' => 'required',
            'pejabat_penandatangan' => 'required',
        ]);

        $surat = new surat_pengantar();

        $surat->nik = $request->nik;
        $surat->nama_lengkap = $request->nama_lengkap;
        $surat->tempat_lahir = $request->tempat_lahir;
        $surat->tanggal_lahir = $request->tanggal_lahir;
        $surat->jenis_kelamin = $request->jenis_kelamin;
        $surat->kewarganegaraan = $request->kewarganegaraan;
        $surat->agama = $request->agama;
        $surat->pekerjaan = $request->pekerjaan;
        $surat->status_kawin = $request->status_kawin;
        $surat->alamat = $request->alamat;
        $surat->no_kk = $request->no_kk;
        $surat->no_surat = $request->no_surat;
        $surat->tujuan = $request->tujuan;
        $surat->keperluan = $request->keperluan;
        $surat->keterangan = $request->keterangan;
        $surat->pejabat_penandatangan = $request->pejabat_penandatangan;
        $surat->tanggal_berlaku = date('Y-m-d') ;

        $surat->save();

        return redirect('/suratpengantar')->with('status', 'Form Data Has Been Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function autofill($nik)
    {
        //membuat koneksi ke database

        //variabel nim yang dikirimkan form.php
        $nik = $_GET['nik'];

        //mengambil data

        $data = [
            $penduduk = penduduk::where('nik',$nik)->first(),
            "nik" => $this->nik = $penduduk->nik,
            "nama_lengkap" => $this->nama_lengkap = $penduduk->nama_lengkap,
            "tempat_lahir" => $this->tempat_lahir = $penduduk->tempat_lahir,
            "tanggal_lahir" => $this->tanggal_lahir = $penduduk->tanggal_lahir,
            "jenis_kelamin" => $this->jenis_kelamin = $penduduk->jenis_kelamin,
            "status_kawin" => $this->status_kawin = $penduduk->status_kawin,
            "no_kk" => $this->no_kk = $penduduk->no_kk,
            "alamat" => $this->dukuh = $penduduk->dukuh .", RT ". $this->rt = $penduduk->rt ."/RW ". $this->rw = $penduduk->rw .", DESA NGASINAN",
         ];
        //tampil data
        echo json_encode($data);
    }
}
