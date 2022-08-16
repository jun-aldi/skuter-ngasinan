<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use App\Models\surat_kelahiran;
use Illuminate\Http\Request;

class suratkelahiranform extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.surat-kelahiran-form');
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
            'no_surat' => 'required',
            'nama_kk' => 'required',
            'no_kk' => 'required',
            'nama_lengkap_anak' => 'required',
            'jenis_kelamin_anak' => 'required',
            'tempat_dilahirkan' => 'required',
            'tempat_kelahiran' => 'required',
            'tanggal_lahir_anak' => 'required',
            'jam_lahir_anak' => 'required',
            'jenis_kelahiran' => 'required',
            'kelahiran_ke' => 'required',
            'pertolongan_kelahiran' => 'required',
            'berat_bayi' => 'required',
            'panjang_bayi' => 'required',
            'pejabat_penandatangan' => 'required',

            //ayah
            'nik_ayah' => 'required|max:16',
            'nama_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'alamat_ayah' => 'required',

            //ibu
            'nik_ibu' => 'required|max:16',
            'nama_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',

            //pelapor
            'nik_pelapor' => 'required|max:16',
            'nama_pelapor' => 'required',
            'tanggal_lahir_pelapor' => 'required',
            'pekerjaan_pelapor' => 'required',
            'alamat_pelapor' => 'required',


            //saksi
            'nik_saksi_1' => 'required|max:16',
            'nama_saksi_1' => 'required',
            'tanggal_lahir_saksi_1' => 'required',
            'pekerjaan_saksi_1' => 'required',
            'alamat_saksi_1' => 'required',

            //saksi_2
            'nik_saksi_2' => 'required|max:16',
            'nama_saksi_2' => 'required',
            'tanggal_lahir_saksi_2' => 'required',
            'pekerjaan_saksi_2' => 'required',
            'alamat_saksi_2' => 'required',
        ]);

        $surat = new surat_kelahiran();

        $surat->no_surat = $request->no_surat;
        $surat->nama_lengkap_anak = $request->nama_lengkap_anak;
        $surat->nama_kk = $request->nama_kk;
        $surat->no_kk = $request->no_kk;
        $surat->jenis_kelamin_anak = $request->jenis_kelamin_anak;
        $surat->tempat_dilahirkan = $request->tempat_dilahirkan;
        $surat->tempat_kelahiran = $request->tempat_kelahiran;
        $surat->tanggal_lahir_anak = $request->tanggal_lahir_anak;
        $surat->jam_lahir_anak = $request->jam_lahir_anak;
        $surat->jenis_kelahiran = $request->jenis_kelahiran;
        $surat->kelahiran_ke = $request->kelahiran_ke;
        $surat->pertolongan_kelahiran = $request->pertolongan_kelahiran;
        $surat->berat_bayi = $request->berat_bayi;
        $surat->panjang_bayi = $request->panjang_bayi;
        $surat->pejabat_penandatangan = $request->pejabat_penandatangan;

        //ayah
        $surat->nik_ayah = $request->nik_ayah;
        $surat->nama_ayah = $request->nama_ayah;
        $surat->tanggal_lahir_ayah = $request->tanggal_lahir_ayah;
        $surat->pekerjaan_ayah = $request->pekerjaan_ayah;
        $surat->alamat_ayah = $request->alamat_ayah;

        //ibu
        $surat->nik_ibu = $request->nik_ibu;
        $surat->nama_ibu = $request->nama_ibu;
        $surat->tanggal_lahir_ibu = $request->tanggal_lahir_ibu;
        $surat->pekerjaan_ibu = $request->pekerjaan_ibu;
        $surat->alamat_ibu = $request->alamat_ibu;

        //pelapor
        $surat->nik_pelapor = $request->nik_pelapor;
        $surat->nama_pelapor = $request->nama_pelapor;
        $surat->tanggal_lahir_pelapor = $request->tanggal_lahir_pelapor;
        $surat->pekerjaan_pelapor = $request->pekerjaan_pelapor;
        $surat->alamat_pelapor = $request->alamat_pelapor;

        //saksi
        $surat->nik_saksi_1 = $request->nik_saksi_1;
        $surat->nama_saksi_1 = $request->nama_saksi_1;
        $surat->tanggal_lahir_saksi_1 = $request->tanggal_lahir_saksi_1;
        $surat->pekerjaan_saksi_1 = $request->pekerjaan_saksi_1;
        $surat->alamat_saksi_1 = $request->alamat_saksi_1;

        //saksi
        $surat->nik_saksi_2 = $request->nik_saksi_2;
        $surat->nama_saksi_2 = $request->nama_saksi_2;
        $surat->tanggal_lahir_saksi_2 = $request->tanggal_lahir_saksi_2;
        $surat->pekerjaan_saksi_2 = $request->pekerjaan_saksi_2;
        $surat->alamat_saksi_2 = $request->alamat_saksi_2;

        $surat->save();

        return redirect('/suratkelahiranform')->with('status', 'Form Data Has Been Inserted');


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
}
