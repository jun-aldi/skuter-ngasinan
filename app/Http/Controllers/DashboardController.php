<?php

namespace App\Http\Controllers;

use App\Models\Penduduk as penduduk;
use App\Models\Surat_kelahiran as surat_kelahiran;
use App\Models\Surat_kematian as  surat_kematian;
use App\Models\Surat_pengantar as surat_pengantar;
use App\Models\Surat_pindah as surat_pindah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function render()
    {

        $title = 'Dashboard';
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
            ->with('countKelahiran', $countKelahiran)
            ->with('title', $title);


    }
}
