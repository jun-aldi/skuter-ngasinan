<?php

namespace App\Http\Controllers;

use App\Models\penduduk as ModelsPenduduk;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class penduduk extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ModelsPenduduk::select(['id','nama_lengkap', 'no_kk','nik', 'tanggal_lahir','created_at', 'updated_at']);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePenduduk text-white ">Delete</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPenduduk text-white">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('penduduk-datatables');
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


        ModelsPenduduk::updateOrCreate(['id' => $request->id], [

            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_kawin' => $request->status_kawin,
            'dukuh' => $request->dukuh,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'keterangan' >= $request->keterangan,

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
        $penduduk = ModelsPenduduk::find($id);
        return response()->json($penduduk);
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
        $penduduk = ModelsPenduduk::where('id', $id)->firstOrFail();
        ModelsPenduduk::find($id)->delete();

        return response()->json(['success' => 'Data Penduduk berhasil dihapus.']);
    }
}
