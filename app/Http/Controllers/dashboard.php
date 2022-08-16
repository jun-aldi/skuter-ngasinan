<?php

namespace App\Http\Controllers;

use App\Models\penduduk;
use App\Models\surat_kelahiran;
use App\Models\surat_kematian;
use App\Models\surat_pengantar;
use App\Models\surat_pindah;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function render()
    {


        $countPenduduk = penduduk::all()->count();
        $countPindah = surat_pindah::all()->count();
        $countPengantar = surat_pengantar::all()->count();
        $countKematian = surat_kematian::all()->count();
        $countKelahiran = surat_kelahiran::all()->count();

        $countTotal = $countPindah + $countKematian + $countKelahiran;
        return view('surat.dashboard')
            ->with('countPenduduk', $countPenduduk)
            ->with('countPindah', $countPindah)
            ->with('countPengantar', $countPengantar)
            ->with('countKematian', $countKematian)
            ->with('countTotal', $countTotal)
            ->with('countKelahiran', $countKelahiran);


    }
}
