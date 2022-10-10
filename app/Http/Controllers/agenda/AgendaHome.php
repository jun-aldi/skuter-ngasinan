<?php

namespace App\Http\Controllers\agenda;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class AgendaHome extends Controller
{
    public function render(Request $request)
    {
        $title = "Agenda Desa Ngasinan";
        $filter = $request->query('filter');
        $filter2 = $request->query('filter2');


        $date_now = date("Y-m-d");
        $hari_sekarang = date('d');
        $week_now = date('w');
        $week_start = date('m-d-Y', strtotime('-' . $hari_sekarang . ' days'));
        $week_end = date('m-d-Y', strtotime('+' . (6 - $hari_sekarang) . ' days'));
        $hari_sekarang = date('d');

        $month_now = date('m');
        $filter = $request->query('filter');


        $date_now_filter = $date_now;
        $week_now_filter = $week_now;

        if (!empty($filter) && !empty($filter2)) {
            $agendas = Agenda::sortable(['tanggal_agenda' => 'asc'])
                ->where('agendas.tanggal_agenda', '>=', $filter)
                ->where('agendas.tanggal_agenda', '<=', date('Y-m-d', strtotime($filter2 . '+1 day')))
                ->paginate(10);
            $haeder = date("d-m-Y", strtotime($filter));
            $haeder2 = date("d-m-Y", strtotime($filter2));
            $day1 = date('D', strtotime($filter));
            $day2 = date('D', strtotime($filter2));
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu'
            );
            $hari = $dayList[$day1];
            $hari2 = $dayList[$day2];
        } elseif (!empty($filter) && empty($filter2)) {
            $agendas = Agenda::sortable(['tanggal_agenda' => 'asc'])
                ->where('agendas.tanggal_agenda', 'like', '%' . $filter . '%')
                ->paginate(10);
            $haeder = date("d-m-Y", strtotime($filter));
            $haeder2 = 0;
            $hari2 = 0;
            $day = date('D', strtotime($filter));
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu'
            );
            $hari = $dayList[$day];
        } else {
            $agendas = Agenda::sortable(['tanggal_agenda' => 'asc'])
                ->where('agendas.tanggal_agenda', 'like', '%' . date('Y-m-d') . '%')
                ->paginate(10);
            $haeder = date("d-m-Y", strtotime($date_now));
            $haeder2 = 0;
            $day = date('D');
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu'
            );
            $hari = $dayList[$day];
            $hari2 = 0;
        }
        return view("agenda-home")
            ->with('agendas', $agendas)
            ->with('filter', $filter)
            ->with('week_now_filter', $week_now_filter)
            ->with('date_now_filter', $date_now_filter)
            ->with('filter2', $filter2)
            ->with('header', $haeder)
            ->with('header2', $haeder2)
            ->with('hari', $hari)
            ->with('hari2', $hari2);
    }
}
