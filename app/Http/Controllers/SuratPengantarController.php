<?php

namespace App\Http\Controllers;

use App\Models\Surat_pengantar as surat_pengantar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SuratPengantarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $title = "Surat Pengantar";
        if ($request->ajax()) {
            $data = surat_pengantar::select(['id', 'nik', 'created_at','tanggal_berlaku', 'no_surat', 'keterangan']);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="text-white btn btn-danger btn-sm deletePengantar ">Delete</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="text-white edit btn btn-primary btn-sm editPengantar">Edit</a>';
                    return $btn;
                })
                ->addColumn('lihatpdf', function ($data) {
                    $url_download_file = route('printPengantar', $data->id);
                    return view('print.download-pengantar')->with('url_download_file', $url_download_file)->render();
                })
                ->rawColumns(['action','lihatpdf'])
                ->make(true);
        }

        return view('surat.surat-pengantar')
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



        surat_pengantar::updateOrCreate(['id' => $request->id], [
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'status_kawin' => $request->status_kawin,
            'alamat' => $request->alamat,
            'no_kk' => $request->no_kk,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'keperluan' => $request->keperluan,
            'keterangan' => $request->keterangan,
            'tanggal_berlaku' => $request->tanggal_berlaku,
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
        $surat_pengantar = surat_pengantar::find($id);
        return response()->json($surat_pengantar);
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
        $agenda = surat_pengantar::where('id', $id)->firstOrFail();
        surat_pengantar::find($id)->delete();

        return response()->json(['success' => 'Surat pengantar berhasil dihapus.']);
    }
}
