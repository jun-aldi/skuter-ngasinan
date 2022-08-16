<?php

namespace App\Http\Controllers;

use App\Models\surat_kematian;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use function PHPUnit\Framework\returnSelf;

class suratKematian extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = surat_kematian::select(['id', 'nik_meninggal', 'created_at', 'tanggal_meninggal','no_surat', 'sebab_meninggal']);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteKematian text-white ">Delete</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editKematian text-white">Edit</a>';
                    return $btn;
                })
                ->addColumn('lihatpdf', function ($data) {
                    $url_download_file = route('printKematian', $data->id);
                    return view('print.download-pengantar')->with('url_download_file', $url_download_file)->render();
                })
                ->rawColumns(['action','lihatpdf'])
                ->make(true);
        }
        return view('surat.surat-kematian');
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
            'nik_meninggal' => 'required|max:16',
            'no_surat' => 'required',
            'no_kk' => 'required',
            'nama_kk' => 'required',
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
            'hubungan_pelapor' => 'required',

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

        surat_kematian::updateOrCreate(['id'=>$request->id], [
            'nik_meninggal' => $request->nik_meninggal,
            'no_kk' => $request->no_kk,
            'nama_kk' => $request->nama_kk,
            'no_surat' => $request->no_surat,
            'nama_lengkap_meninggal' => $request->nama_lengkap_meninggal,
            'tempat_lahir_meninggal' => $request->tempat_lahir_meninggal,
            'tanggal_lahir_meninggal' => $request->tanggal_lahir_meninggal,
            'jenis_kelamin_meninggal' => $request->jenis_kelamin_meninggal,
            'agama_meninggal' => $request->agama_meninggal,
            'pekerjaan_meninggal' => $request->pekerjaan_meninggal,
            'alamat_meninggal' => $request->alamat_meninggal,
            'no_kk_meninggal' => $request->no_kk_meninggal,
            'status_anak_meninggal' => $request->status_anak_meninggal,
            'tempat_meninggal' => $request->tempat_meninggal,
            'tanggal_meninggal' => $request->tanggal_meninggal,
            'pukul_meninggal' => $request->pukul_meninggal,
            'sebab_meninggal' => $request->sebab_meninggal,
            'yang_menerangkan' => $request->yang_menerangkan,
            'bukti_kematian' => $request->bukti_kematian,
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
            'hubungan_pelapor' => $request->hubungan_pelapor,


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
        $surat_kematian = surat_kematian::find($id);
        return response()->json($surat_kematian);
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
        $kematian = surat_kematian::where('id', $id)->firstOrFail();
        surat_kematian::find($id)->delete();

        return response()->json(['success' => 'Surat kematian berhasil dihapus.']);
    }
}
