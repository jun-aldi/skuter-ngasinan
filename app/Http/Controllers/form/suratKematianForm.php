<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use App\Models\surat_kematian;
use Illuminate\Http\Request;

class suratKematianForm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.surat-kematian-form');
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
            'nik_meninggal' => 'required|max:16',
            'no_surat' => 'required',
            'nama_lengkap_meninggal' => 'required',
            'tempat_lahir_meninggal' => 'required',
            'tanggal_lahir_meninggal' => 'required',
            'jenis_kelamin_meninggal' => 'required',
            'agama_meninggal' => 'required',
            'pekerjaan_meninggal' => 'required',
            'alamat_meninggal' => 'required',
            'no_kk_meninggal' => 'required',
            'status_anak_meninggal' => 'required',
            'tempat_meninggal' => 'required',
            'tanggal_meninggal' => 'required',
            'pukul_meninggal' => 'required',
            'sebab_meninggal' => 'required',
            'yang_menerangkan' => 'required',
            'bukti_kematian' => 'required',
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

        $surat = new surat_kematian();

        $surat->nik_meninggal = $request->nik_meninggal;
        $surat->no_surat = $request->no_surat;
        $surat->nama_lengkap_meninggal = $request->nama_lengkap_meninggal;
        $surat->tempat_lahir_meninggal = $request->tempat_lahir_meninggal;
        $surat->tanggal_lahir_meninggal = $request->tanggal_lahir_meninggal;
        $surat->jenis_kelamin_meninggal = $request->jenis_kelamin_meninggal;
        $surat->agama_meninggal = $request->agama_meninggal;
        $surat->pekerjaan_meninggal = $request->pekerjaan_meninggal;
        $surat->alamat_meninggal = $request->alamat_meninggal;
        $surat->no_kk_meninggal = $request->no_kk_meninggal;
        $surat->status_anak_meninggal = $request->status_anak_meninggal;
        $surat->tempat_meninggal = $request->tempat_meninggal;
        $surat->tanggal_meninggal = $request->tanggal_meninggal;
        $surat->pukul_meninggal = $request->pukul_meninggal;
        $surat->sebab_meninggal = $request->sebab_meninggal;
        $surat->yang_menerangkan = $request->yang_menerangkan;
        $surat->bukti_kematian = $request->bukti_kematian;
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

        return redirect('/suratkematian')->with('status', 'Form Data Has Been Inserted');
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
