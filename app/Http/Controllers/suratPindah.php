<?php

namespace App\Http\Controllers;

use App\Models\surat_pindah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class suratPindah extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Surat Pindah";
        if ($request->ajax()) {
            $data = surat_pindah::select(['id', 'no_kk', 'created_at', 'nama_kepala_keluarga','nik_pemohon', 'nama_lengkap']);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePindah text-white ">Delete</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPindah text-white">Edit</a>';
                    return $btn;
                })
                ->addColumn('lihatpdf', function ($data) {
                    $url_download_file = route('printPindahan', $data->id);
                    return view('print.download-pengantar')->with('url_download_file', $url_download_file)->render();
                })
                ->rawColumns(['action','lihatpdf'])
                ->make(true);
        }

        return view('surat.surat-pindah')
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


        return response()->json(['success' => 'Data berhasil disimpan.']);
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
        $surat_pindah = surat_pindah::find($id);
        return response()->json($surat_pindah);
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
        $pindah = surat_pindah::where('id', $id)->firstOrFail();
        surat_pindah::find($id)->delete();

        return response()->json(['success' => 'Surat Pindah Berhasil Dihapus.']);
    }
}
