<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use App\Models\penduduk;
use Illuminate\Http\Request;

class pendudukform extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Form Data Penduduk";
        return view('form.penduduk-form')
        ->with('title', $title);
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
            'no_kk' => 'required|max:25',
            'nik' => 'required|max:25',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'dukuh' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
        ]);

        $penduduk = new penduduk();
        $penduduk->no_kk = $request->no_kk;
        $penduduk->nik = $request->nik;
        $penduduk->nama_lengkap = $request->nama_lengkap;
        $penduduk->tempat_lahir = $request->tempat_lahir;
        $penduduk->tanggal_lahir = $request->tanggal_lahir;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->status_kawin = $request->status_kawin;
        $penduduk->dukuh = $request->dukuh;
        $penduduk->rt = $request->rt;
        $penduduk->rw = $request->rw;
        $penduduk->agama = $request->agama;
        $penduduk->pekerjaan = $request->pekerjaan;
        $penduduk->keterangan = $request->keterangan;

        $penduduk->save();

        return redirect('/lihatpenduduk')->with('status', 'Form Data Has Been Inserted');
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

    }
}
