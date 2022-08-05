<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use App\Models\surat_pindah;
use Illuminate\Http\Request;

class suratPindahForm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.surat-pindah-form');
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
        request()->validate([
            'nik_kepala_keluarga' => 'required|max:25',
            'no_kk' => 'required',
            'nama_kepala_keluarga' => 'required',
            'alamat' => 'required',
            'nik_pemohon' => 'required',
            'nama_lengkap' => 'required',
            'telepon' => 'required',
            'no_surat' => 'required',
            'alasan' => 'required',
            'alamat_tujuan' => 'required',
            'jenis_kepindahan' => 'required',
            'status_kk_tidak_pindah' => 'required',
            'status_kk_pindah' => 'required',
            'pejabat_penandatangan' => 'required',
        ]);



        surat_pindah::updateOrCreate(['id' => $request->id], [
            'nik_kepala_keluarga' => $request->nik_kepala_keluarga,
            'no_kk' => $request->no_kk,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'alamat' => $request->alamat,
            'nik_pemohon' => $request->nik_pemohon,
            'nama_lengkap' => $request->nama_lengkap,
            'telepon' => $request->telepon,
            'no_surat' => $request->no_surat,
            'alasan' => $request->alasan,
            'alamat_tujuan' => $request->alamat_tujuan,
            'jenis_kepindahan' => $request->jenis_kepindahan,
            'status_kk_tidak_pindah' => $request->status_kk_tidak_pindah,
            'status_kk_pindah' => $request->status_kk_pindah,
            'pejabat_penandatangan' => $request->pejabat_penandatangan,
        ]);
        return redirect('/suratpindah')->with('status', 'Form Data Has Been Inserted');
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
