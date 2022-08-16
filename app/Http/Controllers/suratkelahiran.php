<?php

namespace App\Http\Controllers;

use App\Models\surat_kelahiran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class suratkelahiran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = surat_kelahiran::select(['id', 'no_surat', 'created_at', 'nama_lengkap_anak', 'tanggal_lahir_anak','nama_ibu',]);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteKelahiran text-white ">Delete</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editKelahiran text-white">Edit</a>';
                    return $btn;
                })
                ->addColumn('lihatpdf', function ($data) {
                    $url_download_file = route('printKelahiran', $data->id);
                    return view('print.download-pengantar')->with('url_download_file', $url_download_file)->render();
                })
                ->rawColumns(['action','lihatpdf'])
                ->make(true);
        }
        return view('surat.surat-kelahiran');
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

        surat_kelahiran::updateOrCreate(['id'=>$request->id], [
            'no_kk' => $request->no_kk,
            'nama_kk' => $request->nama_kk,
            'no_surat' => $request->no_surat,
            'nama_lengkap_anak' => $request->nama_lengkap_anak,
            'jenis_kelamin_anak' => $request->jenis_kelamin_anak,
            'tempat_dilahirkan' => $request->tempat_dilahirkan,
            'tempat_kelahiran' => $request->tempat_kelahiran,
            'tanggal_lahir_anak' => $request->tanggal_lahir_anak,
            'jam_lahir_anak' => $request->jam_lahir_anak,
            'jenis_kelahiran' => $request->jenis_kelahiran,
            'kelahiran_ke' => $request->kelahiran_ke,
            'pertolongan_kelahiran' => $request->pertolongan_kelahiran,
            'berat_bayi' => $request->berat_bayi,
            'panjang_bayi' => $request->panjang_bayi,
            'pejabat_penandatangan' => $request->pejabat_penandatangan,

            'nik_ayah' => $request->nik_ayah,
            'nama_ayah' => $request->nama_ayah,
            'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'alamat_ayah' => $request->alamat_ayah,


            'nik_ibu' => $request->nik_ibu,
            'nama_ibu' => $request->nama_ibu,
            'tanggal_lahir_ibu' => $request->tanggal_lahir_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat_ibu' => $request->alamat_ibu,

            'nik_pelapor' => $request->nik_pelapor,
            'nama_pelapor' => $request->nama_pelapor,
            'tanggal_lahir_pelapor' => $request->tanggal_lahir_pelapor,
            'pekerjaan_pelapor' => $request->pekerjaan_pelapor,
            'alamat_pelapor' => $request->alamat_pelapor,


            'nik_saksi_1' => $request->nik_saksi_1,
            'nama_saksi_1' => $request->nama_saksi_1,
            'tanggal_lahir_saksi_1' => $request->tanggal_lahir_saksi_1,
            'pekerjaan_saksi_1' => $request->pekerjaan_saksi_1,
            'alamat_saksi_1' => $request->alamat_saksi_1,


            'nik_saksi_2' => $request->nik_saksi_2,
            'nama_saksi_2' => $request->nama_saksi_2,
            'tanggal_lahir_saksi_2' => $request->tanggal_lahir_saksi_2,
            'pekerjaan_saksi_2' => $request->pekerjaan_saksi_2,
            'alamat_saksi_2' => $request->alamat_saksi_2,

        ]);

        return response()->json(['success' => "Data berhasil disimpan"]);
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
        $surat_kelahiran = surat_kelahiran::find($id);
        return response()->json($surat_kelahiran);
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
        $kematian = surat_kelahiran::where('id', $id)->firstOrFail();
        surat_kelahiran::find($id)->delete();

        return response()->json(['success' => 'Surat kelahian berhasil dihapus.']);
    }
}
